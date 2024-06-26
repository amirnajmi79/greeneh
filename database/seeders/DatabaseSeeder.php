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
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            AreaSeeder::class,
            DriverSeeder::class,
            ShopkeeperSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class
        ]);
    }
}
