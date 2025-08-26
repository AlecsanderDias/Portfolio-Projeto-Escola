<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Http\Requests\CreateScheduleRequest;
use App\Models\Schedule;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::getAllSchedules();
        return view('schedule.index', ['schedules' => $schedules]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $days = Constants::SCHOOL_DAYS_NAME;
        $hours = Constants::LESSONS_SCHEDULE;
        $subjects = Subject::getAllSubjectsNames();
        $schoolClasses = SchoolClass::getAllSchoolClassesNames();

        // dd($days, $hours, $subjects, $schoolClasses);
        return view('schedule.createForm', [
            'days' => $days,
            'hours' => $hours,
            'subjects' => $subjects,
            'schoolClasses' => $schoolClasses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateScheduleRequest $request)
    {
        Schedule::createSchedule($request->all());
        return route('schedules.index');   
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
        //
    }
}
