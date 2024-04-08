<?php
declare(strict_types=1);

function is_input_empty(string $prescriptions, string $doctor_status, string $fees){
    if (empty($prescriptions) || empty($doctor_status) || empty($fees)){
        return true;
    } else {
        return false;
    }
}