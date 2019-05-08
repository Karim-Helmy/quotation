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
use DB;
class ProfileController extends Controller
{
    public $path = "/assets/images/users/";


    public function myProfile()
    {
        $quotations = DB::table('consultants')->where('user_id','=',Auth::user()->id)->get();
        //dd($quotations);

        return view('users.myProfile',compact('quotations'))->with('pageTitle', ucfirst(Auth::user()->name) . ' Profile');
    }
}
