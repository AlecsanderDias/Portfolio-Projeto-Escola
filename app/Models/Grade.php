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
        'firstTest',
        'secondTest'
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'student_id' => null,
        'subject_id' => null
    ];

    public function users():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function subjects():BelongsTo {
        return $this->belongsTo(Subject::class);
    }

    static function createStudentGrades($studentId) {
        foreach(Constants::CORE_SUBJECTS as $subject) {
            Grade::create([
                'student_id' => $studentId
            ]);
        };
    }

    public function getAllGradesArray() {
        return Grade::all()->toArray();
    }
}
