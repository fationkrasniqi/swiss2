<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

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
     * Download cover letter as PDF
     */
    public function coverLetterPdf(JobApplication $application)
    {
        $application->load('job');
        $pdf = Pdf::loadView('pdf.cover-letter', compact('application'));
        $filename = 'cover-letter-' . str($application->first_name . '-' . $application->last_name)->slug() . '.pdf';
        return $pdf->download($filename);
    }
}
