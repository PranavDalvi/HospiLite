<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pwd = $_POST["pwd"];
    try {
        require_once "./db.inc.php";
        require_once "./mvc_delete_account/delete_account_model.inc.php";
        require_once "./mvc_delete_account/delete_account_contr.inc.php";
        require_once "./config_session.inc.php";

        $errors = [];
        if ($_SESSION["user_role"] === "admin") {
            $rowCount = get_user_roles($pdo);

            if (is_only_one_admin_remaining($rowCount)) {
                $errors["one_admin_required"] = "At least one admin required to manage the HMS.";
            }
        }
        if(is_pwd_invalid($pwd, $_SESSION["pwd"])){
            $errors["login_incorrect"] = "Incorrect login info.";
        }


        if ($errors) {
            $_SESSION["errors_delete_account"] = $errors;

            header("Location: ../page/account_settings.php");
            die();
        }

        delete_account($pdo, $_SESSION["user_id"]);

        session_start();
        session_unset();
        session_destroy();

        header("Location: ../page/login.php?accdel=success");
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
