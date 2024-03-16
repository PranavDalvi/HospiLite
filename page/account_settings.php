<?php
include_once "../includes/config_session.inc.php";
include_once "../includes/mvc_delete_account/delete_account_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/modal_window.css">
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
        <h2>HospiLite - Account Settings</h2>
        <div class="wrapper">
            <table>
                <caption>Your Details</caption>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>E-mail</th>
                        <th>Phone No.</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <?php echo '<td data-cell="Full Name">' . $_SESSION["user_name"] . '</td>' ?>
                        <?php echo '<td data-cell="E-mail">' . $_SESSION["email"] . '</td>' ?>
                        <?php echo '<td data-cell="Phone No.">' . $_SESSION["phone"] . '</td>' ?>
                        <?php echo '<td data-cell="Date of Birth">' . $_SESSION["dob"] . '</td>' ?>
                        <?php echo '<td data-cell="Gender">' . $_SESSION["gender"] . '</td>' ?>
                    </tr>
                    </tr>
                </tbody>
            </table>
            <div class="account-options">
                <form action="../includes/logout.inc.php" method="post">
                    <button>Logout</button>
                </form>
                <button>Update Details</button>
                <button class="btn-red show-modal">Delete Account</button>
            </div>
            <?php
            check_acc_del_errors();
            ?>
        </div>

    </main>
    <div class="modal hidden">
        <button class="close-modal">&times;</button>
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
    </div>
    <div class="overlay hidden"></div>

    <script src="../scripts/modal_window.js"></script>
</body>

</html>