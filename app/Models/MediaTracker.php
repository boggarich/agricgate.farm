<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class MediaTracker extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_tracker_url',
        'media_trackerable_id',
        'media_trackerable_type',
    ];

    public function media_trackerable(): MorphTo
    {
        return $this->morphTo();
    }
    
}
