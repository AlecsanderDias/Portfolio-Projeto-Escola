<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'subjectHours',
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
