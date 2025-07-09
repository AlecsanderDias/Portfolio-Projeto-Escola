<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Information extends Model
{
    use SoftDeletes;
    /**
     *
     * @var string
     */
    protected $table = 'informations';

    /**
     * @var list<string>
    */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'birthDate',
        'gender',
        'cpf',
        'registration',
        'schoolYear',
        'schoolClass_id'
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'schoolYear' => null,
        'schoolClass_id' => null
    ];

    public function users():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function schoolClasses():BelongsTo {
        return $this->belongsTo(SchoolClass::class);
    }
}
