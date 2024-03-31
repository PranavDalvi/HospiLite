<?php 
declare(strict_types=1);

function check_acc_del_errors(){
    if(isset($_SESSION["errors_delete_account"])){
        $errors = $_SESSION["errors_delete_account"];

        foreach ($errors as $error){
            echo "<br>";
            echo '<div class="error-body">';
            echo '<p class="error-text">ERROR: ' . $error . '</p>';
            echo '</div>';
        }
        unset($_SESSION["errors_delete_account"]);
    }
}