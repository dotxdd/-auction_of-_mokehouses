<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function impersonate(User $user)
    {
        if (!Auth::user()->role === 2) {
            abort(403);
        }

        Auth::loginUsingId($user->id);
        return redirect('/');
    }
}
