<?php
/**
 * ======================================
 * This File For Getting Language Values
 * ======================================
 * PLEASE DON'T MISS WITH IT UNLESS UR KNOW WHAT YOU DO
 */

use App\Model\Languages;

use App\Model\Labels_Keys;

// THIS FUNCTION IS USED FOR FRONTEND AND ANOTHER PORPOSES

if (!function_exists('getLanguageValue')) {
    function getLanguageValue($key)
    {
        if (isset($_GET['lang'])) {
            $language_slug = $_GET['lang'];
        } else {
            $language_slug = 'en';
        }

        $languages = Languages::where('prefix', '=', $language_slug)->first();
        if (isset($languages)) {
            $languages = $languages;
        } else {
            $languages = Languages::where('prefix', '=', $language_slug)->first();
        }

        $keysLanguages = Labels_Keys::all();
        try {
            $value = $keysLanguages->where('key', $key)->first()->values->where('language_id', $languages->id)->first()->value;
            return $value;
        } catch (ErrorException $error) {
            return $key;
        }
    }
}
// THIS FUNCTION IS USED FOR BACKEND AND ANOTHER PORPOSES
if (!function_exists('get1LanguageValue')) {
    function get1LanguageValue($key, $language_id)
    {
        $keysLanguages = Labels_Keys::all();
        try {
            $value = $keysLanguages->where('key', $key)->first()->values->where('language_id', $language_id)->first()->value;
            return $value;
        } catch (ErrorException $error) {
            return '';
        }
    }
}

// THIS FUNCTION IS USED FOR RETURNING LANGUAGE PREFIX FOR LANG ATTRIBUTTE IN HTML TAG
if (!function_exists('getLanguagePrefix')) {
    function getLanguagePrefix()
    {
        if (isset($_GET['lang'])) {
            $language_slug = $_GET['lang'];
        } else {
            $language_slug = 'en';
        }

        $languages = Languages::where('prefix', '=', $language_slug)->first();
        if (isset($languages)) {
            $languages = $languages;
        } else {
            $languages = Languages::where('prefix', '=', $language_slug)->first();
        }

        return $languages->prefix;
    }
}

if (!function_exists('getLanguageDirection')) {
    function getLanguageDirection()
    {
        if (isset($_GET['lang'])) {
            $language_slug = $_GET['lang'];
        } else {
            $language_slug = 'en';
        }

        $languages = Languages::where('prefix', '=', $language_slug)->first();
        if (isset($languages)) {
            $languages = $languages;
        } else {
            $languages = Languages::where('prefix', '=', $language_slug)->first();
        }

        return $languages->direction;
    }
}
