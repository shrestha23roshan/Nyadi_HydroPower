<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seos')->insert([
            [
                'page' => 'home',
                'meta_title' => 'Home',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'company-profile',
                'meta_title' => 'Company Profile',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'board of director',
                'meta_title' => 'Board Of Director',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'nhl team',
                'meta_title' => 'NHL Team',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'nyadi hydropower project',
                'meta_title' => 'Nyadi HydroPower Project',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'salient features',
                'meta_title' => 'Salient Features',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'progress report',
                'meta_title' => 'Progress Report',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'annual general meeting',
                'meta_title' => 'Annual General Meeting',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'annual reports',
                'meta_title' => 'Annual Reports',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'financial reports',
                'meta_title' => 'Financial Reports',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'news & update',
                'meta_title' => 'News & Updates',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'photo',
                'meta_title' => 'Photo',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'video',
                'meta_title' => 'Video',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page' => 'contact-us',
                'meta_title' => 'Contact Us',
                'meta_tags' => 'meta tags',
                'meta_description' => 'meta description',
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
