<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/about',    function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () {
    // $jobs = Job::with('employer')->paginate(3);
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    // $jobs = Job::with('employer')->cursorPaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});

Route::get('/jobs/create', function() {
    return view('jobs.create');
});
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    // Validation
    // request()->validate([
    //     'title' =>'required|max:255',
    //     'salary' =>'required|numeric',
    // ]);

    // Create new job
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 2,
    ]);

    // Redirect to job show page
    return redirect('/jobs');
});

