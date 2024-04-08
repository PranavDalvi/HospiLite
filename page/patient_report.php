<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/db.inc.php";
require_once "../includes/mvc_patient_report/patient_report_model.inc.php";
require_once "../includes/mvc_patient_report/patient_report_view.inc.php";
if (empty($_SESSION) || !isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "user") {
    header("Location: ./login.php");
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
        <h2>HospiLite - Reports</h2>
        <div class="wrapper">
            
            
            <?php
            $results = get_appointments_by_patient_id_status($pdo, $_SESSION["user_id"]);
            if ($results) {
                foreach ($results as $result) {
                    echo '
                    <p>Note: You can click on the fees to view prescriptions and further procedures given by doctor.</p>
                                <table>
                                <caption>My Appointments</caption>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Doctor Name</th>
                                        <th>Doctor Speciality</th>
                                        <th>Appointment Date </th>
                                        <th>Appointment Time</th>
                                        <th>Appointment Status</th>
                                        <th>Visit Fees</th>
            
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td data-cell="ID">' . htmlspecialchars($result["id"]) . '</td>
                                    <td data-cell="Doctor Name">' . htmlspecialchars($result["doctor_name"]) . '</td>
                                    <td data-cell="Doctor Speciality">' . htmlspecialchars($result["doctor_speciality"]) . '</td>
                                    <td data-cell="Appointment Date">' . htmlspecialchars($result["appointment_date"]) . '</td>
                                    <td data-cell="Created At">' . htmlspecialchars($result["time_slot"]) . '</td>
                                    <td data-cell="Doctor Status">' . htmlspecialchars($result["doctorStatus"]) . '</td>
                                    <td data-cell="Fees"> <a class="" href="view_appointment.php?appoId=' . htmlspecialchars($result["id"]) . '">' . htmlspecialchars($result["fees"])  . '</a></td>

                                </tr>
                                </tbody>
                                </table>
                                ';
                }
            }
            else{
                echo '<p>oops! It seems empty here.</p>';
            }
            ?>

        </div>
        </div>
        <?php

        ?>
    </main>
</body>

</html>