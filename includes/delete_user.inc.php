<?php
require_once "./config_session.inc.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pwd = $_POST["pwd"];
    try{
        require_once "./db.inc.php";
        require_once "./mvc_delete_account/delete_account_model.inc.php";
        require_once "./mvc_delete_account/delete_account_contr.inc.php";

        $errors = [];
        if ($_SESSION["user_id"] == $_SESSION["sel_user_id"]) {
            $errors["cannot_delete"] = "You cannot delete yourself here, please go to 'Account' from navbar.";
        }

        if(is_pwd_invalid($pwd, $_SESSION["pwd"])){
            $errors["login_incorrect"] = "Incorrect login info.";
        }


        if ($errors) {
            $_SESSION["errors_delete_account"] = $errors;

            header("Location: ../page/view_all_users.php");
            die();
        }

        delete_account($pdo, $_SESSION["sel_user_id"]);

        header("Location: ../page/view_all_users.php?usrdel=success");
    } catch (PDOException $error) {
        die("Query failed: " . $error->getMessage());
    }
} else{
    header("Location: ../page/dashboard.php");
    die();
}