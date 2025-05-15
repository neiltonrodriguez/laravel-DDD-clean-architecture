<?php

namespace App\Application\Website\Controllers;

use App\Infrastructure\Laravel\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function create()
    {
        $rand = rand();
        User::create([
            'name' => "Example {$rand}",
            'email' => "Example_{$rand}@gmail.com",
            'password' => bcrypt("example_{$rand}")
        ]);

        return User::all();
    }
}