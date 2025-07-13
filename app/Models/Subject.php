<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function grades():HasMany {
        return $this->hasMany(Grade::class, 'student_id');
    }

    public function users():HasMany {
        return $this->hasMany(User::class);
    }

    public function lessons():HasMany {
        return $this->hasMany(Lesson::class);
    }
}
