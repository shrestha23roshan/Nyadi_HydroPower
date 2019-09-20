<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompanyProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_profiles')->insert([
            [
                'description' => 'In October 2006, Butwal Power Company Limited (BPC) and Lamjung Electricity Development Company (LEDCO) had an understanding to develop Nyadi Hydropower Project (NHP) together. According to this understanding, a new company named as “Nyadi Hydropower Limited” (NHL) was established to develop Nyadi Hydropower Project in the consortium of the Butwal Power Company and the Lamjung Electricity Development Company Limited as a major share holder. The project is being developed through a Special Purpose Vehicle (SPV), Nyadi Hydropower Limited with BPC as the major stakeholder.',
                'is_active' => '1',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
