<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/mvc_update_contact/update_contact_view.inc.php";
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
                <h1>Update Contact Details</h1>
                <form action="../includes/update_contact.inc.php" method="post">
                    <div class="text_field">
                        <?php
                        echo '<input type="text" name="email" value=' . $_SESSION["email"] . ' required>';
                        ?>
                        <span></span>
                        <label>E-mail</label>
                    </div>
                    <div class="text_field">
                        <?php
                        echo '<input type="text" name="phone" value=' . $_SESSION["phone"] . ' required>';
                        ?>
                        <span></span>
                        <label>Phone</label>
                    </div>
                    <div class="text_field">
                        <input type="password" name="pwd" required>
                        <span></span>
                        <label>Password</label>
                    </div>
                    <button class="submit-btn">Update Contact Details</button>
                </form>
                <?php
                check_update_contact_errors();
                ?>
            </div>
        </div>
    </main>
</body>

</html>