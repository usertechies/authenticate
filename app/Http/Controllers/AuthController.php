<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Registration
    public function register(Request $request) {
        if ($request->isMethod("post")) {
            $request->validate([
                "name" => "required|string",
                "email" => "required|email|unique:users",
                "phone" => "required",
                "password" => "required"
            ]);

            User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "phone" => $request->phone
            ]);

            // Attempt to log the user in
            if (Auth::attempt([
                "email" => $request->email,
                "password" => $request->password
            ])) {
                // Redirect to the dashboard if login is successful
                return redirect()->route('dashboard');
            }

            // If login attempt fails, redirect back to the registration page
            return redirect()->route('register')->withErrors(['login' => 'Authentication failed after registration.']);
        }

        // Show the registration form
        return view("auth.register");
    }

    // Login
    public function login(Request $request) {
        if ($request->isMethod("post")) {
            $request->validate([
                "email" => "required|email",
                "password" => "required"
            ]);

            if (Auth::attempt([
                "email" => $request->email,
                "password" => $request->password
            ])) {
                // Redirect to the dashboard if login is successful
                return redirect()->route('dashboard');
            }

            // If login attempt fails, redirect back to the login page with an error
            return redirect()->route('login')->withErrors(['login' => 'Invalid credentials.']);
        }

        // Show the login form
        return view("auth.login");
    }

    // Dashboard
    public function dashboard() {
        // After Login
        return view("dashboard");
    }

    // Profile
    public function profile() {
        return view("profile");
    }

    // Logout
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
