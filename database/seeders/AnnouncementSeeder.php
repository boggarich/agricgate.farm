<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('announcements')->insert([
            [
                'course_id' => 1,
                'announcement' => 'Snail farming, also known as heliciculture, is the 
                process of raising snails for human consumption or commercial purposes.
                Snails are a delicacy in many parts of the world and have been consumed 
                for centuries due to their nutritional value and unique taste.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 1,
                'announcement' => 'Snail farming, also known as heliciculture, is the 
                process of raising snails for human consumption or commercial purposes.
                Snails are a delicacy in many parts of the world and have been consumed 
                for centuries due to their nutritional value and unique taste.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
