<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
    ];

    public function course(): BelongsTo 
    {

        return $this->belongsTo(Course::class);

    }

    public function complete_lessons(): HasManyThrough 
    {

        return $this->hasManyThrough(CompleteLesson::class, Lesson::class);

    }

    public function lessons(): HasMany
    {

        return $this->hasMany(Lesson::class);

    }

}
