<?php

use App\Constants;
use Illuminate\Support\Facades\Config;
    use Illuminate\Support\Str;

    if( !function_exists('generatePassword')) {
        function generatePassword($size = 10) {
            return Str::random($size);
        }
    }

    if( !function_exists('generateRegistration')) {
        function generateRegistration($type):int {
            switch($type) {
                case 'student':
                    return rand(
                        Config::get('STUDENT_MIN', Constants::DEFAULT_VALUES['student']['min']),
                        Config::get('STUDENT_MAX', Constants::DEFAULT_VALUES['student']['max']));
                break;
                case 'teacher':
                    return rand(
                        Config::get('TEACHER_MIN', Constants::DEFAULT_VALUES['teacher']['min']),
                        Config::get('TEACHER_MAX', Constants::DEFAULT_VALUES['teacher']['max']));
                break;
                case 'worker':
                    return rand(
                        Config::get('WORKER_MIN', Constants::DEFAULT_VALUES['worker']['min']),
                        Config::get('WORKER_MAX', Constants::DEFAULT_VALUES['worker']['max']));
                break;
                case 'administrator':
                    return rand(
                        Config::get('ADMIN_MIN', Constants::DEFAULT_VALUES['admin']['min']),
                        Config::get('ADMIN_MAX', Constants::DEFAULT_VALUES['admin']['max']));
                break;
                default:
                    return 0;
                break;
            }
        }
    }

    if(!function_exists('checkUserType')) {
        function checkUserType($userId) {
            
        };
    }

?>