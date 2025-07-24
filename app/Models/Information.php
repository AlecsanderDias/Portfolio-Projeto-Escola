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
    ];

    public function user():HasOne {
        return $this->hasOne(User::class, 'information_id');
    }

    static function getInformationById(int $id) {
        $informationFields = ['name','surname','email','birth_date','gender','cpf'];
        return Information::select($informationFields)->find($id);
    }
}
