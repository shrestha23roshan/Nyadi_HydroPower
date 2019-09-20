<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            [
                'parent_id' => '0',
                'module_name' => 'User Management',
                'slug' => 'admin.privilege',
                'menu-class' => 'privilege',
                'icon' => 'fa fa-cog',
                'order_position' => 0,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '1',
                'module_name' => 'Role',
                'slug' => 'admin.privilege.role',
                'menu-class' => 'role',
                'icon' => 'fa fa-users',
                'order_position' => 1,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '1',
                'module_name' => 'User',
                'slug' => 'admin.privilege.user',
                'menu-class' => 'user',
                'icon' => 'fa fa-user',
                'order_position' => 2,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'About Us',
                'slug' => 'admin.about-us',
                'menu-class' => 'about-us',
                'icon' => 'fa fa-address-card',
                'order_position' => 1,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '4',
                'module_name' => 'Company Profile',
                'slug' => 'admin.about-us.company-profile',
                'menu-class' => 'company-profile',
                'icon' => 'fa fa-building',
                'order_position' => 1,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '4',
                'module_name' => 'Board Of Directors',
                'slug' => 'admin.about-us.bod',
                'menu-class' => 'bod',
                'icon' => 'fa fa-users',
                'order_position' => 2,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '4',
                'module_name' => 'NHL Teams',
                'slug' => 'admin.about-us.team',
                'menu-class' => 'team',
                'icon' => 'fa fa-users',
                'order_position' => 3,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Media Management',
                'slug' => 'admin.media-management',
                'menu-class' => 'media-management',
                'icon' => 'fa fa-image',
                'order_position' => 2,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '8',
                'module_name' => 'Banner',
                'slug' => 'admin.media-management.banner',
                'menu-class' => 'banner',
                'icon' => 'fa fa-image',
                'order_position' => 0,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '8',
                'module_name' => 'Gallery',
                'slug' => 'admin.media-management.album',
                'menu-class' => 'album',
                'icon' => 'fa fa-image',
                'order_position' => 1,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '8',
                'module_name' => 'Video',
                'slug' => 'admin.media-management.video',
                'menu-class' => 'video',
                'icon' => 'fa fa-file-video-o',
                'order_position' => 2,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Projects',
                'slug' => 'admin.projects',
                'menu-class' => 'projects',
                'icon' => 'fa fa-product-hunt',
                'order_position' => 3,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '12',
                'module_name' => 'Nyadi Hydropower project',
                'slug' => 'admin.projects.nhp',
                'menu-class' => 'nhp',
                'icon' => 'fa fa-tasks',
                'order_position' => 1,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '12',
                'module_name' => 'Salient Features',
                'slug' => 'admin.projects.salient_features',
                'menu-class' => 'salient_features',
                'icon' => 'fa fa-tasks',
                'order_position' => 1,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '12',
                'module_name' => 'Progress Report',
                'slug' => 'admin.projects.progressreport',
                'menu-class' => 'progressreport',
                'icon' => 'fa fa-file',
                'order_position' => 2,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Investor Relations',
                'slug' => 'admin.investor-relations',
                'menu-class' => 'investor-relations',
                'icon' => 'fa fa-align-justify',
                'order_position' => 4,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '16',
                'module_name' => 'Annual General Meeting',
                'slug' => 'admin.investor-relations.meeting',
                'menu-class' => 'meeting',
                'icon' => 'fa fa-hand-shake',
                'order_position' => 0,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '16',
                'module_name' => 'Annual Report',
                'slug' => 'admin.investor-relations.annualreport',
                'menu-class' => 'annualreport',
                'icon' => 'fa fa-file',
                'order_position' => 1,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '16',
                'module_name' => 'Financial Report',
                'slug' => 'admin.investor-relations.financialreport',
                'menu-class' => 'financialreport',
                'icon' => 'fa fa-file',
                'order_position' => 2,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'News And Update',
                'slug' => 'admin.news',
                'menu-class' => 'news',
                'icon' => 'fa fa-newspaper-o',
                'order_position' => 5,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Pages',
                'slug' => 'admin.pages',
                'menu-class' => 'pages',
                'icon' => 'fa fa-columns',
                'order_position' => 6,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Popup',
                'slug' => 'admin.popup',
                'menu-class' => 'popup',
                'icon' => 'fa fa-fire',
                'order_position' => 7,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Seo',
                'slug' => 'admin.seo',
                'menu-class' => 'seo',
                'icon' => 'fa fa-search',
                'order_position' => 8,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'parent_id' => '0',
                'module_name' => 'Settings',
                'slug' => 'admin.settings',
                'menu-class' => 'settings',
                'icon' => 'fa fa-gears',
                'order_position' => 9,
                'is_active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
