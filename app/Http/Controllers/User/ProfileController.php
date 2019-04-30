<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordRequest;
use Illuminate\Database\QueryException;
use App\Http\Requests\uploadImageRequest;

class ProfileController extends Controller
{
    public $path = "/assets/images/users/";


    public function myProfile()
    {
        return view('users.myProfile')->with('pageTitle', ucfirst(Auth::user()->name) . ' Profile');
    }

    public function whoRate()
    { }

    public function uploadImage(uploadImageRequest $request)
    {
    }

    public function updateAddress(Request $request)
    {

    }

    public function updatePhone(Request $request)
    {

    }

    public function updateInfo(Request $request)
    {

    }

    public function updatePassword(PasswordRequest $request)
    {

    }
}
