<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Yuta',
            'email' => 'nakamotoyuta@gmail.com',
            'password' => bcrypt('yutaa'),
            'role' => 'Admin',
        ]);
        User::create([
            'name' => 'Kai',
            'email' => 'jongin@gmail.com',
            'password' => bcrypt('jongin'),
            'role' => 'Admin',
        ]);
    }
}
