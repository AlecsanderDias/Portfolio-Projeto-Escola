<?php 
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
                    return generateStudentId();
                break;
                case 'teacher':
                    return generateTeacherId();
                break;
                case 'worker':
                    return generateWorkerId();
                break;
                case 'administrator':
                    return generateAdminId();
                break;
                default:
                    return 0;
                break;
            }
        }
    }

    if( !function_exists('generateStudentId')) {
        function generateStudentId() {
            return rand(
                Config::get('STUDENT_MIN', 100000),
                Config::get('STUDENT_MAX', 999999));
        }
    }

    if( !function_exists('generateTeacherId')) {
        function generateTeacherId() {
            return rand(
                Config::get('TEACHER_MIN', 10000),
                Config::get('TEACHER_MAX', 99999));
        }
    }

    if( !function_exists('generateWorkerId')) {
        function generateWorkerId() {
            return rand(
                Config::get('WORKER_MIN', 1000),
                Config::get('WORKER_MAX', 9999));
        }
    }

    if( !function_exists('generateAdminId')) {
        function generateAdminId() {
            return rand(
                Config::get('ADMIN_MIN', 100),
                Config::get('ADMIN_MAX', 999));
        }
    }

?>