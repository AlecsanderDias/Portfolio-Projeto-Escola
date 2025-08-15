<?php

namespace App\Models;

use App\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use SoftDeletes, HasFactory;
    /**
     * @var list<string>
     */
    protected $fillable = [
        'quarter',
        'first_test',
        'second_test',
        'student_id',
        'subject_id'
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'student_id' => null,
        'subject_id' => null,
        'first_test' => null,
        'second_test' => null,
    ];

    public function students():BelongsTo {
        return $this->belongsTo(Student::class);
    }

    public function subjects():BelongsTo {
        return $this->belongsTo(Subject::class);
    }

    static function createStudentGrades(int $studentId) {
        foreach(Constants::CORE_SUBJECTS as $subject) {
            foreach(Constants::QUARTERS as $key => $quarter) {
                Grade::create([
                    'student_id' => $studentId,
                    'quarter' => $key,
                ]);
            }
        };
    }

    static function getAllGradesArray() {
        return Grade::all(['id','quarter','first_test','second_test','student_id','subject_id'])->toArray();
    }

    static function getAllGradesDetailsArray() {
        return Grade::join('subjects','subject_id','=','subjects.id')
            ->join('students','student_id','=','students.id')
            ->join('users','users.id','=','students.user_id')
            ->join('informations','informations.id','=','users.information_id')
            ->select(['grades.id','users.registration','informations.name','informations.surname','students.school_year','students.school_class_id','subjects.subject_name','grades.quarter','grades.first_test','grades.second_test'])->get()->toArray();
    }

    static function getGradeById(int $gradeId) {
        return Grade::select(['grades.id','grades.student_id','grades.subject_id','grades.quarter','grades.first_test','grades.second_test'])->find($gradeId);
    }

    static function updateGradeById(int $gradeId, array $gradeData) {
        $grade = new Grade($gradeData);
        Grade::find($gradeId)->update($grade->getAttributes());
        return $grade;
    }

    static function deleteGradeById(int $gradeId) {
        $grade = Grade::find($gradeId);
        $grade->delete();
        return $grade;
    }
}
