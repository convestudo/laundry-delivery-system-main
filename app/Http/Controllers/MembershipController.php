<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MembershipController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'customer')->paginate(10);
        return view('memberships.index', compact('customers'));
    }


    public function create()
    {
        return view('memberships.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer',
        ]);

        return redirect()->route('memberships.index')->with('success', 'Customer added successfully.');
    }


    public function edit($id)
    {
        $user = User::where('role', 'customer')->findOrFail($id);
        return view('memberships.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('role', 'customer')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:8',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('memberships.index')->with('success', 'Customer updated successfully.');
    }

    // public function destroy($id)
    // {
    //     $user = User::where('role', 'customer')->findOrFail($id);
    //     $user->delete();

    //     return redirect()->route('memberships.index')->with('success', 'Customer deleted successfully.');
    // }


}
