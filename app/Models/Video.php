<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'locale',
        'videoable_id',
        'videoable_type',
        'video_url'
    ];

    public function videoable(): MorphTo
    {
        return $this->morphTo();
    }
}
