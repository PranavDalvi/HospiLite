<?php
require_once "../includes/config_session.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_id = $_POST["doctor_specialties"];
    $date = $_POST["date"];
    $time_slot = $_POST["time-slot"];
    $reason = $_POST["reason"];
    $patient_id = $_SESSION["user_id"];

    try{

        require_once "./db.inc.php";
        require_once "./mvc_appointments/appointment_model.inc.php";
        require_once "./mvc_appointments/appointment_contr.inc.php";

        $errors = [];
        if (is_input_empty($date, $time_slot, $reason)) {
            $errors["empty_input"] = "Please fill out all fields.";
        }

        if (is_time_slot_occupied($pdo, $doctor_id, $date, $time_slot)){
            $errors["time_slot_occupied"] = "Please select another time slot.";
        }

        if (is_date_invalid($date)){
            $errors["invalid_date"] = "Please valid date.";
        }

        if ($errors){
            $_SESSION["errors_appointment"] = $errors;
        
            $appointmentData = [
                "doctor_specialties" => $doctor_id,
                "date" => $date,
                "time-slot" => $time_slot,
                "reason"=> $reason
            ];
            $_SESSION["appointment_data"] = $appointmentData;

            header("Location: ../page/appointments.php");
            die();
        }

        create_appointment($pdo, $patient_id, $doctor_id, $date, $time_slot, $reason);
        header("Location: ../page/appointments.php?newApp=success");
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $error){
        die("Query failed: ". $error->getMessage());
    }

} else{
    header("Location: ../page/dashboard.php");
    die();
}