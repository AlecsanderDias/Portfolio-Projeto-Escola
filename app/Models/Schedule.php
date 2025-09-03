<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'day',
        'hour',
        'semester',
        'subject_id',
        'school_class_id'
    ];

    protected $attributes = [
        'subject_id' => null,
        'school_class_id' => null,
    ];

    public function subjects():BelongsToMany {
        return $this->belongsToMany(Subject::class);
    }

    public function schoolClass():BelongsTo {
        return $this->belongsTo(SchoolClass::class);
    }

    static function getAllSchedules() {
        return Schedule::all(['id','day','hour','subject_id','school_class_id'])->toArray();
    }

    static function getScheduleById(int $id) {
        return Schedule::get(['id','day','hour','subject_id','school_class_id'])->find($id);
    }

    static function updateScheduleById(int $id, array $data) {
        $schedule = new Schedule($data);
        Schedule::find($id)->update($schedule->getAttributes());
        return $schedule; 
    }

    static function createScheduleBySchoolClass(int $schoolClassId) {
        
    }
}
