<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('admins')->insert([
            [
                'first_name' => 'Richard',
                'last_name' => 'Owiredu',
                'email' => 'rowiredu.ing@gmail.com',
                'password' => Hash::make('password'),
                'profile_img_url'  => '/assets/img/default-profile.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

    }
}
