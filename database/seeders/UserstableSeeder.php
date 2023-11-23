<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imagePath = 'https://i.ibb.co/1sspJdY/Akik-Hossain.jpg';

        User::create([
            'name' => 'Akik Hossain',
            'role' => 'Admin',
            'email' => 'akikhs00@gmail.com',
            'password' => bcrypt('akik87'),
            'image' => $imagePath,
        ]);
    }
}
