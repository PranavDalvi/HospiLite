<?php

include_once "../components/navbar/navbar_admin.php";
require_once "../includes/config_session.inc.php";
require_once "../includes/db.inc.php";


if (isset($_GET['id']) && !empty($_SESSION) && $_SESSION["user_role"] == "admin") {
    $user_id = $_GET['id'];
    $_SESSION["sel_user_id"] = $user_id;
} else {
    header("Location: ./login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HospiLite</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/modal_window.css">
    <link rel="stylesheet" href="../css/login_register.css">

</head>

<body>
    <main>
        <div class="reg-body">
            <div class="reg-container">
                <h1>Delete User Account?</h1>
                <p>Please be careful once deleted, account cannot be restored.</p>
                <p>Please enter your password to authenticate:</p>
                <form action="../includes/delete_user.inc.php" method="post">
                    <div class="text_field">
                        <input type="password" name="pwd" required>
                        <span></span>
                        <label>Password</label>
                    </div>
                    <button class="btn-red">Delete Account</button>
                </form>
                <?php
                check_acc_del_errors();
                ?>
            </div>
        </div>
    </main>
</body>

</html>