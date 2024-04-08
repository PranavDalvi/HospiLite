<?php
declare(strict_types=1);

/* "SELECT a.*, u.name AS doctor_name, d.doctor_specialties AS speciality 
FROM appointments a
INNER JOIN doctors d ON a.doctor_id = d.id
INNER JOIN users u ON d.user_id = u.id  -- Join with users for doctor name
WHERE a.patient_id = :patient_id
AND (doctorStatus = 'completed' OR doctorStatus = 'reschedule');";
*/

function get_appointments_by_patient_id_status(object $pdo, int $patient_id){
    $query = "SELECT a.*, u.fullname AS doctor_name, d.doctor_specialties AS doctor_speciality FROM appointments a INNER JOIN doctors d ON a.doctor_id = d.id INNER JOIN users u ON a.doctor_id = u.id WHERE a.patient_id = :patient_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":patient_id", $patient_id);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_appointment_by_id(object $pdo, int $appointment_id){
    $query = "SELECT a.*, u.fullname AS doctor_name, u.email AS doctor_email, u.phone AS doctor_phone,  d.doctor_specialties AS doctor_speciality FROM appointments a INNER JOIN doctors d ON a.doctor_id = d.id INNER JOIN users u ON a.doctor_id = u.id WHERE a.id = :appointment_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":appointment_id", $appointment_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function update_payment_status(object $pdo, int $appo_id){
    $userStatus = "paid";
    $query = "UPDATE appointments SET userStatus = :userStatus WHERE id = :appo_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":userStatus", $userStatus);
    $stmt->bindParam(":appo_id", $appo_id);
    $stmt->execute();
}