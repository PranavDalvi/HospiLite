<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_pwd = $_POST["old_pwd"];
    $new_pwd = $_POST["new_pwd"];
    $c_pwd = $_POST["c_pwd"];

    try {
        require_once "./db.inc.php";
        require_once "./mvc_update_pwd/update_pwd_model.inc.php";
        require_once "./mvc_update_pwd/update_pwd_contr.inc.php";
        require_once "./config_session.inc.php";

        $errors = [];
        if (is_input_empty($old_pwd, $new_pwd, $c_pwd)) {
            $errors["empty_input"] = "Please fill out all fields.";
        }

        if(is_pwd_invalid($old_pwd, $_SESSION["pwd"])){
            $errors["login_incorrect"] = "Incorrect login info.";
        }

        if (!is_password_match($new_pwd, $c_pwd)) {
            $errors["pwd_not_match"] = "Password and Confirm Passwords does not match.";
        }

        if ($errors) {
            $_SESSION["update_pwd"] = $errors;

            header("Location: ../page/update_pwd.php");
            die();
        }

        updatePwd($pdo, $_SESSION["user_id"], $c_pwd);

        session_start();
        session_unset();
        session_destroy();

        header("Location: ../page/login.php?chpwd=success");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $error) {
        die("Query failed: " . $error->getMessage());
    }
} else {
    header("Location: ../page/account_settings.php");
    die();
}
