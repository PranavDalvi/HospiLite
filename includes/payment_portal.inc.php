<?php
require_once "../includes/config_session.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appo_id = $_SESSION["sel_appo_id"];

    try {
        require_once "../includes/db.inc.php";
        require_once "../includes/mvc_patient_report/patient_report_model.inc.php";
        require_once "../includes/mvc_patient_report/patient_report_contr.inc.php";

        update_payment_status($pdo, $appo_id);
        header("Location: ../page/patient_report.php?payment=success");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $error) {
        die("Query failed: " . $error->getMessage());
    }
} else {
    header("Location: ../page/dashboard.php");
    die();
}
