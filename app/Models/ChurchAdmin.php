<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class ChurchAdmin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'church_id',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}