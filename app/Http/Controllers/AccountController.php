<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function login() {

        return view('auth/login');
    }

    public function loginPost(LoginRequest $request) : RedirectResponse {

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('home.index', absolute: false));
    }
}
