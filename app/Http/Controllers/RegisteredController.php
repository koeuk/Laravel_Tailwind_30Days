<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredController extends Controller
{
    public function create() {
        return view('auth.resgister');
    }

    public function store() {
        // dd("df");
        // return (request()->all());
        // validate
        $attributes = request()->validate([
            'first_name'        => ['required'],
            'last_name'         => ['required'],
            'email'             => ['required', 'email'],
            'password'          => ['required', Password::min(6),'confirmed'],// confirm_password //Password::min(5)->letters()->numbers()->max(5)
            // 'confirm_password'  => ['required'],
        ]);
        // Create user

        $user = User::create($attributes);
        Auth::login($user);
        return redirect('/jobs');

        // dd ($validateAttributes);
    }
}
