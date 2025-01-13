<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Get home
Route::get('/', function () {
    return view('home');
});
// Get about
Route::get('/about',    function () {
    return view('about');
});
// Get Contact 
Route::get('/contact', function () {
    return view('contact');
});

// Index Page
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    // $jobs = Job::with('employer')->paginate(3);
    // $jobs = Job::with('employer')->cursorPaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});

// Create Job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Store Job
Route::post('/jobs', function () {
    // Validation
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
});

// Show Job
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});
// Edit Job
Route::get('/jobs/{id}/edit', function ($id) {

    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

// Update Job
Route::patch('jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:5'],
        'salary' => ['required'],
    ]);

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs');
});

// Delete Job
Route::delete('jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);

    $job->delete();

    return redirect('/jobs');
});
