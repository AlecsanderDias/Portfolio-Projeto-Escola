<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    /**
     * @var list<string>
    */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'birthdate',
        'gender',
        'cpf',
        'registration',
        'schoolYear',
        'user_id',
        'class_id'
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'schoolYear' => null,
        'class_id' => null
    ];
}
