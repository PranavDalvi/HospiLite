<?php
declare(strict_types=1);

function get_appointments_by_doc_id(object $pdo, int $doctor_id){
    $query = "SELECT u.fullname, u.email, u.phone, u.dob, u.gender, a.* FROM users u INNER JOIN appointments a ON a.patient_id = u.id WHERE doctor_id = :doctor_id AND doctorStatus = 'pending';";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":doctor_id", $doctor_id);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_appointments_by_id(object $pdo, int $appointment_id){
    $query = "SELECT u.fullname, u.email, u.phone, u.dob, u.gender, a.* FROM users u INNER JOIN appointments a ON a.patient_id = u.id WHERE a.id = :appointment_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":appointment_id", $appointment_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function update_appointment_by_doc(object $pdo, int $appo_id, string $prescriptions, string $doctor_status, string $fees){
    $query = "UPDATE appointments SET notes = :prescriptions, doctorStatus = :doctor_status, fees = :fees WHERE id = :appo_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":prescriptions", $prescriptions);
    $stmt->bindParam(":doctor_status", $doctor_status);
    $stmt->bindParam(":fees", $fees);
    $stmt->bindParam(":appo_id", $appo_id);
    $stmt->execute();
}