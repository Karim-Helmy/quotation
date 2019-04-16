<?php

namespace App\Http\Controllers;

use App\Model\Languages;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $language_id = '1'; // 1 for english

    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function getLangID() // SET LANGUAGE ID GLOBALY
    {
        if (isset($_GET['lang'])) {
            $language_slug = $_GET['lang'];
        } else {
            $language_slug = 'en';
        }
        $languages = Languages::where('prefix', '=', $language_slug)->first();
        if (isset($languages)) {
            $this->language_id = $languages;
        } else {
            $this->language_id = Languages::where('prefix', '=', 'en')->first()->id;
        }
        return $this->language_id->id;

    }
    public static function PascalCase($str, array $noStrip = [])
    {
        // non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        // uppercase the first character of each word
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
        // $str = lcfirst($str);

        return $str;
    }
}
