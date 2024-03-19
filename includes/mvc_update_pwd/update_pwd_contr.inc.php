<?php
declare(strict_types=1);

function is_input_empty(string $old_pwd, string $new_pwd, string $c_pwd){
    if(empty($old_pwd) || empty($new_pwd) || empty($c_pwd)){
        return true;
    } else {
        return false;
    }
}

function is_password_match(string $pwd, string $cpwd){
    if($pwd === $cpwd){
        return true;
    } else {
        return false;
    }
}

function is_pwd_invalid(string $pwd, string $hashedPwd){
    if (!password_verify($pwd, $hashedPwd)) {
        return true;
    } else {
        return false;
    }
}