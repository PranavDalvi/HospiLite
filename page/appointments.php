<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/db.inc.php";
require_once "../includes/mvc_appointments/appointment_model.inc.php";
require_once "../includes/mvc_appointments/appointment_view.inc.php";
if (empty($_SESSION) || !isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "user") {
    header("Location: ./login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_register.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <title>HospiLite</title>
</head>

<body>
    <?php
    include_once "../components/navbar/navbar_user.php";
    ?>
    <main>
        <h2>HospiLite - New Appointment</h2>
        <div class="reg-body">
            <div class="reg-container">
                <!-- <h1 class="header">Registration Form</h1> -->
                <form action="../includes/appointment.inc.php" class="form" method="post">

                    <div class="input-box">
                        <label for="doctor_specialties">Doctor:</label>
                        <select name="doctor_specialties" id="doctor_specialties">
                            <?php
                            $results = get_all_doctors($pdo);
                            if ($results) {
                                foreach ($results as $result) {
                                    echo '
                                    <option value="' . $result["id"] . '">' . $result["doctor_name"] .' - '. $result["doctor_specialties"] . '</option>
                                    ';
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="column">
                        <div class="input-box">
                            <label for="date">Date:</label>
                            <input name="date" type="date" placeholder="Enter Date" require>
                        </div>

                        <div class="input-box">
                            <label for="time-slot">Time slot:</label>
                            <select name="time-slot" id="time-slot">
                                <option value="08:30 - 09:30">08:30 - 09:30</option>
                                <option value="08:30 - 09:30">09:30 - 10:30</option>
                                <option value="08:30 - 09:30">10:30 - 11:30</option>
                                <option value="08:30 - 09:30">11:30 - 12:30</option>
                                <option value="08:30 - 09:30">12:30 - 13:30</option>
                                <option value="08:30 - 09:30">13:30 - 14:30</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="reason">Reason:</label>
                        <input name="reason" type="text" placeholder="Enter reason of visit" require>
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