<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'className',
        'year',
        'schoolYear',
        'room'
    ];
}
