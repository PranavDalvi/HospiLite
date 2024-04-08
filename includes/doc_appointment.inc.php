<?php
require_once "../includes/config_session.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prescriptions = $_POST["prescriptions"];
    $doctor_status = $_POST["doctor-status"];
    $fees = $_POST["fees"];
    $appo_id = $_SESSION["sel_appo_id"];

    try{

        require_once "./db.inc.php";
        require_once "./mvc_doc_appointments/doc_appointment_model.inc.php";
        require_once "./mvc_doc_appointments/doc_appointment_contr.inc.php";

        $errors = [];
        if (is_input_empty($prescriptions, $doctor_status, $fees)) {
            $errors["empty_input"] = "Please fill out all fields.";
        }

        if ($errors){
            $_SESSION["errors_appointment"] = $errors;
        
            $appointmentData = [
                "prescriptions" => $prescriptions,
                "doctor_status" => $doctor_status,
                "fees" => $fees
            ];
            $_SESSION["appointment_data"] = $appointmentData;

            header("Location: ../page/appointments.php");
            die();
        }

        update_appointment_by_doc($pdo, $appo_id, $prescriptions, $doctor_status, $fees);
        header("Location: ../page/doc_appointments.php?upApp=success");
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