<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Db::table('categories')->insert([
            [
            'name'=>'Holidays',
            'slug'=>'holidays',
            'created_at'=> now(),
            'updated_at'=> now(),
        ],

             [
            'name'=>'Developers',
            'slug'=>'developers',
            'created_at'=> now(),
            'updated_at'=> now(),
        ],
        ]);
    }
}
