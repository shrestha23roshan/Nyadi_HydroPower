<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'site_name' => 'Nyadi Hydropower Limited ',
                'site_email' => ' nhl@nhl.com.np',
                'site_phone' => '+977-1-4781776, 4785736, 4785391, 4785392',
                'site_fax' => '+977-1-4785393',
                'site_pobox' => '26305',
                'site_address' => 'Ganga Devi Marg-313, Buddhanagar, Kathmandu, Nepal',
                'site_description' => 'Nyadi Hydropower Limited Description.',
                'site_logo' => null,
                'site_favicon' => null,
                'site_copyright' => 'Copyright © 2011 Nyadi Hydropower Limited | All Rights Reserved.',
                'facebook_url'=> 'url',
                'twitter_url'=> 'url',
                'linkedin_url'=> 'url',
                'instagram_url' => 'url',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
