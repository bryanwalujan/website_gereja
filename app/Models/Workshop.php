<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Workshop extends Model
{
    protected $fillable = [
        'church_id', 'region', 'location', 'date', 'speaker', 'topic', 'speaker_photo',
    ];

    public function church(): BelongsTo
    {
        return $this->belongsTo(Church::class);
    }
}