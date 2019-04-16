<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'country_name' => 'required|string|max:255',
                    'country_code' => 'required|string|max:255|unique:countries,code',
                    'country_image' => 'image|mimes:jpeg,bmp,png,jpg|max:2048',
                    'main_country' => 'numeric',
                ];
                break;

            case 'PATCH':
                return [
                    'country_name' => 'required|string|max:255',
                    'country_code' => 'required|string|max:255',
                    'country_image' => 'image|mimes:jpeg,bmp,png,jpg|max:2048',
                    'main_country' => 'numeric',
                ];
                break;
            default:
                # code...
                break;
        }
    }
}
