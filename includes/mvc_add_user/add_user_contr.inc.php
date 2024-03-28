<?php

declare(strict_types=1);

function is_input_empty(string $fullname, string $email, string $phone,  string $dob, string $gender, string $pwd, string $cpwd, string $user_role)
{
    if (empty($fullname) || empty($email) || empty($phone) || empty($dob) || empty($gender) || empty($pwd) || empty($cpwd) || empty($user_role)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}

function is_phone_invalid(string $phone){
    if(!preg_match('/^[0-9]{10}+$/', $phone)){
        return true;
    }else{
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

function is_email_registered(object $pdo, string $email){
    if (get_email($pdo, $email)){
        return true;
    } else {
        return false;
    }
}

function is_phone_registered(object $pdo, string $phone){
    if(get_phone($pdo, $phone)){
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $fullname, string $email, string $phone,  string $dob, string $gender, string $cpwd, string $user_role){
    set_User($pdo, $fullname, $email, $phone, $dob, $gender, $cpwd, $user_role);
}