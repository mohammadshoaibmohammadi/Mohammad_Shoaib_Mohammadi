<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // First I check the data that the user entered in the register form.
        // The email must be unique and the password must be at least 8 characters.
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Here I make a new User object.
        // This User model is connected to the "users" table in the database.
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];

        // I do not save the real password directly.
        // Hash::make() changes it to a secure hash before saving it in MySQL.
        $user->password = Hash::make($data['password']);

        // This line saves the new user's name, email and hashed password
        // into the users table of the it_auth_lab MySQL database.
        $user->save();

        // After registration I send the user to the login page.
        return redirect()
            ->route('login')
            ->with('success', 'Account created. Please log in.');
    }

    public function login(Request $request)
    {
        // I validate the login form before checking the account.
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Auth::attempt() checks the email and password with the user stored in MySQL.
        // Laravel automatically compares the entered password with the saved hash.
        $accepted = Auth::attempt($credentials);

        // If the email or password is wrong, I return to the login form with an error.
        if (! $accepted) {
            return back()->withErrors([
                'email' => 'Email or password is incorrect.',
            ])->onlyInput('email');
        }

        // After a successful login I regenerate the session for better security.
        $request->session()->regenerate();

        // Then I send the logged-in user to the dashboard.
        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        // This removes the current logged-in user from authentication.
        Auth::logout();

        // I remove the old session data and make a new CSRF token.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // After logout I send the user back to the login page.
        return redirect()->route('login');
    }
}
