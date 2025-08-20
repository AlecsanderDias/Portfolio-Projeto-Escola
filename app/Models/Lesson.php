<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes, HasFactory;
    /**
     * @var list<string>
     */
    protected $fillable = [
        'day',
        'time',
        'subject_id',
        'school_class_id',
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'subject_id' => null,
        'school_class_id' => null,
    ];

    public function subjects():BelongsTo {
        return $this->belongsTo(Subject::class);
    }

    public function attendances():HasMany {
        return $this->hasMany(Attendance::class, 'student_id');
    }

    public function schoolClasses():BelongsTo {
        return $this->belongsTo(SchoolClass::class);
    }

    static function getAllLessonsArray() {
        return Lesson::all(['id','day','time','subject_id','school_class_id'])->toArray();
    }

    static function createAllSemesterLessons(int $semester, DateTime $startDate, DateTime $endDate) {
        
    }
}
