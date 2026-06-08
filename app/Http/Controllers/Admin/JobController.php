<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('canton')->withCount('applications')->latest()->paginate(20);
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cantons = \App\Models\Canton::whereIn('name', ['St. Gallen', 'Zürich'])->orderBy('name')->get();
        return view('admin.jobs.create', compact('cantons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'nullable|string|max:255',
            'title_en'       => 'nullable|string|max:255',
            'title_de'       => 'nullable|string|max:255',
            'title_sq'       => 'nullable|string|max:255',
            'title_fr'       => 'nullable|string|max:255',
            'description'    => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'description_sq' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'location'       => 'nullable|string|max:255',
            'canton_id'      => 'nullable|exists:cantons,id',
            'employment_type' => 'nullable|string|max:255',
            'requirements'   => 'nullable|string',
            'requirements_en' => 'nullable|string',
            'requirements_de' => 'nullable|string',
            'requirements_sq' => 'nullable|string',
            'requirements_fr' => 'nullable|string',
            'we_offer'       => 'nullable|string',
            'we_offer_en'    => 'nullable|string',
            'we_offer_de'    => 'nullable|string',
            'we_offer_sq'    => 'nullable|string',
            'we_offer_fr'    => 'nullable|string',
            'is_active'      => 'boolean',
        ]);

        Job::create($validated);

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $job->load('applications');
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $cantons = \App\Models\Canton::whereIn('name', ['St. Gallen', 'Zürich'])->orderBy('name')->get();
        return view('admin.jobs.edit', compact('job', 'cantons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title'          => 'nullable|string|max:255',
            'title_en'       => 'nullable|string|max:255',
            'title_de'       => 'nullable|string|max:255',
            'title_sq'       => 'nullable|string|max:255',
            'title_fr'       => 'nullable|string|max:255',
            'description'    => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'description_sq' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'location'       => 'nullable|string|max:255',
            'canton_id'      => 'nullable|exists:cantons,id',
            'employment_type' => 'nullable|string|max:255',
            'requirements'   => 'nullable|string',
            'requirements_en' => 'nullable|string',
            'requirements_de' => 'nullable|string',
            'requirements_sq' => 'nullable|string',
            'requirements_fr' => 'nullable|string',
            'we_offer'       => 'nullable|string',
            'we_offer_en'    => 'nullable|string',
            'we_offer_de'    => 'nullable|string',
            'we_offer_sq'    => 'nullable|string',
            'we_offer_fr'    => 'nullable|string',
            'is_active'      => 'boolean',
        ]);

        $job->update($validated);

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job deleted successfully!');
    }

    /**
     * Display job applications
     */
    public function applications(Job $job)
    {
        $applications = $job->applications()->latest()->paginate(20);
        return view('admin.jobs.applications', compact('job', 'applications'));
    }

    /**
     * Mark application as read
     */
    public function markAsRead(JobApplication $application)
    {
        $application->update(['is_read' => true]);
        return back()->with('success', 'Application marked as read!');
    }

    /**
     * Download or preview the uploaded cover letter file.
     */
    public function coverLetterPdf(JobApplication $application)
    {
        try {
            $coverLetterPath = $application->cover_letter;

            if (!$coverLetterPath) {
                return response()->json([
                    'error' => 'Cover letter not found',
                ], 404);
            }

            // New flow: cover letter is stored as an uploaded file path.
            if (Storage::disk('public')->exists($coverLetterPath)) {
                $absolutePath = Storage::disk('public')->path($coverLetterPath);
                $extension = strtolower(pathinfo($coverLetterPath, PATHINFO_EXTENSION));
                $filename = 'cover-letter-' . str($application->first_name . '-' . $application->last_name)->slug();
                $downloadName = $filename . ($extension ? '.' . $extension : '');
                $mimeType = Storage::disk('public')->mimeType($coverLetterPath) ?: 'application/octet-stream';

                return response()->file($absolutePath, [
                    'Content-Type' => $mimeType,
                    // Keep PDFs inline for quick admin preview; download office docs.
                    'Content-Disposition' => ($extension === 'pdf' ? 'inline' : 'attachment') . '; filename="' . $downloadName . '"',
                    'X-Content-Type-Options' => 'nosniff',
                ]);
            }

            // Legacy fallback: older records may contain plain cover-letter text.
            ini_set('memory_limit', '256M');
            set_time_limit(60);

            $application->load('job');

            $filename = 'cover-letter-' . str($application->first_name . '-' . $application->last_name)->slug() . '.pdf';

            $pdf = Pdf::loadView('pdf.cover-letter', compact('application'))
                ->setPaper('a4', 'portrait');

            $output = $pdf->output();

            return response($output, 200)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"')
                ->header('Content-Length', strlen($output))
                ->header('Cache-Control', 'private, max-age=0, must-revalidate')
                ->header('Pragma', 'public');
                
        } catch (\Exception $e) {
            // Log error
            \Log::error('PDF Generation Error: ' . $e->getMessage(), [
                'application_id' => $application->id,
                'trace' => $e->getTraceAsString()
            ]);
            
            // Return error response
            return response()->json([
                'error' => 'Failed to generate PDF',
                'message' => config('app.debug') ? $e->getMessage() : 'Please contact administrator'
            ], 500);
        }
    }
}
