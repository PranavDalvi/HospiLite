<?php
declare(strict_types=1);

function is_input_empty(string $email, string $phone, string $pwd){
    if(empty($email) || empty($phone) || empty($pwd)){
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