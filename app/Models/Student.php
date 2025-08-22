<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'school_year',
        'school_class_id',
        'user_id',
    ];

    protected $attributes = [
        'school_year' => null,
        'school_class_id' => null,
    ];

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
    
    public function schoolClass():BelongsTo {
        return $this->belongsTo(SchoolClass::class);
    }

    public function grades():HasMany {
        return $this->hasMany(Grade::class, 'student_id');
    }

    public function attendances():HasMany {
        return $this->hasMany(Attendance::class, 'student_id');
    }

    public function subjects():BelongsToMany {
        return $this->belongsToMany(Subject::class);
    }

    static function getStudentByUserId(int $userId) {
        return Student::select(['school_year', 'school_class_id'])->where('user_id',$userId)->get();
    }

    static function updateStudentByUserId(int $userId, array $data) {
        $studentId = Student::select(['id'])->where('user_id', $userId);
        $updateStudent = new Student($data);
        Student::find($studentId)->update($updateStudent->getAttributes());
    }

    static function deleteStudentByUserId(int $userId) {
        $studentId = Student::select('id')->where('user_id', $userId)->get()->toArray();
        Student::find($studentId[0]['id'])->delete;
    }

    static function getAllStudentsArray() {
        return Student::all()->toArray();
    }

    static function getAllStudentsInformationsArray() {
        return Student::join('users','users.id','=','students.user_id')
            ->join('informations','users.information_id','=','informations.id')
            ->select(['students.id','informations.name','informations.surname','users.registration','students.school_class_id','students.school_year'])
            ->get()->toArray();
    }

    static function getAllStudentsIdArray() {
        return Student::all('id')->toArray();
    }
}
