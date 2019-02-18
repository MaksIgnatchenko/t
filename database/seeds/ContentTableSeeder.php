<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 09.11.2017
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ContentTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('contents')->insert([
            'key' => 'terms_and_conditions',
            'title' => 'Terms & Conditions',
            'value' => 'Terms & Conditions text',
        ]);

        DB::table('contents')->insert([
            'key' => 'privacy_policy',
            'title' => 'Privacy Policy',
            'value' => 'Privacy Policy text',
        ]);
    }
}

