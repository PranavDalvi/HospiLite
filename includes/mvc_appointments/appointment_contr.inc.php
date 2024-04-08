<?php
declare(strict_types=1);

function is_input_empty(string $date, string $time_slot, string $reason){
    if (empty($date) || empty($time_slot) || empty($reason)){
        return true;
    } else {
        return false;
    }
}

function is_time_slot_occupied(object $pdo, int $doctor_id, string $date, string $time_slot){
    $result = fetch_appointments_with_date_time_slot ($pdo, $doctor_id, $date, $time_slot); 

    if (!empty($result)){
        return true;
    } else {
        return false;
    }
}

function is_date_invalid(string $date){
    $parsedDate = strtotime($date);
    if ($parsedDate < time()){
        return true;
    } else {
        return false;
    }
}