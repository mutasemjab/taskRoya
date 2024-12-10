<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // Registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        if ($request->has('photo')) {
            $the_file_path = uploadImage('assets/admin/uploads', $request->photo);
            $user->photo = $the_file_path;
            $user->save(); 
         }

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return redirect()->route('home')->with('success', 'Login successful!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput($request->only('email', 'remember'));
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
