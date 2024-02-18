<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::where('role', 3)->get();
        return view('manage-employee', compact('employees'));
    }
    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = User::findOrFail($id);
        // Perform validation if necessary
        $employee->update($request->all());
        return redirect()->route('manage-employee.index')->with('status', 'Employer updated successfully!');
    }
    

    public function destroy($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();
        // Redirect to manage employee view with a success message
        return redirect('/manage-employee')->with('success', 'Employee deleted successfully');
    }


    public function create()
    {
        // Return the view with the form to add a employee
        return view('add-employee');
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
            'role' => 3, // Set the role for the user as Employee
            'email_verified_at' => Carbon::now(), // You can set this to now() if you want to auto-verify
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Handle what happens next - maybe redirecting to a confirmation page or back to the form with a success message.
        return redirect()->back()->with('status', 'Employee added successfully!');
    }
}
