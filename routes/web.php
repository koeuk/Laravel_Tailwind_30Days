<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\SesstionController;
use Illuminate\Support\Facades\Route;

// Get home
Route::view('/', 'home');

Route::get('/jobs', [JobController::class, 'destroy']);
// use resource for route can be index, create, store, edit, update, 
Route::resource('jobs', JobController::class);

// Auth

Route::get('/register', [RegisteredController::class, 'create']);
Route::post('/register', [RegisteredController::class, 'store']);

Route::get('/login', [SesstionController::class, 'create']);
Route::post('/login', [SesstionController::class, 'store']);

// --------------------------------------------------------------------------

// Route::controller(JobController::class)->group(function(){
// Route::get('/jobs',  'index');
// Route::get('/jobs/create', 'create');
// Route::post('/jobs',  'store');
// Route::get('/jobs/{job}',  'show');
// Route::get('/jobs/{job}/edit',  'edit');
// Route::patch('jobs/{job}',  'update');
// Route::delete('jobs/{job}',  'destroy');
// });

// --------------------------------------------------------------------------

// // Index Page
// Route::get('/jobs', [JobController::class, 'index']);
// // Create Job
// Route::get('/jobs/create',[JobController::class, 'create']);
// // Store Job
// Route::post('/jobs', [JobController::class, 'store']);
// // Show Job
// Route::get('/jobs/{job}', [JobController::class, 'show']);
// // Edit Job
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
// // Update Job
// Route::patch('jobs/{job}', [JobController::class, 'update']);
// // Delete Job
// Route::delete('jobs/{job}', [JobController::class, 'destroy']);

// --------------------------------------------------------------------------
// Get about
Route::view('/about',    'about');
// Get Contact 
Route::view('/contact', 'contact');
