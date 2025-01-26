<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        // dd("dfj");
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        // $jobs = Job::with('employer')->paginate(3);
        // $jobs = Job::with('employer')->cursorPaginate(3);
        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:5'],
            'salary' => ['required'],
        ]);

        // Create new job
        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
        Mail::to($job->employer->user)->send(new JobPosted($job));
        // return 'Email sent already';
        // Redirect to job show page
        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {

    
        // if (Auth::guest()) {
        //     return redirect('/login');
        // }

        // Gate::authorize('edit-job', $job);

        if ($job->employer->user->isNot(Auth::user())) {
            abort(403);
        }
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        Gate::authorize('edit-job', $job);

        request()->validate([
            'title' => ['required', 'min:5'],
            'salary' => ['required'],
        ]);

        // $job = Job::findOrFail($id);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs');
    }

    public function delete() {}

    public function destroy(Job $job)
    {
        Gate::authorize('edit-job', $job);

        $job->delete();

        return redirect('/jobs');
    }
}
