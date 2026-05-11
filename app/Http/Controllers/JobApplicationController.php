<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use App\Notifications\NewJobApplicationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of active jobs.
     */
    public function index()
    {
        $jobs = Job::where('is_active', true)->latest()->paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for applying to a specific job.
     */
    public function create(Job $job)
    {
        if (!$job->is_active) {
            return redirect()->route('jobs.index')
                ->with('error', 'Kjo punë nuk është më aktive.');
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
            'cover_letter' => 'nullable|string',
        ]);

        // Upload CV
        $cvPath = $request->file('cv')->store('cvs', 'public');

        // Create application
        $application = JobApplication::create([
            'job_id' => $job->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'cv_path' => $cvPath,
            'cover_letter' => $validated['cover_letter'] ?? null,
        ]);

        // Send notification to admin users
        $admins = User::all(); // Modify if you have specific admin role
        Notification::send($admins, new NewJobApplicationNotification($application));

        return redirect()->route('jobs.index')
            ->with('success', 'Aplikimi juaj u dërgua me sukses! Do të kontaktoheni së shpejti.');
    }
}
