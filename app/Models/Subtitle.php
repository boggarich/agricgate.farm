<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Subtitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle_url',
        'subtitleable_id',
        'subtitleable_type',
    ];

    public function subtitleable(): MorphTo
    {
        return $this->morphTo();
    }

}
