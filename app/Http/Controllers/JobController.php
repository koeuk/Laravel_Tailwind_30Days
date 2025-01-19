<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index () {
        // dd("dfj");
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        // $jobs = Job::with('employer')->paginate(3);
        // $jobs = Job::with('employer')->cursorPaginate(3);
        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function create() {
        return view('jobs.create');
    }

    public function store () {
        request()->validate([
            'title' => ['required', 'min:5'],
            'salary' => ['required'],
        ]);
    
        // Create new job
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
        // Redirect to job show page
        return redirect('/jobs');
    }

    public function show (Job $job) {
        return view('jobs.show', ['job' => $job]);

    }

    public function edit (Job $job) {
        return view('jobs.edit', ['job' => $job]);

    }

    public function update (Job $job) {
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

    public function delete () {

    }

    public function destroy (Job $job) {

        $job->delete();

        return redirect('/jobs');
    }
}
