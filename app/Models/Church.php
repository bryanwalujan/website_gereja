<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region',
        'about_us',
        'vision',
        'mission',
        'church_image',
        'pastor_image',
        'address',
        'maps',
        'phone',
        'email',
        'worship_schedule',
        'student_target',
        'congregation_count',
        'prayer_points',
        'established_year',
    ];
}