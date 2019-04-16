<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function publicProfile($username)
    {
        if (Auth::check() && $username === Auth::user()->prefix) {
            return redirect()->route('profile.myProfile');
        }

        $user = User::where('prefix', '=', $username)->firstOrFail();
        $user->viewed = $user->viewed + 1;
        $user->update();

        return view('users.publicProfile')
            ->with('pageTitle', $user->name . ' Profile')
            ->with('user', $user);
    }
}
