<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::getAllGradesDetailsArray();
        $teachers = Teacher::getAllTeachersIdNameArray();
        // dd($grades);
        return view('grade.index', ['grades' => $grades, 'teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }
    
    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $grade = Grade::getGradeById($id);
        $quarters = Constants::QUARTERS;
        $subjects = Constants::CORE_SUBJECTS;
        return view('grade.updateForm', ['grade' => $grade, 'quarters' => $quarters, 'subjects' => $subjects]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradeRequest $request, string $id)
    {
        Grade::updateGradeById($id, $request->all());
        return redirect()->route('grades.index')->with('message', ["Nota com id => $id atualizada com sucesso!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grade = Grade::deleteGradeById($id);
        return redirect()->route('grades.index')->with('message', ["Nota com id => $id deletado com sucesso!"]);
    }
}
