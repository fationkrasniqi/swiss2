<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Notifications\NewJobApplicationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of active jobs.
     */
    public function index(Request $request)
    {
        $query = Job::with('canton')->where('is_active', true);

        // Filter by canton if specified
        if ($request->filled('canton')) {
            $query->where('canton_id', $request->canton);
        }

        $jobs = $query->latest()->paginate(10);
        
        // Get only cantons that have active jobs with job count
        $cantons = \App\Models\Canton::whereHas('jobs', function($q) {
            $q->where('is_active', true);
        })->withCount(['jobs' => function($q) {
            $q->where('is_active', true);
        }])->orderBy('name')->get();

        // Return JSON for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'jobs' => $jobs->items(),
                'pagination' => [
                    'current_page' => $jobs->currentPage(),
                    'last_page' => $jobs->lastPage(),
                    'per_page' => $jobs->perPage(),
                    'total' => $jobs->total(),
                ],
            ]);
        }

        return view('jobs.index', compact('jobs', 'cantons'));
    }

    /**
     * Show the form for applying to a specific job.
     */
    public function create(Job $job)
    {
        if (!$job->is_active) {
            return redirect()->route('jobs.index')
                ->with('error', __('jobs.job_not_active'));
        }

        return view('jobs.apply', compact('job'));
    }

    /**
     * Store a newly created job application.
     */
    public function store(Request $request, Job $job)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120', // Max 5MB
            'cover_letter' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // Upload CV
        $cvPath = $request->file('cv')->store('cvs', 'public');

        // Upload Cover Letter (if provided)
        $coverLetterPath = null;
        if ($request->hasFile('cover_letter')) {
            $coverLetterPath = $request->file('cover_letter')->store('cover-letters', 'public');
        }

        // Create application
        $application = JobApplication::create([
            'job_id' => $job->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'cv_path' => $cvPath,
            'cover_letter' => $coverLetterPath,
        ]);

        // Send notification to admin email
        $adminEmail = config('mail.admin_notification_email');
        Notification::route('mail', $adminEmail)
            ->notify(new NewJobApplicationNotification($application));

        return redirect()->route('jobs.index')
            ->with('success', __('jobs.success_message'));
    }
}
