<?php

declare(strict_types=1);

function output_fullname()
{
    if (isset($_SESSION["user_id"])) {
        echo "Hello " . $_SESSION["user_fullname"];
    } else {
        echo "Please login / register to continue";
    }
}

function check_login_errors()
{
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        foreach ($errors as $error) {
            echo "<br>";
            echo '<div class="error-body">';
            echo '<p class="error-text">ERROR: ' . $error . '</p>';
            echo '</div>';
        }
        unset($_SESSION["errors_login"]);
    } else if (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "<br>";
        echo "<p>Login success</p>";
    }
}
