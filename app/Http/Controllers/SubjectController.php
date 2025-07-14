<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Http\Requests\CreateSubjectRequest;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $subjects = Subject::join('users','subjects.teacher_id','=','users.id')
        //     ->join('informations','informations.id','=','users.information_id')            
        //     ->select([
        //         'subjects.id','subjects.name AS subject_name' ,'subjects.subject_hours','subjects.teacher_id',
        //         'informations.name AS teacher_name', 'informations.surname', 'users.registration'
        //         ])->get()->toArray();
        $subjects = Subject::with('users')->get();
        dd($subjects);
        return view('subject.index', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = User::join('informations','users.information_id','=','informations.id')->select('users.id','users.registration','informations.name','informations.surname')->where('users.user_type','=','teacher')->get();
        return view('subject.createForm', ['teachers' => $teachers, 'subjectHours' => Constants::SUBJECT_HOURS]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSubjectRequest $request)
    {
        // dd($request->all());
        $subject = Subject::create($request->all());
        return redirect()->route('subjects.index')->with('message',["Nova disciplina $subject->name criada com sucesso!"]);
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
        $subject = Subject::find($id);
        $teachers = User::join('informations','users.information_id','=','informations.id')->select('users.id','users.registration','informations.name','informations.surname')->where('users.user_type','=','teacher')->get();
        return view('subject.updateForm', ['subject' => $subject, 'teachers' => $teachers, 'subjectHours' => Constants::SUBJECT_HOURS]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subject = new Subject($request->all());
        Subject::find($id)->update($subject->getAttributes());
        return redirect()->route('subjects.index')->with('message', ["A Disciplina $subject->name com id => $id foi alterada com sucesso!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('subjects.index')->with('message', ["A Disciplina $subject->name com id => $id foi deletada com sucesso!"]);
    }
}
