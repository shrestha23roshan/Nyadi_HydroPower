<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainAlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_albums')->insert([
            [
                'name' => 'PROJECTS',
                'attachment' => 'project.jpg',
                'is_active' => '1'
            ],
            [
                'name' => 'CSR',
                'attachment' => 'csr.jpg',
                'is_active' => '1'
            ]
        ]);
    }
}
