<?php
declare(strict_types=1);

function get_all_doctors(object $pdo){
    $query = "SELECT u.fullname AS doctor_name, d.* FROM users u INNER JOIN doctors d ON u.id = d.id;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

function get_appointments_by_doc_id(object $pdo, int $doctor_id){
    $query = "SELECT * FROM appointments WHERE doctor_id = :doctor_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":doctor_id", $doctor_id);
    $stmt->execute();

    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

function create_appointment(object $pdo, int $user_id, int $doctor_id, string $date, string $time_slot, string $reason){
    $query = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, time_slot, reason) VALUES (:patient_id, :doctor_id, :appointment_date, :time_slot, :reason);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":patient_id", $user_id);
    $stmt->bindParam(":doctor_id", $doctor_id);
    $stmt->bindParam(":appointment_date", $date);
    $stmt->bindParam(":time_slot", $time_slot);
    $stmt->bindParam(":reason", $reason);

    $stmt->execute();
}