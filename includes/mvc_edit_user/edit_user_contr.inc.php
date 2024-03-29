<?php

declare(strict_types=1);

function is_input_empty(string $fullname, string $email, string $phone,  string $dob, string $gender, string $user_role)
{
    if (empty($fullname) || empty($email) || empty($phone) || empty($dob) || empty($gender) ||  empty($user_role)) {
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


function is_email_registered(object $pdo, string $email, int $sel_user_id){
    $result = get_email($pdo, $email);
    if ($result && $sel_user_id !== $result["id"]){
        return true;
    } else {
        return false;
    }
}

function is_phone_registered(object $pdo, string $phone, int $sel_user_id){
    $result = get_phone($pdo, $phone);
    if($result && $sel_user_id !== $result["id"]){
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $fullname, string $email, string $phone,  string $dob, string $gender, string $cpwd){
    set_User($pdo, $fullname, $email, $phone, $dob, $gender, $cpwd);
}