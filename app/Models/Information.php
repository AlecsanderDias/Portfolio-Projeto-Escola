<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Information extends Model
{
    use SoftDeletes, HasFactory;
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
        'birth_date',
        'gender',
        'cpf',
        'school_year',
        'schoolclass_id'
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'school_year' => null,
        'schoolclass_id' => null
    ];

    public function user():HasOne {
        return $this->hasOne(User::class, 'information_id');
    }

    public function schoolClasses():BelongsTo {
        return $this->belongsTo(SchoolClass::class);
    }
}
