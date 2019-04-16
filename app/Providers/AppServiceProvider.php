<?php

namespace App\Providers;

use App\Model\Setting;
use App\Model\Languages;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    { }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        /* -- -- -- -- Languages Starts -- -- -- -- */

        $_languages = Languages::where('status', '1')->get();

        if (isset($_GET['lang'])) {
            $language_slug = $_GET['lang'];
        } else {
            $language_slug = 'en';
        }
        $languages = Languages::where('prefix', '=', $language_slug)->first();
        if ($languages) {
            $language_prefix = $languages->prefix;
        } else {
            $languages = Languages::where('prefix', '=', 'en')->first();
            $language_prefix = $languages->prefix;
        }
        // $keysLanguages->where('key', 'Home')->first()->values->where('language_id', $keyLanguage->id)->first()->value
        /* -- -- -- -- Languages Ends -- -- -- -- */
        /* -- -- -- -- Setting Starts -- -- -- -- */
        $settings = Setting::first();
        /* -- -- -- -- Setting Ends -- -- -- -- */

        View::share('language_prefix', $language_prefix);
        View::share('languages', $_languages);
        View::share('setting', $settings);
    }
}
