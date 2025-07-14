<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Show a list of all users (Admin only).
     */
    public function index()
    {

        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Delete or disable a user (Admin only).
     */
    public function destroy(User $user)
    {

        if (auth()->id() === $user->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete(); // Or: $user->update(['active' => false]);

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
