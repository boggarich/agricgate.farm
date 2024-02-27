<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            BlogSeeder::class,
            AdminSeeder::class,
            AnnouncementSeeder::class,
            CategorySeeder::class,
            CommentSeeder::class,
            CourseSeeder::class,
            ExerciseFileSeeder::class,
            FeaturedCourseSeeder::class,
            LessonSeeder::class,
            QuestionAndAnswerSeeder::class,
            ReplySeeder::class,
            TopicSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
    }
}
