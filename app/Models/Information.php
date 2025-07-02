<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function users():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function schoolClasses():BelongsTo {
        return $this->belongsTo(SchoolClass::class);
    }
}
