<?php
include_once "../components/navbar_admin.php";

require_once "../includes/config_session.inc.php";


if (empty($_SESSION) || !isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "admin") {
    header("Location: ./login.php");
    die();
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
    <main>
        <h2>HospiLite - Add User</h2>
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
                    <div class="gender-container">
                        <h3>Gender</h3>
                        <div class="gender-option">
                            <div class="gender">
                                <input type="radio" id="check-male" name="gender" value="male" />
                                <label for="check-male">Male</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-female" name="gender" value="female" />
                                <label for="check-female">female</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-na" name="gender" checked value="N/A" />
                                <label for="check-na">Prefer not to say</label>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="input-box address">
                    <label for="address">Address</label>
                    <input id="address" type="text" placeholder="Enter Address Line 1" >
                    <input type="text" placeholder="Enter Address Line 2">
                    <div class="column">
                        <div class="select-container">
                            <select name="" id="">
                                <option value="" hidden>Country</option>
                                <option value="">America</option>
                                <option value="">Brazil</option>
                                <option value="">Colombo</option>
                                <option value="">India</option>
                            </select>
                        </div>
                        <input type="text" placeholder="Enter City" >
                    </div>
                    <div class="column">
                        <input type="text" placeholder="Enter Region" >
                        <input type="number" placeholder="Enter postal code" >
                    </div>
                </div> -->
                    <div class="input-box">
                        <label for="pass">Password</label>
                        <input name="pwd" id="pass" type="password" placeholder="Enter Password" pattern=".{6,}">
                    </div>
                    <div class="input-box">
                        <label for="con_pass">Confirm Password</label>
                        <input name="cpwd" id="con_pass" type="password" placeholder="Confirm Password">
                    </div>

                    <div class="gender-container">
                        <h3>Role</h3>
                        <div class="gender-option">
                            <div class="gender">
                                <input type="radio" id="check-user" name="user_role" checked value="user" />
                                <label for="check-user">User</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-clerk" name="user_role" value="clerk" />
                                <label for="check-clerk">Clerk</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-doctor" name="user_role" value="doctor" />
                                <label for="check-doctor">Doctor</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-admin" name="user_role" value="admin" />
                                <label for="check-admin">Admin</label>
                            </div>
                        </div>
                    </div>
                    <div class="select-box">
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