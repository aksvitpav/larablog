<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Laravel',
            'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'October CMS',
            'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'VueJS',
            'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
