<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $pwd = $_POST["pwd"];
    $cpwd = $_POST["cpwd"];
    $user_role = $_POST["user_role"];

    try {
        require_once "./db.inc.php";
        require_once "./mvc_add_user/add_user_model.inc.php";
        require_once "./mvc_add_user/add_user_contr.inc.php";

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

        require_once "config_session.inc.php";
        
        if ($errors){
            $_SESSION["errors_add_user"] = $errors;

            $addUserData = [
                "fullname" => $fullname,
                "email" => $email,
                "phone" => $phone,
                "dob"=> $dob,
                "gender"=> $gender,
                "user_role"=>$user_role
            ];

            $_SESSION["add_user_data"] = $addUserData;

            header("Location: ../page/add_user.php");
            die();
        }

        create_user($pdo, $fullname, $email, $phone, $dob, $gender, $cpwd, $user_role);

        header("Location: ../page/add_user.php?addUser=success");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $error){
        die("Query failed: ".$error->getMessage());
    }
} else {
    header("Location: ../page/add_user.php");
    die();
}