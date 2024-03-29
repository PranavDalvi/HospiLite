<?php

declare(strict_types=1);

function check_edit_user_errors()
{
    if (isset($_SESSION["errors_update_user"])) {
        $errors = $_SESSION["errors_update_user"];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<br>";
            echo '<div class="error-body">';
            echo '<p class="error-text">ERROR: ' . $error . '</p>';
            echo '</div>';
        }
        unset($_SESSION["errors_update_user"]);
    }
}
