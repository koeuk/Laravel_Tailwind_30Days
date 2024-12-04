<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'koeuk',
        'name' => 'kos',
    ]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id'        => '1',
                'title'     => 'Developer',
                'salary'    => '$20000',
            ],
            [
                'id'        => '2',
                'title'     => 'Teacher',
                'salary'    => '$25000',
            ],
            [
                'id'        => '3',
                'title'     => 'UX/UI',
                'salary'    => '$2000'
            ]
        ]
    ]);
});


Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id'        => '1',
            'title'     => 'Developer',
            'salary'    => '$20000',
        ],
        [
            'id'        => '2',
            'title'     => 'Teacher',
            'salary'    => '$25000',
        ],
        [
            'id'        => '3',
            'title'     => 'UX/UI',
            'salary'    => '$2000',
        ],
    ];

    // Use Arr::first to find the job by id
    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
// dd($job);
    // Return view with the job
    return view('job', ['job' => $job]);
});
