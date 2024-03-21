<?php

declare(strict_types=1);

function check_update_contact_errors()
{
    if (isset($_SESSION["update_contact_errors"])) {
        $errors = $_SESSION["update_contact_errors"];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<br>";
            echo '<div class="error-body">';
            echo '<p class="error-text">ERROR: ' . $error . '</p>';
            echo '</div>';
        }
        unset($_SESSION["update_contact_errors"]);
    }
}
