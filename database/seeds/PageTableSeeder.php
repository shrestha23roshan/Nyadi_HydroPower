<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'parent_id' =>'0',
            'heading' => 'CSR',
            'slug' => 'csr',
            'is_active' => '1'
        ]);
    }
}
