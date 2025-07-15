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
    
    public function schoolClasses():BelongsTo {
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
}
