<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/db.inc.php";
require_once "../includes/mvc_patient_report/patient_report_model.inc.php";
require_once "../includes/mvc_patient_report/patient_report_view.inc.php";
require_once "../includes/mvc_patient_report/patient_report_contr.inc.php";

if (empty($_GET["appoId"]) || empty($_SESSION) || !isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "user") {
    header("Location: ./login.php");
} else {
    $appointment_id = $_GET["appoId"];
    $_SESSION["sel_appo_id"] = $appointment_id;
    $result = get_appointment_by_id($pdo, $appointment_id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HospiLite</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/login_register.css">
</head>

<body>
    <?php
    include_once "../components/navbar/navbar_doctor.php";
    ?>
    <main>
        <h2>HospiLite - Reports </h2>
        <div class="reg-body">
            <div class="reg-container">
                <!-- <h1 class="header">Registration Form</h1> -->
                <form action="../includes/payment_portal.inc.php" class="form" method="post">
                    <div class="column">
                        <div class="input-box">
                            <label for="patient_phone">Doctor Name:</label>
                            <?php echo '<input name="patient_phone" type="text" value="' . htmlspecialchars($result["doctor_name"]) . '" disabled>' ?>
                        </div>
                        <div class="input-box">
                            <label for="patient_name">Doctor Speciality:</label>
                            <?php echo '<input name="patient_name" type="text" value="' . htmlspecialchars($result["doctor_speciality"]) . '" disabled>' ?>
                        </div>
                    </div>
                    <div class="column">
                        <div class="input-box">
                            <label for="patient_phone">Doctor Phone No.:</label>
                            <?php echo '<input name="patient_phone" type="text" value="' . htmlspecialchars($result["doctor_phone"]) . '" disabled>' ?>
                        </div>
                        <div class="input-box">
                            <label for="patient_email">Doctor E-mail:</label>
                            <?php echo '<input name="patient_email" type="text" value="' . htmlspecialchars($result["doctor_email"]) . '" disabled>' ?>
                        </div>
                    </div>

                    <div class="column">
                        <div class="input-box">
                            <label for="appo_date">Appointment Date:</label>
                            <?php echo '<input name="appo_date" type="text" value="' . htmlspecialchars($result["appointment_date"]) . '" disabled>' ?>
                        </div>
                        <div class="input-box">
                            <label for="appo_time_slot">Time Slot:</label>
                            <?php echo '<input name="appo_time_slot" type="text" value="' . htmlspecialchars($result["time_slot"]) . '" disabled>' ?>
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="appo_reason">Appointment Reason:</label>
                        <?php echo '<textarea name="appo_reason" type="text" disabled> ' . htmlspecialchars($result["reason"]) . ' </textarea>' ?>
                    </div>
                    <div class="input-box">
                        <label for="prescriptions">Prescriptions:</label>
                        <?php echo '<textarea name="appo_reason" type="text" disabled> ' . htmlspecialchars($result["notes"]) . ' </textarea>' ?>
                    </div>
                    <div class="input-box">
                        <label for="doctor-status">Appointment Status:</label>
                        <?php echo '<input name="doctor-status" type="text" value="' . htmlspecialchars($result["doctorStatus"]) . '" disabled>' ?>
                    </div>

                    <div class="input-box">
                        <label for="fees">Fees:</label>
                        <?php echo '<input name="fees" type="text" value="' . htmlspecialchars($result["fees"]) . '" disabled>' ?>
                    </div>
                    <?php 
                    if(check_unpaid_fees($result["userStatus"])){
                        echo '<button class="submit-btn">Pay Fees</button>';
                    } else{
                        echo '<p>Thank-you for using HospiLite.</p>';
                    }
                    ?>
                    
                </form>
                <?php
                ?>
            </div>
        </div>
    </main>
</body>

</html>