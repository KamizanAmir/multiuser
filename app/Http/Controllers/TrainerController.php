<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = User::where('role', 2)->get(); // Assuming 'role' is the name of the column in your users table
        return view('manage-trainer', compact('trainers'));
    }
    public function edit($id)
    {
        $trainer = User::findOrFail($id);
        return view('trainers.edit', compact('trainer'));
    }

    public function update(Request $request, $id)
    {
        $trainer = User::findOrFail($id);
        // Validate and update the trainer
    }

    public function destroy($id)
    {
        $trainer = User::findOrFail($id);
        $trainer->delete();
        // Redirect to manage trainers view with a success message
    }


    public function create()
    {
        // Return the view with the form to add a trainer
        return view('add-trainer');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 2, // Set the role for the user as Admin
            'email_verified_at' => Carbon::now(), // You can set this to now() if you want to auto-verify
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Handle what happens next - maybe redirecting to a confirmation page or back to the form with a success message.
        return redirect()->back()->with('status', 'Trainer added successfully!');
    }
}
