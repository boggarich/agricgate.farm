<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class EnrollCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id'
    ];

    public function course(): BelongsTo 
    {

        return $this->belongsTo(Course::class);

    }

    public function course_progress(): HasOne
    {

        return $this->hasOne(CourseProgress::class, 'course_id', 'course_id');

    }
    
}
