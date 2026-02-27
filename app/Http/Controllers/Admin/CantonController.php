<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Canton;
use Illuminate\Http\Request;

class CantonController extends Controller
{
    public function index()
    {
        $cantons = Canton::orderBy('name')->get();
        return view('admin.cantons', compact('cantons'));
    }

    public function update(Request $request, Canton $canton)
    {
        $validated = $request->validate([
            'price_per_hour' => 'required|numeric|min:0',
        ]);

        $canton->update($validated);
        cache()->forget('canton_prices');

        return redirect()->back()->with('success', "Price updated for {$canton->name}.");
    }

    public function getPrices()
    {
        return response()->json(Canton::priceMap());
    }
}
