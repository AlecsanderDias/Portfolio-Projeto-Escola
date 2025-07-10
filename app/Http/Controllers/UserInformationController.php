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

        $data = User::join('informations','users.information_id','=','informations.id')
            ->select([
                'users.registration','users.userType',
                'informations.name','informations.surname',
                'informations.email','informations.birthDate',
                'informations.gender','informations.cpf',
                'informations.schoolYear','informations.schoolClass_id',
                'informations.id'
                ])->get()->toArray();
        // dd($data, $data[0]['id']);

        // $userFields = ['id','registration', 'userType','information_id'];
        // $informationFields = ['id','name','surname','email','birthDate','gender','cpf','schoolYear','schoolClass_id'];
        // $info = Information::get($informationFields)->all()->toArray();
        // $user = User::where('information_id',$id)->get($userFields)->toArray();
        // $informations = [...$info, ...$user[0]];
        return view('user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.createForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserInformationRequest $request)
    {
        $pass = generatePassword(7);
        $registration = generateRegistration($request->userType);
        $info = Information::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'birthDate' => Date::now(),
            'gender' => $request->gender,
            'cpf' => $request->cpf,
        ]);
        $user = User::create([
            'registration' => $registration,
            'password' => $pass,
            'userType' => $request->userType,
            'information_id' => $info->id,
        ]);
        return redirect()->route('user.index')->with('messge', "O número de Registro é ($registration) e a senha ($pass)");
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
        $userFields = ['id','registration', 'userType','information_id'];
        $informationFields = ['id','name','surname','email','birthDate','gender','cpf','schoolYear','schoolClass_id'];
        $info = Information::get($informationFields)->find($id)->toArray();
        $user = User::where('information_id',$id)->get($userFields)->toArray();
        $data = [...$info, ...$user[0]];
        return view('user.updateForm', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserInformationRequest $request, User $user)
    {
        $updateUser = new User($request->all());
        $updateInfo = new Information($request->all());
        User::find($user->id)->update($updateUser->getAttributes());
        Information::find($user->information_id)->update($updateInfo->getAttributes());
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        Information::find($user->information_id)->delete();
        $user->delete();
        return redirect()->route('user.index');
    }
}
