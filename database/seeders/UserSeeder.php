<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            // [
            //     'name' => 'user1',
            //     'email' => 'user1@gmail.com',
            //     'password' => bcrypt('12345678'),
            //     'phone_number' => '08111',
            //     'address' => 'ragasakti',
            //     'role' => 'user'
            // ],
            // [
            //     'name' => 'user2',
            //     'email' => 'user2@gmail.com',
            //     'password' => bcrypt('12345678'),
            //     'phone_number' => '0822',
            //     'address' => 'linggajati',
            //     'role' => 'user'
            // ],
            [
                'name' => 'user3',
                'email' => 'user3@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number' => '03223822',
                'address' => 'japara',
                'role' => 'user'
            ],
            [
                'name' => 'user4',
                'email' => 'user4@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number' => '0383838342',
                'address' => 'japara',
                'role' => 'user'
            ],
            // [
            //     'name' => 'admin',
            //     'email' => 'admin@gmail.com',
            //     'password' => bcrypt('12345678'),
            //     'phone_number' => '082233',
            //     'address' => 'kuningan',
            //     'role' => 'admin'
            // ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
