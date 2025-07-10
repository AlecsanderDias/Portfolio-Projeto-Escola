<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSchoolClassRequest;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index() {
        $schoolClasses = SchoolClass::all();
        return view('schoolClass.index',['schoolClasses' => $schoolClasses]);
    }

    public function create() {
        return view('schoolClass.createForm');
    }

    public function store(CreateSchoolClassRequest $request) {
        SchoolClass::create($request->all());
        return redirect()->route('schoolClass.index')->with('message', 'Nova turma adicionada com sucesso!');
    }

    public function edit() {

    }

    public function destroy() {
        
    }
}
