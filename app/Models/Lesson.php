<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'day',
        'time',
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'subject_id',
        'schoolClass_id'
    ];
}
