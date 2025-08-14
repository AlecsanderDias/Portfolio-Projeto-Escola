<?php 

namespace App;

class Constants {
    const DEFAULT_VALUES = [
        'student' => [
            'min' => 100000,
            'max' => 999999
        ],
        'teacher' => [
            'min' => 10000,
            'max' => 99999
        ],
        'worker' => [
            'min' => 1000,
            'max' => 9999
        ],
        'admin' => [
            'min' => 100,
            'max' => 999
        ],
    ];

    const SUBJECT_HOURS = [20, 40, 60, 80];

    const CORE_SUBJECTS = [
        'Matemática',
        'Química',
        'Português',
        'Física',
        'Geografia',
        'Biologia',
        'História',
        'Educação Física',
        'Sociologia',
        'Filosofia',
        'Artes',
    ];

    const SCHOOL_YEARS = [
        1 => "1º Ano",
        2 => "2º Ano",
        3 => "3º Ano",
    ];

    const USER_TYPES = ['student', 'teacher', 'worker', 'administrator'];

    const ROOM_NAMES = [
        '1A', '1B', '1C', '1D', '1E', '1F',
        '2A', '2B', '2C', '2D', '2E', '2F',
    ];

    const FOUNDATION_YEAR = 2021;

    const QUARTERS = [
        1 => '1º Bimestre',
        2 => '2º Bimestre',
        3 => '3º Bimestre',
        4 => '4º Bimestre'
    ];
}

?>