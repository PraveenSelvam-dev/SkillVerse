<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'nullable|in:student,instructor,mentor'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'] ?? 'student',
        ]);

        // Create wallet logic (assuming Wallet model exists or is handled elsewhere, we can just log or create a placeholder if it doesn't)
        // $user->wallet()->create(['balance' => 0]);
        if (class_exists('\App\Models\Wallet')) {
            $user->wallet()->create(['balance' => 0]);
        }

        Auth::login($user);
        
        $role = $user->role;
        if ($role === 'instructor') {
            return redirect()->route('instructor.dashboard');
        } elseif ($role === 'mentor') {
            return redirect()->route('mentor.dashboard'); // Adjust based on your routes
        }

        return redirect()->route('student.dashboard'); // Adjust based on your routes
    }
}
