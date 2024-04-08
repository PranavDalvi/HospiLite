<?php
include_once "../includes/config_session.inc.php";
include_once "../includes/mvc_delete_account/delete_account_view.inc.php";
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
    <?php
    if (isset($_SESSION["user_id"]) && $_SESSION["user_role"] === "admin") {
        include_once "../components/navbar/navbar_admin.php";
    } else if (isset($_SESSION["user_id"]) && $_SESSION["user_role"] === "user") {
        include_once "../components/navbar/navbar_user.php";
    } else if (isset($_SESSION["user_id"]) && $_SESSION["user_role"] === "doctor") {
        include_once "../components/navbar/navbar_doctor.php";
    } else if (isset($_SESSION["user_id"]) && $_SESSION["user_role"] === "clerk") {
        include_once "../components/navbar/navbar_clerk.php";
    } else {
        header("Location: ./login.php");
    }
    ?>
    <main>
        <div class="reg-body">
            <div class="reg-container">
                <h1>Delete Account?</h1>
                <p>Once deleted, account cannot be restored. Please be carefull. All data will be deleted.</p>
                <p>Please enter your password to authenticate:</p>
                <form action="../includes/delete_account.inc.php" method="post">
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