<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Course extends Model
{
    use HasFactory;

    public function course_progress(): HasOne 
    {

        return $this->hasOne(CourseProgress::class);

    }

    public function complete_lessons(): HasMany 
    {

        return $this->hasMany(CompleteLesson::class);

    }

    public function lessons(): HasManyThrough
    {

        return $this->hasManyThrough(Lesson::class, Topic::class);

    }


}
