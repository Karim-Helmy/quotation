<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

        public function authorize()
        {
            if (Auth::check() && Auth::user()->level === 'admin') {
                return true;
            }
            return false;
        }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'wesite_name' => 'required|string|max:255',
            'website_logo' => 'image|mimes:jpeg,bmp,png,jpg|max:2048',
            'website_favicon' => 'image|mimes:jpeg,bmp,png,jpg|max:2048',
            'facebook' => 'string|max:255',
            'twitter' => 'string|max:255',
            'youtube' => 'string|max:255'
        ];
    }
}
