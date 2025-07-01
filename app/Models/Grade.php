<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'quarter',
        'firstTest',
        'secondTest'
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'student_id' => null,
        'subject_id' => null
    ];
}
