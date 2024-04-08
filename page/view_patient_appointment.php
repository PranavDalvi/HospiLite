<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/db.inc.php";
require_once "../includes/mvc_doc_appointments/doc_appointment_model.inc.php";
require_once "../includes/mvc_doc_appointments/doc_appointment_view.inc.php";
if (empty($_GET["appoId"]) || empty($_SESSION) || !isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "doctor") {
    header("Location: ./login.php");
} else {
    $appointment_id = $_GET["appoId"];
    $_SESSION["sel_appo_id"] = $appointment_id;
    $result = get_appointments_by_id($pdo, $appointment_id);
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
        <h2>HospiLite - View Appointment</h2>
        <div class="reg-body">
            <div class="reg-container">
                <!-- <h1 class="header">Registration Form</h1> -->
                <form action="../includes/doc_appointment.inc.php" class="form" method="post">
                    <div class="input-box">
                        <label for="patient_name">Patient Name:</label>
                        <?php echo '<input name="patient_name" type="text" value="' . htmlspecialchars($result["fullname"]) . '" disabled>' ?>
                    </div>
                    <div class="column">
                        <div class="input-box">
                            <label for="patient_phone">Patient Phone No.:</label>
                            <?php echo '<input name="patient_phone" type="text" value="' . htmlspecialchars($result["phone"]) . '" disabled>' ?>
                        </div>
                        <div class="input-box">
                            <label for="patient_email">Patient E-mail:</label>
                            <?php echo '<input name="patient_email" type="text" value="' . htmlspecialchars($result["email"]) . '" disabled>' ?>
                        </div>
                    </div>
                    <div class="column">
                        <div class="input-box">
                            <label for="patient_dob">Patient DOB:</label>
                            <?php echo '<input name="patient_dob" type="text" value="' . htmlspecialchars($result["dob"]) . '" disabled>' ?>
                        </div>
                        <div class="input-box">
                            <label for="patient_gender">Patient Gender:</label>
                            <?php echo '<input name="patient_gender" type="text" value="' . htmlspecialchars($result["gender"]) . '" disabled>' ?>
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
                        <textarea name="prescriptions" type="text"></textarea>
                    </div>

                    <div class="gender-container">
                        <h3>Appointment Status:</h3>
                        <div class="gender-option">
                            <div class="gender">
                                <input type="radio" id="check-completed" name="doctor-status" value="completed" />
                                <label for="check-completed">Completed</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-reshedule" name="doctor-status" value="reshedule" />
                                <label for="check-reshedule">Reshedule</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-pending" name="doctor-status" checked value="pending" />
                                <label for="check-pending">Pending</label>
                            </div>
                        </div>
                    </div>

                    <div class="input-box">
                        <label for="fees">Fees:</label>
                        <input name="fees" type="text" required>
                    </div>

                    <button class="submit-btn">Submit</button>
                </form>
                <?php
                check_create_appointments_errors()
                ?>
            </div>
        </div>
    </main>
</body>

</html>