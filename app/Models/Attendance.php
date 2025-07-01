<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'attendance'
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'student_id' => null,
        'schoolClass_id' => null
    ];
}
