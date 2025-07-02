<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'attendance'
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'student_id' => null,
        'schoolClass_id' => null
    ];

    public function users():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function lessons():BelongsTo {
        return $this->belongsTo(Lesson::class);
    }
}
