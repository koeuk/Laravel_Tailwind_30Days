<?php

namespace App\Models;

use Illuminate\Support\Arr;

// use Illuminate\Database\Eloquent\Model;

class Job
{
    public static function all()
    {
        return [
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
    }

    public static function findById(int|string $id):array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);
        if (! $job) {
            // if no job exists will return 404 Not Found
            abort(404);
            // dd('kd');
        };
        // dd($id);

        return ($job);
    }
}
