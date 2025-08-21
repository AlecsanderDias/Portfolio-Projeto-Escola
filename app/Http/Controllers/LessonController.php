<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Lesson;
use DateTime;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::getAllLessonsArray();
        $schedule = Constants::LESSONS_SCHEDULE;
        $schoolDays = Constants::SCHOOL_DAYS;
        return view('lesson.index',[
            'lessons' => $lessons, 'schedule' => $schedule,
            'schoolDays' => $schoolDays,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $today = new DateTime();
        $today = date(Constants::DATE_PATTERN);
        $tomorrow = date(Constants::DATE_PATTERN, strtotime('tomorrow'));
        return view('lesson.createForm', ['today' => $today, 'tomorrow' => $tomorrow]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $res = getDateInterval($request->startDate, $request->endDate);
        dd($res);
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
