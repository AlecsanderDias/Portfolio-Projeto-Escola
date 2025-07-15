<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes, HasFactory;
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'subject_hours',
        'teacher_id'
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'teacher_id' => null
    ];

    public function teacher():BelongsTo {
        return $this->belongsTo(Teacher::class);
    }

    public function students():BelongsToMany {
        return $this->belongsToMany(Student::class);
    }

    public function grades():HasMany {
        return $this->hasMany(Grade::class, 'student_id');
    }

    public function lessons():HasMany {
        return $this->hasMany(Lesson::class);
    }

    public function getAllSubjects() {
        return $this->all();
    }

    public function getAllSubjectsWithTeacherArray(array $columns) {
        if(empty($columns)) $columns = [
                'subjects.id','subjects.name AS subject_name' ,'subjects.subject_hours','subjects.teacher_id',
                'informations.name AS teacher_name', 'informations.surname', 'users.registration'
        ];
        return Subject::join('users','subjects.teacher_id','=','users.id')
            ->join('informations','informations.id','=','users.information_id')            
            ->select($columns)->get()->toArray();
    }

    public function getAllSubjectNamesArray() {
        return $this->all(['name'])->toArray();
    }
}
