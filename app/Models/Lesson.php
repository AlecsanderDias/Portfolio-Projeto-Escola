<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'day',
        'time',
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'subject_id',
        'schoolClass_id'
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
}
