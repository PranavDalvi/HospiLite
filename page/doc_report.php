<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/db.inc.php";
require_once "../includes/mvc_doc_report/doc_report_model.inc.php";
require_once "../includes/mvc_doc_report/doc_report_view.inc.php";
if (empty($_SESSION) || !isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "doctor") {
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
        <h2>HospiLite - Reports (Past Appointments)</h2>
        <div class="wrapper">
            
            
            <?php
            $results = get_appointments_by_doc_id_status($pdo, $_SESSION["user_id"]);
            if ($results) {
                foreach ($results as $result) {
                    echo '
                    <p>Note: You can click on the patients full name to add prescriptions and further procedures for that particular patient.</p>
                                <table>
                                <caption>Appointments</caption>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Patient Name</th>
                                        <th>Patient Phone No.</th>
                                        <th>Patient dob</th>
                                        <th>Appointment Date </th>
                                        <th>Appointment Time</th>
                                        <th>Appointment Status</th>
            
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td data-cell="ID">' . htmlspecialchars($result["id"]) . '</td>
                                    <td data-cell="Full Name"> <a class="" href="view_patient_past_appointment.php?appoId=' . htmlspecialchars($result["id"]) . '">' . htmlspecialchars($result["fullname"])  . '</a></td>
                                    <td data-cell="Phone No.">' . htmlspecialchars($result["phone"]) . '</td>
                                    <td data-cell="Date of Birth">' . htmlspecialchars($result["dob"]) . '</td>
                                    <td data-cell="Role">' . htmlspecialchars($result["appointment_date"]) . '</td>
                                    <td data-cell="created At">' . htmlspecialchars($result["time_slot"]) . '</td>
                                    <td data-cell="created At">' . htmlspecialchars($result["doctorStatus"]) . '</td>

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