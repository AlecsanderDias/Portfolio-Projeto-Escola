<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Http\Requests\CreateUserInformationRequest;
use App\Http\Requests\UpdateUserInformationRequest;
use App\Models\Grade;
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
        $data = User::getAllUsersArray();
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
            $data->schoolClasses = SchoolClass::getAllSchoolClassesNames();
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
            'subject_name' => $request->name,
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
            $student = Student::create([
                'user_id' => $user->id,
                'school_year' => $request->school_year,
                'school_class_id' => $request->school_class_id,
            ]);
            Grade::createStudentGrades($student->id);
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
        $user = User::getUserById($id);
        $userType = checkUserType($user->registration);
        $info = Information::getInformationById($user->information_id);
        $schoolClasses = SchoolClass::getSchoolClassesByCurrentYear();
        $role = new stdClass();
        if($userType === 'student') {
            $role = Student::getStudentByUserId($id);
        } elseif($userType === 'teacher') {
            $role = Teacher::getTeacherByUserId($id);
        } else {
            $role = Worker::getWorkerByUserId($id);
        }
        $data = [
            ...$user->toArray(), 
            ...$info->toArray(), 
            ...$role[0]->toArray(), 
            'school_classes' => $schoolClasses->toArray(), 
            'school_years' => Constants::SCHOOL_YEARS, 
            'school_rooms' => Constants::ROOM_NAMES];
        return view('user.updateForm', ['data' => $data, 'userType' => $userType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserInformationRequest $request, User $user)
    {
        $userType = checkUserType($user->registration);
        User::updateUserById($user->id, $request->all());
        Information::updateInformationById($user->information_id, $request->all());
        if($userType === 'student') {
            Student::updateStudentByUserId($user->id, $request->all());
        } elseif($userType === 'teacher') {
            Teacher::updateTeacherByUserId($user->id, $request->all());
        } else {
            Worker::updateWorkerByUserId($user->id, $request->all());
        }
        return redirect()->route('users.index')->with('message', ["O usuário com registro $user->registration do tipo $userType foi atualizado com sucesso!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::deleteUserById($id);
        $info = Information::deleteInformationByUserId($user->id);
        $userType = checkUserType($user->registration);
        if($userType === 'student') {
            Student::deleteStudentByUserId($user->id);
        } elseif ($userType === 'teacher') {
            Teacher::deleteTeacherByUserId($user->id);
        } else {
            Worker::deleteWorkerByUserId($user->id);            
        }
        return redirect()->route('users.index')->with('message', ["O usuário $info->name com matrícula $user->registration foi excluído do sistema!"]);
    }
}
