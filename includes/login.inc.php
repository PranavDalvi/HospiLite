<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    try{
        require_once "./db.inc.php";
        require_once "./mvc_login/login_model.inc.php";
        require_once "./mvc_login/login_contr.inc.php";

        $errors = [];

        if (is_input_empty($email, $pwd)){
            $errors["empty_input"] = "Please fill out all fields.";
        }

        $result = get_user($pdo, $email);
        
        if (is_email_invalid($result)){
            $errors["login_incorrect"] = "Incorrect login info.";
        }

        if(!is_email_invalid($result) && is_pwd_invalid($pwd, $result["pwd"])){
            $errors["login_incorrect"] = "Incorrect login info.";
        }

        require_once "./config_session.inc.php";

        if ($errors){
            $_SESSION["errors_login"] = $errors;

            header("Location: ../page/login.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_name"] = htmlspecialchars($result["fullname"]);
        $_SESSION["email"] = htmlspecialchars($result["email"]);
        $_SESSION["pwd"] = $result["pwd"];
        $_SESSION["phone"] = htmlspecialchars($result["phone"]);
        $_SESSION["dob"] = htmlspecialchars($result["dob"]);
        $_SESSION["gender"] = htmlspecialchars($result["gender"]);
        $_SESSION["user_role"] = $result["user_role"];


        $_SESSION["last_regeneration"] = time();

        header("Location: ../page/dashboard.php?login=success");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $error){
        die("Query failed: ". $error->getMessage());
    }
} else {
    header("Location: ../page/login.php");
    die();
}