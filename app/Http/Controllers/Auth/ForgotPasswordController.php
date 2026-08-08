<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        
        // This is a placeholder for actual password reset logic
        // Normally you'd use Password::broker()->sendResetLink(...)
        
        return back()->with('success', 'If an account exists with this email, a reset link will be sent.');
    }
}
