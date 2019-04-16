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

        $image = $request->file('profile_image');
        $image_name = rand() . "_" . rand() . "_" . $image->getClientOriginalName();
        $upload_path = public_path() . $this->path;
        $image->move($upload_path, $image_name);

        $user = User::find(Auth::user()->id);

        if (File::exists(public_path() . $this->path . $user->profile_image)) {
            File::delete(public_path() . $this->path . $user->profile_image);
        }

        $user->profile_image = $image_name;

        if ($user->update()) {
            return redirect()->back()->with('status', 'updated');
        }

        return redirect()->back()->with('status', 'error');
    }

    public function updateAddress(Request $request)
    {
        $this->validate($request, [
            'address_value' => 'required|string|max: 255'
        ]);
        $user = User::find(Auth::user()->id);
        $user->address = $request->address_value;
        if ($user->update()) {
            return $user;
        }
        return 'error';
    }

    public function updatePhone(Request $request)
    {
        $this->validate($request, [
            'phone_value' => 'required|string|max:255'
        ]);

        $user = User::find(Auth::user()->id);
        try {
            $user->phone = $request->phone_value;
            if ($user->update()) {
                return $user;
            }
        } catch (QueryException $th) {
            return 'error';
        }
    }

    public function updateInfo(Request $request)
    {
        $this->validate($request, [
            'info' => 'required|string|max:1000'
        ]);

        $user = User::find(Auth::user()->id);
        try {
            $user->about = $request->info;
            if ($user->update()) {
                return $user;
            }
        } catch (QueryException $th) {
            return 'error';
        }
    }

    public function updatePassword(PasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        if ($user->update()) {
            Auth::logout();
            return redirect()->route('login')->with('status', 'update');
        }
        return redirect()->back()->with('status', 'error');
    }
}
