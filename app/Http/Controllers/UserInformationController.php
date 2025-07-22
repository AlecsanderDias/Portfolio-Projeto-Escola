<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Http\Requests\CreateUserInformationRequest;
use App\Http\Requests\UpdateUserInformationRequest;
use App\Models\Information;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use stdClass;

class UserInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = User::join('informations','users.information_id','=','informations.id')
            ->select([
                'users.registration','informations.id',
                'informations.name','informations.surname',
                'informations.email','informations.birth_date',
                'informations.gender','informations.cpf',
                ])->get()->toArray();
        return view('user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $userType = $request->user_type;
        $data = new stdClass();
        if($userType === 'student') {
            $data->schoolClasses = SchoolClass::all()->select('id','class_name');
            $data->schoolYears = Constants::SCHOOL_YEARS;
        }
        return view('user.createForm', ['userType' => $userType, 'data' => $data]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserInformationRequest $request)
    {
        $pass = generatePassword(7);
        $registration = generateRegistration($request->user_type);
        $info = Information::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'birth_date' => Date::now(),
            'gender' => $request->gender,
            'cpf' => $request->cpf,
        ]);
        $user = User::create([
            'registration' => $registration,
            'password' => $pass,
            'information_id' => $info->id,
        ]);
        if($request->user_type === "student") {
            Student::create([
                'user_id' => $user->id,
                'school_year' => $request->school_year,
                'school_class_id' => $request->school_class_id,
            ]);
        } elseif($request->user_type === "teacher") {
            Teacher::create([
                'user_id' => $user->id,
                'professional_number' => $request->professional_number
            ]);
        } else {
            Worker::create([
                'user_id' => $user->id,
                'role' => $request->user_type
            ]);
        } 
        return redirect()->route('users.index')->with('message', ["O número de Registro é ($registration) e a senha ($pass)"]);
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

        $userFields = ['id','registration','information_id'];
        $informationFields = ['name','surname','email','birth_date','gender','cpf'];
        $user = User::select($userFields)->find($id);
        $userType = checkUserType($user->registration);
        $info = Information::select($informationFields)->find($user->information_id);
        $schoolClasses = SchoolClass::select(['id', 'class_name', 'school_year', 'room'])->where('year',2025)->get();
        $role = new stdClass();
        if($userType === 'student') {
            $role = Student::select(['school_year', 'school_class_id'])->where('user_id',$id)->get();
        } elseif($userType === 'teacher') {
            $role = Teacher::select(['professional_number'])->where('user_id',$id)->get();
        } else {
            $role = Worker::select(['role'])->where('user_id',$id)->get();
        }
        // dd($role, $id, $userType, $userType === 'student');
        $data = [
            ...$user->toArray(), 
            ...$info->toArray(), 
            ...$role[0]->toArray(), 
            'school_classes' => $schoolClasses->toArray(), 
            'school_years' => Constants::SCHOOL_YEARS, 
            'school_rooms' => Constants::ROOM_NAMES];
        // dd("Edit", $data);
        return view('user.updateForm', ['data' => $data, 'userType' => $userType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserInformationRequest $request, User $user)
    {
        $userType = checkUserType($user->registration);
        // dd($user, $userType);
        $updateUser = new User($request->all());
        $updateInfo = new Information($request->all());
        User::find($user->id)->update($updateUser->getAttributes());
        Information::find($user->information_id)->update($updateInfo->getAttributes());
        if($userType === 'student') {
            $studentId = Student::select(['id'])->where('user_id',$user->id);
            $updateStudent = new Student($request->all());
            Student::find($studentId)->update($updateStudent->getAttributes());
        } elseif($userType === 'teacher') {
            $teacherId = Teacher::select(['id'])->where('user_id',$user->id);
            $updateTeacher = new Teacher($request->all());
            Teacher::find($teacherId)->update($updateTeacher->getAttributes());
        } else {
            $workerId = Worker::select(['id'])->where('user_id',$user->id);
            $updateWorker = new Worker($request->all());
            Worker::find($workerId)->update($updateWorker->getAttributes());
        }
        return redirect()->route('users.index')->with('message', ["O usuário com registro $user->registration do tipo $userType foi atualizado com sucesso!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $info = Information::find($user->information_id)->delete();
        $user->delete();
        return redirect()->route('users.index')->with('message', ["O usuário $info->name com matrícula $user->registration foi excluído do sistema!"]);
    }
}
