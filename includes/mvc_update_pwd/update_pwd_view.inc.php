<?php

declare(strict_types=1);

function check_update_pwd_errors()
{
    if (isset($_SESSION["update_pwd"])) {
        $errors = $_SESSION["update_pwd"];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<br>";
            echo '<div class="error-body">';
            echo '<p class="error-text">ERROR: ' . $error . '</p>';
            echo '</div>';
        }
        unset($_SESSION["update_pwd"]);
    }
}
