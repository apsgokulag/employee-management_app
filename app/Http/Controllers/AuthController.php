<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard'); 
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'in:user,admin'],
            'password' => ['required', 'confirmed'],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, 
        ]);
        
        Auth::login($user); 
        return redirect('dashboard');
    }
    public function profile()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function editProfile()
    {
        return view('auth.edit-profile', ['user' => Auth::user()]);
    }
    
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);
        $user = Auth::user();
        $user->update($validated);
        return redirect()->route('auth.profile')->with('success', 'Profile updated successfully.');
    }
    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); 
    }
    public function makeAdmin($userId)
    {
        if (!User::user()->isAdmin()) {
            return redirect()->back()->with('error', 'Unauthorized action');
        }
        
        $user = User::find($userId);
        if ($user) {
            $user->role = 'admin';
            $user->save();
            return redirect()->back()->with('success', 'User promoted to admin');
        }
        
        return redirect()->back()->with('error', 'User not found');
    }
}
