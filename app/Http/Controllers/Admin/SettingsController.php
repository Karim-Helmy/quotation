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
        return view('admin.setting')->with('pageTitle', "Settings");
    }

    /* -- -- -- -- Update Settings Starts -- -- -- -- */

    public function setting_save(SettingRequest $request)
    {
        $appSetting = Setting::first();

        if ($request->hasFile('website_logo')) {
            if (File::exists((public_path() . $this->imagesPath . $appSetting->logo))) {
                File::delete(public_path() . $this->imagesPath . $appSetting->logo);
            }
            $image = $request->file('website_logo');
            $image_name = rand() . "_" . rand() . "_" . $image->getClientOriginalName();
            $upload_path = public_path() . $this->imagesPath;
            $image->move($upload_path, $image_name);
        } else {
            $image_name = $appSetting->logo;
        }

        if ($request->hasFile('website_favicon')) {
            if (File::exists((public_path() . $this->imagesPath . $appSetting->logo))) {
                File::delete(public_path() . $this->imagesPath . $appSetting->logo);
            }
            $image2 = $request->file('website_favicon');
            $image_name2 = rand() . "_" . rand() . "_" . $image2->getClientOriginalName();
            $upload_path2 = public_path() . $this->imagesPath;
            $image2->move($upload_path2, $image_name2);
        } else {
            $image_name2 = $appSetting->favicon;
        }

        $appSetting->sitename = $request->wesite_name;
        $appSetting->logo = $image_name;
        $appSetting->favicon = $image_name2;
        $appSetting->email = $request->webiste_email;
        $appSetting->facebook = $request->facebook;
        $appSetting->twitter = $request->twitter;
        $appSetting->youtube = $request->youtube;

        if ($appSetting->update()) {
            return redirect()->route('settings_index')->with('status', 'update');
        }
        return redirect()->back()->with('status', 'error');
    }
}
