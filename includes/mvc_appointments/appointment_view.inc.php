<?php
declare(strict_types=1);

function check_create_appointments_errors()
{
    if (isset($_SESSION["errors_appointment"])) {
        $errors = $_SESSION["errors_appointment"];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<br>";
            echo '<div class="error-body">';
            echo '<p class="error-text">ERROR: ' . $error . '</p>';
            echo '</div>';
        }
        unset($_SESSION["errors_appointment"]);
    } else if (isset($_GET["register"]) && $_GET["register"] === "success") {
        echo '<div class="success-body">';
        echo '<p class="success-text">Registered Successfully</p>';
        echo '</div>';
    }
}