<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'about',
        'what_will_you_learn',
        'video_url',
        'featured_img_url'
    ];

    public function category(): BelongsTo
    {

        return $this->belongsTo(Category::class);

    }

    public function media_tracker(): MorphOne
    {

        return $this->morphOne(MediaTracker::class, 'media_trackerable');

    }

    public function subtitles(): MorphMany
    {

        return $this->morphMany(Subtitle::class, 'subtitleable');

    }

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
