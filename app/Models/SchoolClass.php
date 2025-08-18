<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolClass extends Model
{
    use SoftDeletes, HasFactory;

    // /**
    //  * @var string
    //  */
    // protected $table = 'school_classes';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'class_name',
        'year',
        'school_year',
        'room'
    ];

    /**
     * @var list<string,string>
     */
    protected $casts = [
        'year' => 'integer',
    ];

    public function users():HasMany {
        return $this->hasMany(User::class);
    }

    public function lessons():HasMany {
        return $this->hasMany(Lesson::class);
    }

    static function getAllSchoolClassesNames() {
        return SchoolClass::all()->select('id','class_name');
    }

    static function getAllSchoolClassesFieldsArray() {
        return SchoolClass::all()->select('id','class_name','room','year','school_year')->toArray();
    }

    static function getSchoolClassesByCurrentYear() {
        $year = (int)date("Y");
        return SchoolClass::select(['id', 'class_name', 'school_year', 'room'])->where('year', $year)->get();
    }

    static function updateSchoolClassById(int $id, array $data) {
        $schoolClass = new SchoolClass($data);
        SchoolClass::find($id)->update($schoolClass->getAttributes());
        return $schoolClass;
    }

    static function deleteSchoolClassById(int $id) {
        $schoolClass = SchoolClass::find($id);
        $schoolClass->delete();
        return $schoolClass;
    }

    static function getAllSchoolClassesIdArray() {
        return SchoolClass::all('id')->toArray();
    }
}
