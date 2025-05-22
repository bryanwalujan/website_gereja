<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    protected $fillable = [
        'name',
        'region',
        'about_us',
        'vision',
        'mission',
        'church_image',
        'pastor_image',
        'pastor_name',
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