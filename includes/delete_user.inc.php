<?php
require_once "./config_session.inc.php";


if (isset($_GET['id']) && !empty($_SESSION) && $_SESSION["user_role"] == "admin"){
    $user_id = $_GET['id'];
    try{
        require_once "./db.inc.php";
        require_once "./mvc_delete_account/delete_account_model.inc.php";
        require_once "./mvc_delete_account/delete_account_contr.inc.php";

        $errors = [];
        if ($_SESSION["user_id"] == $user_id) {
            $errors["cannot_delete"] = "You cannot delete yourself here, please go to 'Account' from navbar.";
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