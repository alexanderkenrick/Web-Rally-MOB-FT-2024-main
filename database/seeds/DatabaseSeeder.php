<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call([
            \Database\Seeders\UserSeeder::class,
            \Database\Seeders\MapSeeder::class,
            \Database\Seeders\GroupSeeder::class,
            \Database\Seeders\ValueSeeder::class
        ]);
    }
}
