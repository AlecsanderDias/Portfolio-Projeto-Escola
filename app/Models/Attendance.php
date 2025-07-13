<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use SoftDeletes, HasFactory;
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
        'schoolclass_id' => null
    ];

    public function users():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function lessons():BelongsTo {
        return $this->belongsTo(Lesson::class);
    }
}
