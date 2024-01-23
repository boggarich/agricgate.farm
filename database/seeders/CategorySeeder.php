<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            [
                'title' => 'Snails',
                'featured_img_url' => 'http://localhost:3000/assets/img/WhatsApp%20Image%202023-12-07%20at%2011.23.57%20AM.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Poultry',
                'featured_img_url' => 'http://localhost:3000/assets/img/WhatsApp%20Image%202023-12-07%20at%2011.23.58%20AM%20(5).jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Greenhouse',
                'featured_img_url' => 'http://localhost:3000/assets/img/greenhouse.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Feeding',
                'featured_img_url' => 'http://localhost:3000/assets/img/snail%20feed.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Snails',
                'featured_img_url' => 'http://localhost:3000/assets/img/WhatsApp%20Image%202023-12-07%20at%2011.23.57%20AM.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
