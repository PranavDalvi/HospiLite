<?php

require_once "./config_session.inc.php";


if (!empty($_SESSION) || $_SESSION["user_role"] == "admin") {
    try{
        require_once "./db.inc.php";
        require_once "./mvc_view_all_users/view_all_users_model.inc.php";

        $result = viewUsers($pdo);

    } catch (PDOException $error) {
        die("Query failed: " . $error->getMessage());
    }
} else{
    header("Location: ../page/dashboard.php");
    die();
}