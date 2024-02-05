<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id',
        'title',
        'about',
        'video_url',
        'featured_img_url',
    ];

    public function topic(): BelongsTo
    {

        return $this->belongsTo(Topic::class);

    }

    public function media_tracker(): MorphOne
    {

        return $this->morphOne(MediaTracker::class, 'media_trackerable');

    }

    public function subtitles(): MorphMany
    {

        return $this->morphMany(Subtitle::class, 'subtitleable');

    }

    public function active_status(): HasOne 
    {

        return $this->hasOne(CourseProgress::class);

    }

    public function complete_status(): HasOne
    {
        
        return $this->hasOne(CompleteLesson::class);

    }

    public function comments(): HasMany 
    {

        return $this->hasMany(Comment::class);

    }


    public function exercise_files(): HasMany
    {

        return $this->hasMany(ExerciseFile::class);

    }
}
