<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Workshop extends Model
{
    protected $fillable = [
        'church_id', 'region', 'location', 'speaker', 'topic', 'speaker_photo',
        'youtube_link', 'participant_count', 'max_participants', 'material_file',
        'start_date', 'end_date', 'start_time', 'end_time',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    public function church(): BelongsTo
    {
        return $this->belongsTo(Church::class);
    }
}