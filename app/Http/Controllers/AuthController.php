<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function logout()
    {
        // Logout logic
    }
}
