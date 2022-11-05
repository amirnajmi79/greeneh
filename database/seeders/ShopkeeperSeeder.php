<?php

namespace Database\Seeders;

use App\Models\Shopkeeper;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ShopkeeperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  User::create([
            'name' => 'shopkeeper',
            'email' => 'shopkeeper@shopkeeper.com',
            'password' => Hash::make('12345678')
        ]);

        Shopkeeper::create([
            'user_id' => $user->id
        ]);
    }
}
