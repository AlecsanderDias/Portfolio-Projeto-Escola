<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Http\Requests\CreateSchoolClassRequest;
use App\Http\Requests\UpdateSchoolClassRequest;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index() {
        $schoolClasses = SchoolClass::getAllSchoolClassesFieldsArray();
        return view('schoolClass.index', ['schoolClasses' => $schoolClasses]);
    }

    public function create() {
        $years = getYearsArray();
        $schoolYears = Constants::SCHOOL_YEARS;
        $rooms = Constants::ROOM_NAMES;
        return view('schoolClass.createForm', ['years' => $years, 'schoolYears' => $schoolYears, 'rooms' => $rooms]);
    }

    public function store(CreateSchoolClassRequest $request) {
        SchoolClass::create($request->all());
        return redirect()->route('schoolClasses.index')->with('message', ['Nova turma adicionada com sucesso!']);
    }

    public function edit(string $id) {
        $schoolClass = SchoolClass::find($id);
        $years = getYearsArray();
        $schoolYears = Constants::SCHOOL_YEARS;
        $rooms = Constants::ROOM_NAMES;
        return view('schoolClass.updateForm', ['schoolClass' => $schoolClass, 'years' => $years, 'schoolYears' => $schoolYears, 'rooms' => $rooms]);
    }

    public function update(UpdateSchoolClassRequest $request, string $id) {
        $schoolClass = SchoolClass::updateSchoolClassById($id, $request->all());
        return redirect()->route('schoolClasses.index')->with('message', ["Turma $schoolClass->name com id => $id atualizada com sucesso!"]);
    }

    public function destroy(string $id) {
        $schoolClass = SchoolClass::deleteSchoolClassById($id);
        return redirect()->route('schoolClasses.index')->with('message', ["Turma $schoolClass->class_name com id => $id foi deletado com sucesso!"]);
    }
}
