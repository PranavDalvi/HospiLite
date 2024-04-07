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
    $result = get_appointments_by_doc_id($pdo, $doctor_id); 

    if ($result["appointment_date"] === $date && $result["time_slot"] === $time_slot){
        return true;
    } else {
        return false;
    }
}

function is_date_invalid(string $date){

}