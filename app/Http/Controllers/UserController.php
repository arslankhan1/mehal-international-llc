<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function updateAddress(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
        ]);

        $user = Auth::user();
        $user->update([
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Address updated successfully!');
    }
}
