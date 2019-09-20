<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(RoleModulesTableSeeder::class);
        $this->call(CompanyProfileTableSeeder::class);
        $this->call(SeoTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(MainAlbumsTableSeeder::class);
    }
}
