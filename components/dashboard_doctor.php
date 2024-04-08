<?php
include_once "../components/navbar/navbar_doctor.php";
require_once "../includes/config_session.inc.php";

if (empty($_SESSION) || !isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "doctor") {
    header("Location: ../page/login.php");
}
?>

<main>
    <h1>HospiLite - Doctor Dashboard</h1>
    <?php echo '<h2> Welcome  ' . $_SESSION["user_name"] . '</h2>'; ?>
</main>