<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'registration',
        'password',
        'information_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // 'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function worker():HasOne {
        return $this->hasOne(Worker::class, 'user_id');
    }

    public function student():HasOne {
        return $this->hasOne(Student::class, 'user_id');
    }

    public function teacher():HasOne {
        return $this->hasOne(Teacher::class, 'user_id');
    }

    public function information():BelongsTo {
        return $this->belongsTo(Information::class);
    }

    static function getAllUsersArray() {
        return User::join('informations','users.information_id','=','informations.id')
            ->select([
                'users.registration','informations.id',
                'informations.name','informations.surname',
                'informations.email','informations.birth_date',
                'informations.gender','informations.cpf',
                ])->get()->toArray();
    }

    static function getUserById(int $id) {
        $userFields = ['id','registration','information_id'];
        return User::select($userFields)->find($id);
    }

    static function updateUserById(int $userId, array $data) {
        $updateUser = new User($data);
        User::find($userId)->update($updateUser->getAttributes());
    }
}
