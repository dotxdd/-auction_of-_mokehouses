<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the user's profile page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('profile.profile', ['user' => auth()->user()]);
    }
}
