<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Canton;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    protected array $serviceKeys = [
        'elderly_care',
        'hygiene',
        'hair',
        'eating',
        'medication',
        'monitoring',
        'activities',
    ];

    public function create()
    {
        $cantons = Canton::select('name', 'price_per_hour')
            ->orderBy('name')
            ->get();

        return view('services', [
            'cantons' => $cantons,
            'serviceKeys' => $this->serviceKeys,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_prefix' => 'required|string|max:10',
            'phone_number' => 'required|string|max:20',
            'canton' => 'required|string|max:255',
            'services' => 'required|string',
            'hours' => 'nullable|integer|min:0',
            'total_price' => 'nullable|integer|min:0',
            'service_date' => 'nullable|date',
        ]);

        $validated['hours'] = $validated['hours'] ?? 0;
        $validated['total_price'] = $validated['total_price'] ?? 0;

        $client = Client::create($validated);

        // Send emails AFTER the response (no delay for the user)
        $data = $validated;
        defer(fn () => $this->sendAdminEmail($data));
        defer(fn () => $this->sendClientConfirmation($client));

        return redirect()->back()->with('success', __('services.success'));
    }

    public function adminIndex()
    {
        $clients = Client::select('id', 'first_name', 'last_name', 'email', 'phone_prefix', 'phone_number', 'canton', 'services', 'hours', 'total_price', 'service_date', 'created_at')
            ->latest()
            ->paginate(15);

        return view('admin.clients', compact('clients'));
    }

    protected function sendAdminEmail(array $data): void
    {
        try {
            Mail::raw(
                "Neue Kundenanfrage:\n\n" .
                "Name: {$data['first_name']} {$data['last_name']}\n" .
                "E-Mail: {$data['email']}\n" .
                "Telefon: {$data['phone_prefix']} {$data['phone_number']}\n" .
                "Kanton: {$data['canton']}\n" .
                "Dienstleistungen: {$data['services']}\n" .
                "Stunden: {$data['hours']}\n" .
                "Gesamtpreis: CHF {$data['total_price']}\n" .
                "Startdatum: " . ($data['service_date'] ?? 'Nicht angegeben'),
                function ($message) {
                    $message->to('info@janiracare.ch')
                        ->subject('Neue Kundenanfrage - Janira Care');
                }
            );
        } catch (\Exception $e) {
            report($e);
        }
    }

    protected function sendClientConfirmation(Client $client): void
    {
        try {
            $body = "Guten Tag\n\n" .
                "Vielen Dank für Ihre Anfrage und das Vertrauen in Janira Care – Pflege durch Angehörige.\n" .
                "Wir haben Ihre Angaben erfolgreich erhalten.\n\n" .
                "Unser Team prüft nun Ihre Anfrage sorgfältig. Wir melden uns innert 24 Stunden bei Ihnen, um die nächsten Schritte zu besprechen und allfällige Fragen zu klären.\n\n" .
                "Wir freuen uns darauf, Sie zu unterstützen und gemeinsam eine passende Lösung für Ihre Situation zu finden.\n\n" .
                "Freundliche Grüsse\n" .
                "Janira Care\n" .
                "Telefon: +41 71 422 77 77\n" .
                "E-Mail: info@janiracare.ch\n";

            Mail::raw($body, function ($message) use ($client) {
                $message->to($client->email)
                    ->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Ihre Anfrage bei Janira Care');
            });
        } catch (\Exception $e) {
            report($e);
        }
    }

    public function viewPdf(Client $client)
    {
        $pdf = Pdf::loadView('pdf.client', compact('client'));
        return $pdf->stream("client-{$client->id}.pdf");
    }

    public function downloadPdf(Client $client)
    {
        $pdf = Pdf::loadView('pdf.client', compact('client'));
        return $pdf->download("client-{$client->id}.pdf");
    }
}
