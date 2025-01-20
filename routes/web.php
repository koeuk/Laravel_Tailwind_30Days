<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\SesstionController;
use Illuminate\Support\Facades\Route;

// Get home
// Route::view('/', 'home');

// Route::get('/jobs', [JobController::class, 'destroy']);
// use resource for route can be index, create, store, edit, update, 
// Route::resource('jobs', JobController::class)->only(['index', 'show']);
// Route::resource('jobs', JobController::class)->except('index', 'show')->middleware('auth');

Route::get('/jobs',  [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs',  [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}',  [JobController::class, 'show']);
Route::get('/jobs/{job}/edit',  [JobController::class, 'edit'])->middleware('auth')->can('edit','job');
Route::patch('jobs/{job}',  [JobController::class, 'update']);
Route::delete('jobs/{job}',  [JobController::class, 'destroy']);

// Auth

Route::get('/register', [RegisteredController::class, 'create']);
Route::post('/register', [RegisteredController::class, 'store']);

Route::get('/login', [SesstionController::class, 'create'])->name('login');
Route::post('/login', [SesstionController::class, 'store']);

Route::post('/logout', [SesstionController::class, 'destroy']);

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
