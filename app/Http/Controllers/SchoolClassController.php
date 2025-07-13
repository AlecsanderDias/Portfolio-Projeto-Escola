<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSchoolClassRequest;
use App\Http\Requests\UpdateSchoolClassRequest;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index() {
        $schoolClasses = SchoolClass::all()->select('id','class_name','room','year','school_year')->toArray();
        return view('schoolClass.index', ['schoolClasses' => $schoolClasses]);
    }

    public function create() {
        return view('schoolClass.createForm');
    }

    public function store(CreateSchoolClassRequest $request) {
        SchoolClass::create($request->all());
        return redirect()->route('schoolClass.index')->with('message', ['Nova turma adicionada com sucesso!']);
    }

    public function edit(string $id) {
        $schoolClass = SchoolClass::find($id);
        return view('schoolClass.updateForm', ['schoolClass' => $schoolClass]);
    }

    public function update(UpdateSchoolClassRequest $request, string $id) {
        $schoolClass = new SchoolClass($request->all());
        SchoolClass::find($id)->update($schoolClass->getAttributes());
        return redirect()->route('schoolClass.index')->with('message', ["Turma $schoolClass->name com id => $id atualizada com sucesso!"]);
    }

    public function destroy(string $id) {
        $schoolClass = SchoolClass::find($id);
        $schoolClass->delete();
        return redirect()->route('schoolClass.index')->with('message', ["Turma $schoolClass->name com id => $id foi deletado com sucesso!"]);
    }
}
