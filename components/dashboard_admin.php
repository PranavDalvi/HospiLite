<?php
include_once "../components/navbar/navbar_admin.php";
require_once "../includes/config_session.inc.php";


if (empty($_SESSION) || !isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "admin") {
    header("Location: ../page/login.php");
}
?>
<main>
    <h1>HospiLite - Admin Dashboard</h1>
    <?php echo '<h2> Welcome  ' . $_SESSION["user_name"] . '</h2>'; ?>
</main>