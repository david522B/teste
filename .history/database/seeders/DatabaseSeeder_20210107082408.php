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
        $this->call(AdminUserTableSeeder::class);
        $this->call(AdminUserTableSeeder::class);
        \App\Models\User::factory(10)->create();
        \App\Models\Categories::factory(10)->create();
    }
}
