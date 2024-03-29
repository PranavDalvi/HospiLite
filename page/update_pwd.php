<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/mvc_update_pwd/update_pwd_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/login_register.css">
</head>

<body>
    <?php
    if (isset($_SESSION["user_id"]) && $_SESSION["user_role"] === "admin") {
        include_once "../components/navbar_admin.php";
    } else if (isset($_SESSION["user_id"]) && $_SESSION["user_role"] === "user") {
        include_once "../components/navbar_admin.php";
    } else if (isset($_SESSION["user_id"]) && $_SESSION["user_role"] === "doctor") {
        include_once "../components/navbar_admin.php";
    } else if (isset($_SESSION["user_id"]) && $_SESSION["user_role"] === "clerk") {
        include_once "../components/navbar_admin.php";
    } else {
        header("Location: ./login.php");
    }
    ?>
    <main>
        <div class="reg-body">
            <div class="reg-container">
                <h1>Update Password</h1>
                <form action="../includes/update_pwd.inc.php" method="post">
                    <div class="text_field">
                        <input type="password" name="old_pwd" required>
                        <span></span>
                        <label>Old Password</label>
                    </div>
                    <div class="text_field">
                        <input type="password" name="new_pwd" required>
                        <span></span>
                        <label>New Password</label>
                    </div>
                    <div class="text_field">
                        <input type="password" name="c_pwd" required>
                        <span></span>
                        <label>Confirm Password</label>
                    </div>
                    <button class="submit-btn">Update Password</button>
                </form>
                <?php
                check_update_pwd_errors();
                ?>
            </div>
        </div>
    </main>
</body>

</html>