<?php
require_once "./config_session.inc.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $user_role = $_POST["user_role"];

    try{
        require_once "./db.inc.php";
        require_once "./mvc_edit_user/edit_user_model.inc.php";
        require_once "./mvc_edit_user/edit_user_contr.inc.php";

        $sel_user_id = $_SESSION["sel_user_id"];

        $errors = [];
        if (is_input_empty($fullname, $email, $phone, $dob, $gender, $user_role)) {
            $errors["empty_input"] = "Please fill out all fields.";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Please enter valid E-mail";
        }
        if (is_phone_invalid($phone)) {
            $errors["invalid_phone"] = "Please enter valid Phone Number";
        }
        if (is_email_registered($pdo, $email, $sel_user_id)) {
            $errors["email_used"] = "E-mail already registered.";
        }
        if (is_phone_registered($pdo, $phone, $sel_user_id)) {
            $errors["phone_used"] = "Phone already registered.";
        }

        if ($errors) {
            $_SESSION["errors_update_user"] = $errors;

            header("Location: ../page/view_all_users.php");
            die();
        }

        update_user($pdo, $sel_user_id, $fullname, $email, $phone,  $dob, $gender, $user_role);

        header("Location: ../page/view_all_users.php?usrdel=success");
    } catch (PDOException $error) {
        die("Query failed: " . $error->getMessage());
    }
} else{
    header("Location: ../page/dashboard.php");
    die();
}