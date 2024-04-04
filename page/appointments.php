<?php
require_once "../includes/config_session.inc.php";

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
                <form action="../includes/add_user.inc.php" class="form" method="post">
                    <div class="input-box">
                        <label for="fullName">Full Name</label>
                        <input name="fullname" id="fullName" type="text" placeholder="Enter Full Name" require>
                    </div>
                    <div class="input-box">
                        <label for="eMail">Email Address</label>
                        <input name="email" id="eMail" type="email" placeholder="Enter Email Address" require>
                    </div>
                    <div class="column">
                        <div class="input-box">
                            <label for="phoneNo">Phone Number</label>
                            <input name="phone" id="phoneNo" type="tel" placeholder="Enter Phone No." pattern="[0-9]{10}" require>
                        </div>
                        <div class="input-box">
                            <label for="birthDate">Birth Date</label>
                            <input name="dob" id="birthDate" type="date" placeholder="Enter Birth Date" require>
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="doctor_specialties">Doctor's specialty:</label>
                        <select name="doctor_specialties" id="doctor_specialties">
                            <option value="NULL">N/A (for other roles)</option>
                            <option value="Audiologist">Audiologist</option>
                            <option value="Allergist">Allergist</option>
                            <option value="Anesthesiologist">Anesthesiologist</option>
                            <option value="Cardiologist">Cardiologist</option>
                            <option value="Dentist">Dentist</option>
                            <option value="Dermatologist">Dermatologist</option>
                            <option value="Endocrinologist">Endocrinologist</option>
                        </select>
                    </div>
                    <button class="submit-btn">Submit</button>
                </form>
                <?php

                ?>
            </div>
        </div>
    </main>
    
</body>
</html>