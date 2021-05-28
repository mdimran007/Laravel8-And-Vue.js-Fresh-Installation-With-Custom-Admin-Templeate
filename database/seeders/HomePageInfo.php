<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageInfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homes')->insert([

            'images' => 'http://127.0.0.1:8000/images/demo.png',
            'full_name' => 'Md Imran Hossain',
            'work_title' => 'Web & Android Apps Developer',
        ]);
    }
}
