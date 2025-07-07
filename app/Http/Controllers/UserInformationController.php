<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserInformationRequest;
use App\Http\Requests\UpdateUserInformationRequest;
use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class UserInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informations = Information::all();
        // dd($informations);
        return view('user.index', ['informations' => $informations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.createUserForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserInformationRequest $request)
    {
        $pass = generatePassword(7);
        $registration = generateStudentId();
        $info = Information::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'birthDate' => Date::now(),
            'gender' => $request->gender,
            'cpf' => $request->cpf,
            'registration' => $registration,
        ]);
        $user = User::create([
            'registration' => $registration,
            'password' => $pass,
            'userType' => $request->userType,
            'information_id' => $info->id,
        ]);
        // dd($user, $pass, $registration, $info);
        return redirect('user.index');
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
        $user = User::find();
        $info = Information::find();
        return view('user.updateUserForm', ['user' => $user, 'info' => $info]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserInformationRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
