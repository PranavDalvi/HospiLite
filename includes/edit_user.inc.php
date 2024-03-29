<?php
require_once "./config_session.inc.php";


if (isset($_GET['id']) && !empty($_SESSION) && $_SESSION["user_role"] == "admin"){
    $user_id = $_GET['id'];
    try{
        require_once "./db.inc.php";
        require_once "./mvc_edit_user/edit_user_model.inc.php";
        require_once "./mvc_edit_user/edit_user_contr.inc.php";

        $user_details = get_user_by_id($pdo, $user_id);

        $errors = [];
        if (is_input_empty($fullname, $email, $phone, $dob, $gender, $pwd, $cpwd, $user_role)) {
            $errors["empty_input"] = "Please fill out all fields.";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Please enter valid E-mail";
        }
        if (is_phone_invalid($phone)) {
            $errors["invalid_phone"] = "Please enter valid Phone Number";
        }
        if (!is_password_match($pwd, $cpwd)) {
            $errors["pwd_not_match"] = "Password and Confirm Passwords does not match.";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "E-mail already registered.";
        }
        if (is_phone_registered($pdo, $phone)) {
            $errors["phone_used"] = "Phone already registered.";
        }

        if ($errors) {
            $_SESSION["errors_delete_account"] = $errors;

            header("Location: ../page/view_all_users.php");
            die();
        }

        delete_account($pdo, $user_id);

        header("Location: ../page/view_all_users.php?usrdel=success");
    } catch (PDOException $error) {
        die("Query failed: " . $error->getMessage());
    }
} else{
    header("Location: ../page/dashboard.php");
    die();
}