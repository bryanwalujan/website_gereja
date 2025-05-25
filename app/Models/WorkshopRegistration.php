<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkshopRegistration extends Model
{
    protected $fillable = [
        'workshop_id', 'name', 'email', 'phone',
    ];

    public function workshop(): BelongsTo
    {
        return $this->belongsTo(Workshop::class);
    }
}