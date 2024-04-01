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


function is_specialty_null(string $user_role, string $doctor_specialty)
{
    if ($user_role === "doctor" && $doctor_specialty === "NULL") {
        return true;
    } else {
        return false;
    }
}

function edit_user(object $pdo, int $id, string $fullname, string $email, string $phone,  string $dob, string $gender, string $user_role, string $doctor_specialty){
    edit_user_query($pdo, $id, $fullname, $email, $phone, $dob, $gender, $user_role, $doctor_specialty);
}