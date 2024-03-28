<?php
include_once "../components/navbar_admin.php";
require_once "../includes/config_session.inc.php";


if (empty($_SESSION) || !isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "admin") {
    header("Location: ./login.php");
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
    <link rel="stylesheet" href="../css/login_register.css">
</head>

<body>
    <main>
        <h2>HospiLite - View All Users</h2>
        <div>
            <form action="./add_user.php">
                <button class="btn-submit">Add User</button>
            </form>
        </div>
    </main>
</body>

</html>