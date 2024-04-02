<?php

include_once "../components/navbar/navbar_admin.php";
require_once "../includes/config_session.inc.php";
require_once "../includes/mvc_edit_user/edit_user_model.inc.php";
require_once "../includes/db.inc.php";


if (isset($_GET['id']) && !empty($_SESSION) && $_SESSION["user_role"] == "admin") {
    $user_id = $_GET['id'];
    $user_details = get_user_by_id($pdo, $user_id);
    $_SESSION["sel_user_id"] = $user_id;
} else {
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
                <form action="../includes/edit_user.inc.php" class="form" method="post">
                    <div class="input-box">
                        <label for="fullName">Full Name</label>
                        <?php
                        echo '<input name="fullname" id="fullName" type="text" placeholder="Enter Full Name" value="' . htmlspecialchars($user_details["fullname"]) . '" require>'
                        ?>
                    </div>
                    <div class="input-box">
                        <label for="eMail">Email Address</label>
                        <?php
                        echo '<input type="text" name="email" value=' . $user_details["email"] . ' required>';
                        ?>
                    </div>
                    <div class="column">
                        <div class="input-box">
                            <label for="phoneNo">Phone Number</label>
                            <?php
                            echo '<input name="phone" id="phoneNo" type="tel" placeholder="Enter Phone No." pattern="[0-9]{10}" value=' . htmlspecialchars($user_details["phone"]) . ' require>';
                            ?>
                        </div>
                        <div class="input-box">
                            <label for="birthDate">Birth Date</label>
                            <?php
                            echo ' <input name="dob" id="birthDate" type="date" placeholder="Enter Birth Date" value=' . htmlspecialchars($user_details["dob"]) . ' require>'
                            ?>
                        </div>
                    </div>
                    <div class="gender-container">
                        <h3>Gender</h3>
                        <div class="gender-option">
                            <div class="gender">
                                <input type="radio" id="check-male" name="gender" value="male" <?php if ($user_details["gender"] == "male") {
                                                                                                    echo "checked";
                                                                                                } ?> />
                                <label for="check-male">Male</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-female" name="gender" value="female" <?php if ($user_details["gender"] == "female") {
                                                                                                        echo "checked";
                                                                                                    } ?> />
                                <label for="check-female">female</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-na" name="gender" value="N/A" <?php if ($user_details["gender"] == "N/A") {
                                                                                                echo "checked";
                                                                                            } ?> />
                                <label for="check-na">Prefer not to say</label>
                            </div>
                        </div>
                    </div>

                    <div class="gender-container">
                        <h3>Role</h3>
                        <div class="gender-option">
                            <div class="gender">
                                <input type="radio" id="check-user" name="user_role" value="user" <?php if ($user_details["user_role"] == "user") {
                                                                                                        echo "checked";
                                                                                                    } ?> />
                                <label for="check-user">User</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-clerk" name="user_role" value="clerk" <?php if ($user_details["user_role"] == "clerk") {
                                                                                                        echo "checked";
                                                                                                    } ?> />
                                <label for="check-clerk">Clerk</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-doctor" name="user_role" value="doctor" <?php if ($user_details["user_role"] == "doctor") {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                                <label for="check-doctor">Doctor</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-admin" name="user_role" value="admin" <?php if ($user_details["user_role"] == "admin") {
                                                                                                        echo "checked";
                                                                                                    } ?> />
                                <label for="check-admin">Admin</label>
                            </div>
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="doctor_specialties">Doctor's specialty:</label>
                        <select name="doctor_specialties" id="doctor_specialties">
                            <option value="NULL" <?php if (is_null($user_details['doctor_specialties'])) echo "selected"; ?>>N/A (for other roles)</option>
                            <option value="Audiologist" <?php if ($user_details['doctor_specialties'] == "Audiologist") echo "selected"; ?>>Audiologist</option>
                            <option value="Allergist" <?php if ($user_details['doctor_specialties'] == "Allergist") echo "selected"; ?>>Allergist</option>
                            <option value="Anesthesiologist" <?php if ($user_details['doctor_specialties'] == "Anesthesiologist") echo "selected"; ?>>Anesthesiologist</option>
                            <option value="Cardiologist" <?php if ($user_details['doctor_specialties'] == "Cardiologist") echo "selected"; ?>>Cardiologist</option>
                            <option value="Dentist" <?php if ($user_details['doctor_specialties'] == "Dentist") echo "selected"; ?>>Dentist</option>
                            <option value="Dermatologist" <?php if ($user_details['doctor_specialties'] == "Dermatologist") echo "selected"; ?>>Dermatologist</option>
                            <option value="Endocrinologist" <?php if ($user_details['doctor_specialties'] == "Endocrinologist") echo "selected"; ?>>Endocrinologist</option>
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