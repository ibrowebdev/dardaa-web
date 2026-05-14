<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJobRequest;
use App\Http\Requests\Admin\UpdateJobRequest;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminJobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::query();

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
        }

        $jobs = $query->paginate(15)->appends($request->query());

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(StoreJobRequest $request)
    {
        Job::create($request->validated());
        return redirect()->route('admin.jobs.index')->with('success', 'Job vacancy created successfully.');
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->validated());
        return redirect()->route('admin.jobs.index')->with('success', 'Job vacancy updated successfully.');
    }

    public function destroy(Job $job)
    {
        // Optionally clean up attached applications & cvs
        foreach ($job->applications as $app) {
            if ($app->resume_path) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $app->resume_path));
            }
            $app->delete();
        }
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Job vacancy and applications deleted.');
    }

    /**
     * Applications Operations
     */

    public function applications(Job $job)
    {
        $applications = $job->applications()->latest()->paginate(15);
        return view('admin.jobs.applications.index', compact('job', 'applications'));
    }

    public function viewApplication(Job $job, JobApplication $application)
    {
        return view('admin.jobs.applications.show', compact('job', 'application'));
    }

    public function destroyApplication(Job $job, JobApplication $application)
    {
        if ($application->resume_path) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $application->resume_path));
        }

        $application->delete();

        return redirect()->route('admin.jobs.applications', $job)->with('success', 'Job application deleted successfully.');
    }
}
