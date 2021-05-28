<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(HomePageInfo::class);
        $this->call(UserTable::class);
        $this->call(PersonalInfo::class);
        $this->call(GetCount::class);
        $this->call(LogoSeeder::class);
        $this->call(MenuSeeder::class);
    }
}
