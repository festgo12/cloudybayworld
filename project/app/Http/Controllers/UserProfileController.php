<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function profile()
    {
        return view('profile.profile');
    }

    public function editProfile()
    {
        return view('profile.editProfile');
    }
}
