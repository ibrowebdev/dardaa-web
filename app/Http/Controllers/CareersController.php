<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplicationRequest;
use App\Mail\JobApplicationReceived;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Mail;

class CareersController extends Controller
{
    public function index()
    {
        $jobs = Job::where('is_active', true)->latest()->get();

        return view('pages.careers.index', compact('jobs'));
    }

    public function show(Job $slug)
    {
        $job = $slug;
        abort_unless($job->is_active, 404);

        return view('pages.careers.show', compact('job'));
    }

    public function apply(JobApplicationRequest $request, Job $slug)
    {
        $job = $slug;
        $cvPath = $request->file('cv')->store('public/cvs');

        $application = JobApplication::create([
            'job_id' => $job->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'cover_letter' => $request->cover_letter,
            'cv_path' => $cvPath,
        ]);

        try {
            Mail::to(config('mail.from.address'))->send(new JobApplicationReceived($application));
        } catch (\Exception $e) {
            report($e);
        }

        return redirect()->route('careers.show', $job->slug)->with('success', 'Your application has been submitted successfully! We\'ll review it and get back to you soon.');
    }
}
