<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'subjectHours',
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'teacher_id' => null
    ];
}
