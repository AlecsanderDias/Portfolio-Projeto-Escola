<?php 

namespace App;

class Constants {
    const SUBJECT_HOURS = [
        20, 40, 60, 80
    ];

    public function show_subject_hours() {
        return self::SUBJECT_HOURS;
    }
}

?>