<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('courses')->insert([
            [
                'category_id' => 1,
                'title' => 'Snails Rearing',
                'description' => 'Learn how to raise snails in your 
                backyard',
                'about' => "<p class=''>
                Snail farming, also known as heliciculture, is the process of raising
                 snails for human consumption or commercial purposes. 
                Snails are a delicacy in many parts of the world and have been consumed
                 for centuries due to their nutritional
                value and unique taste.

                <br></br>


                Snail farming can be a profitable venture as snails are easy to maintain
                 and require minimal space and 
                resources. They can be raised both in a controlled environment, such as a 
                snailery or in a natural 
                environment, such as a garden or farm.
                In recent years, snail farming has gained popularity as a sustainable and e
                co-friendly farming practice due to the low
                carbon footprint associated with the process.

                <br></br>


                It is also a form of agriculture that has the potential to provide income 
                for small-scale farmers in rural areas, thereby contributing to poverty 
                reduction and food security.

                <br></br>

                In this course, we will cover the basics of snail farming, including 
                the types of snails, their life cycle, habitat requirements, feeding and 
                breeding techniques, and how to manage common diseases and pests. 
                By the end of the course, you will have a good understanding of snail 
                farming and be able to start your own snail-farming venture.
                

            </p>",
                'what_will_you_learn' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an",
                'video_url' => 'http://localhost:3000/assets/video/Trisolace%20Company%20Ghana%20snails%20projects%20and%20free%20training.mp4',
                'featured_img_url' => 'http://localhost:3000/assets/img/snail.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 1,
                'title' => 'Farm and Farm Managem...',
                'description' => 'Learn how to feed snails in your 
                backyard',
                'about' => "<p class=''>
                Snail farming, also known as heliciculture, is the process of raising
                 snails for human consumption or commercial purposes. 
                Snails are a delicacy in many parts of the world and have been consumed
                 for centuries due to their nutritional
                value and unique taste.

                <br></br>


                Snail farming can be a profitable venture as snails are easy to maintain
                 and require minimal space and 
                resources. They can be raised both in a controlled environment, such as a 
                snailery or in a natural 
                environment, such as a garden or farm.
                In recent years, snail farming has gained popularity as a sustainable and e
                co-friendly farming practice due to the low
                carbon footprint associated with the process.

                <br></br>


                It is also a form of agriculture that has the potential to provide income 
                for small-scale farmers in rural areas, thereby contributing to poverty 
                reduction and food security.

                <br></br>

                In this course, we will cover the basics of snail farming, including 
                the types of snails, their life cycle, habitat requirements, feeding and 
                breeding techniques, and how to manage common diseases and pests. 
                By the end of the course, you will have a good understanding of snail 
                farming and be able to start your own snail-farming venture.
                

            </p>",
                'what_will_you_learn' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an",
                'video_url' => 'http://localhost:3000/assets/video/Trisolace%20Company%20Ghana%20snails%20projects%20and%20free%20training.mp4',
                'featured_img_url' => 'http://localhost:3000/assets/img/snail%20feed.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 1,
                'title' => 'Poultry raising ',
                'description' => 'Learn how to raise your poultry in 
                your backyard.',
                'about' => "<p class=''>
                Snail farming, also known as heliciculture, is the process of raising
                 snails for human consumption or commercial purposes. 
                Snails are a delicacy in many parts of the world and have been consumed
                 for centuries due to their nutritional
                value and unique taste.

                <br></br>


                Snail farming can be a profitable venture as snails are easy to maintain
                 and require minimal space and 
                resources. They can be raised both in a controlled environment, such as a 
                snailery or in a natural 
                environment, such as a garden or farm.
                In recent years, snail farming has gained popularity as a sustainable and e
                co-friendly farming practice due to the low
                carbon footprint associated with the process.

                <br></br>


                It is also a form of agriculture that has the potential to provide income 
                for small-scale farmers in rural areas, thereby contributing to poverty 
                reduction and food security.

                <br></br>

                In this course, we will cover the basics of snail farming, including 
                the types of snails, their life cycle, habitat requirements, feeding and 
                breeding techniques, and how to manage common diseases and pests. 
                By the end of the course, you will have a good understanding of snail 
                farming and be able to start your own snail-farming venture.
                

            </p>",
                'what_will_you_learn' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an",
                'video_url' => 'http://localhost:3000/assets/video/Trisolace%20Company%20Ghana%20snails%20projects%20and%20free%20training.mp4',
                'featured_img_url' => 'http://localhost:3000/assets/img/WhatsApp%20Image%202023-12-07%20at%2011.23.58%20AM%20(5).jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 1,
                'title' => 'Setting up a greenhouse',
                'description' => 'Learn how to setup a greenhouse
                for your rearing the snails',
                'about' => "<p class=''>
                Snail farming, also known as heliciculture, is the process of raising
                 snails for human consumption or commercial purposes. 
                Snails are a delicacy in many parts of the world and have been consumed
                 for centuries due to their nutritional
                value and unique taste.

                <br></br>


                Snail farming can be a profitable venture as snails are easy to maintain
                 and require minimal space and 
                resources. They can be raised both in a controlled environment, such as a 
                snailery or in a natural 
                environment, such as a garden or farm.
                In recent years, snail farming has gained popularity as a sustainable and e
                co-friendly farming practice due to the low
                carbon footprint associated with the process.

                <br></br>


                It is also a form of agriculture that has the potential to provide income 
                for small-scale farmers in rural areas, thereby contributing to poverty 
                reduction and food security.

                <br></br>

                In this course, we will cover the basics of snail farming, including 
                the types of snails, their life cycle, habitat requirements, feeding and 
                breeding techniques, and how to manage common diseases and pests. 
                By the end of the course, you will have a good understanding of snail 
                farming and be able to start your own snail-farming venture.
                

            </p>",
                'what_will_you_learn' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an",
                'video_url' => 'http://localhost:3000/assets/video/Trisolace%20Company%20Ghana%20snails%20projects%20and%20free%20training.mp4',
                'featured_img_url' => 'http://localhost:3000/assets/img/greenhouse.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 1,
                'title' => 'Snails Rearing',
                'description' => 'Learn how to raise snails in your 
                backyard',
                'about' => "<p class=''>
                Snail farming, also known as heliciculture, is the process of raising
                 snails for human consumption or commercial purposes. 
                Snails are a delicacy in many parts of the world and have been consumed
                 for centuries due to their nutritional
                value and unique taste.

                <br></br>


                Snail farming can be a profitable venture as snails are easy to maintain
                 and require minimal space and 
                resources. They can be raised both in a controlled environment, such as a 
                snailery or in a natural 
                environment, such as a garden or farm.
                In recent years, snail farming has gained popularity as a sustainable and e
                co-friendly farming practice due to the low
                carbon footprint associated with the process.

                <br></br>


                It is also a form of agriculture that has the potential to provide income 
                for small-scale farmers in rural areas, thereby contributing to poverty 
                reduction and food security.

                <br></br>

                In this course, we will cover the basics of snail farming, including 
                the types of snails, their life cycle, habitat requirements, feeding and 
                breeding techniques, and how to manage common diseases and pests. 
                By the end of the course, you will have a good understanding of snail 
                farming and be able to start your own snail-farming venture.
                

            </p>",
                'what_will_you_learn' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an",
                'video_url' => 'http://localhost:3000/assets/video/Trisolace%20Company%20Ghana%20snails%20projects%20and%20free%20training.mp4',
                'featured_img_url' => 'http://localhost:3000/assets/img/snail.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
           
        ]);

    }
}
