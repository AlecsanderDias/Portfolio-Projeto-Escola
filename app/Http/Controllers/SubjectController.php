<?php

namespace App\Http\Controllers;

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
        $subjects = Subject::all()->toArray();
        $teachers = User::join('information','users.information_id','=','informations.id')->select(['users.registration','informations.name','informations.surname'])->where('users.userType','=','teacher');
        return view('subject.index', ['subjects' => $subjects, 'teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.createForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subject = Subject::create($request->all());
        return redirect()->route('subject.index')->with('message',["Nova disciplina $subject->name criada com sucesso!"]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('subject.index')->with('message', ["A Disciplina $subject->name com $id foi deletada com sucesso!"]);
    }
}
