<?php

namespace App\Http\Controllers\Admin;

use App\Model\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Validator;
use Up;

class SettingsController extends Controller
{
    public $imagesPath = "/assets/images/website/";

    public function index()
    {
    }

    /* -- -- -- -- Update Settings Starts -- -- -- -- */

    public function setting_save(SettingRequest $request)
    {
    }
}
