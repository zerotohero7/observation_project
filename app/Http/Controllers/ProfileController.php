<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;

class ProfileController extends Controller
{
    // Show the profile edit form
    public function edit()
    {
        // For simplicity, assuming there is only one user with id = 1
        $user = Utilisateur::find(1);
        return view('profile.edit', compact('user'));
    }

    // Update the user profile
    public function update(Request $request)
    {
        // For simplicity, assuming there is only one user with id = 1
        $user = Utilisateur::find(1);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,email,' . $user->id,
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|string|in:Parent 1,Parent 2',
        ]);

        $user->update($request->all());

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }
}
