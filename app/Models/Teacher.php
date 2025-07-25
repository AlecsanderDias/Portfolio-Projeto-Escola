<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'professional_number',
        'user_id'
    ];

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function subjects():HasMany {
        return $this->hasMany(Subject::class, 'teacher_id');
    }

    static function getTeacherByUserId(int $userId) {
        return Teacher::select(['professional_number'])->where('user_id',$userId)->get();
    }

    static function getAllTeachersOptions() {
        return Teacher::join('users','users.id','=','teachers.user_id')
            ->join('informations','informations.id','=','users.information_id')
            ->select('teachers.id','users.registration','informations.name','informations.surname')->get();
    }

     static function updateTeacherByUserId(int $userId, array $data) {
        $teacherId = Teacher::select(['id'])->where('user_id', $userId);
        $updateTeacher = new Teacher($data);
        // dd($userId, $data, $teacherId);
        Teacher::find($teacherId)->update($updateTeacher->getAttributes());
    }
}
