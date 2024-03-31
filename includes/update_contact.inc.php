<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pwd = $_POST["pwd"];

    try {
        require_once "./db.inc.php";
        require_once "./mvc_update_contact/update_contact_model.inc.php";
        require_once "./mvc_update_contact/update_contact_contr.inc.php";
        require_once "./config_session.inc.php";

        $errors = [];
        if (is_input_empty($email, $phone, $pwd)) {
            $errors["empty_input"] = "Please fill out all fields.";
        }

        if(is_pwd_invalid($pwd, $_SESSION["pwd"])){
            $errors["login_incorrect"] = "Incorrect login info.";
        }

        if ($errors) {
            $_SESSION["update_contact_errors"] = $errors;

            header("Location: ../page/update_contact.php");
            die();
        }

        updateContact($pdo, $_SESSION["user_id"], $email, $phone);
        $result = get_user_by_id($pdo, $_SESSION["user_id"]);

        $_SESSION["email"] = htmlspecialchars($result["email"]);
        $_SESSION["phone"] = htmlspecialchars($result["phone"]);



        header("Location: ../page/account_settings.php?conup=success");
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
