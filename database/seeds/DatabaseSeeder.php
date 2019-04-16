<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Languages;
use App\Model\Setting;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Admin Acount Seeding
            $add = new User;
            $add->name = 'karim';
            $add->email= 'karim@admin.com';
            $add->password = Hash::make(123456);
            $add->phone = '01126878406';
            $add->prefix = 'karim';
            $add->level = 'admin';
            $add->save();

            //Language Seeding
            $language = new Languages;
            $language->language = "English";
            $language->prefix = "en";
            $language->direction = "ltr";
            $language->save();

        //Setting Seeding
        $appSetting = new Setting;
        $appSetting->sitename = "Cure2Us";
        $appSetting->email = "admin@cure2us.com";
        $appSetting->save();
    }
}
