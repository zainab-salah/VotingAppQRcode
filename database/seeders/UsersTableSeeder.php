<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            // Pad user ID with zeros to make it longer
            $paddedUserId = str_pad($i, 8, '0', STR_PAD_LEFT);

            User::create(['id' => $paddedUserId]);
        }
    }
}

 
