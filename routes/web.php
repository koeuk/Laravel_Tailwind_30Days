<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
    // $jobs = Job::all();

    // dd($jobs[1]->salary ?? 'No job found');
});
// ----------------------------------------------------------------
Route::get('/about',    function () {
    return view('about');
});
// ----------------------------------------------------------------

Route::get('/contact', function () {
    return view('contact');
});
// ----------------------------------------------------------------


// ----------------------------------------------------------------

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all(),
    ]);
});
// ----------------------------------------------------------------

Route::get('/jobs/{id}', function ($id) {
    // dd($id);
    $job = Job::findByid($id);
    // Use Arr::first to find the job by id
    // $job = Arr::first(Job::all(), fn($job) => $job['id'] == $id);
    // Return view with the job
    return view('job', ['job' => $job]);
});
