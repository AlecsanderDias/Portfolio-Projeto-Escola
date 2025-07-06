<?php 
return [
    'student' => [
        'min' => env('STUDENT_MIN'),
        'max' => env('STUDENT_MAX')
    ],
    'teacher' => [
        'min' => env('TEACHER_MIN'),
        'max' => env('TEACHER_MAX')
    ],
    'worker' => [
        'min' => env('WORKER_MIN'),
        'max' => env('WORKER_MAX')
    ],
    'admin' => [
        'min' => env('ADMIN_MIN'),
        'max' => env('ADMIN_MAX')
    ],
];
?>