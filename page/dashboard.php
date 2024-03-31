<?php
include_once "../includes/config_session.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <main>
    </main>
    <?php
    if (isset($_SESSION["user_id"]) && $_SESSION["user_role"] === "admin") {
        include_once "../components/dashboard_admin.php";
    } else if (isset($_SESSION["user_id"]) && $_SESSION["user_role"] === "user") {
        include_once "../components/dashboard_user.php";
    } else if (isset($_SESSION["user_id"]) && $_SESSION["user_role"] === "doctor") {
        include_once "../components/dashboard_doctor.php";
    } else if (isset($_SESSION["user_id"]) && $_SESSION["user_role"] === "clerk") {
        include_once "../components/dashboard_clerk.php";
    } else {
        header("Location: ./login.php");
    }
    ?>
</body>

</html>