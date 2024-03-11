<?php

declare(strict_types= 1);

function is_input_empty(string $fullname, string $email, int $phone,  DateTime $dob, string $gender, string $pwd, string $cpwd){
if (empty($fullname) || empty($email) || empty($phone) || empty($dob) || empty($gender) || empty($pwd) || empty($cpwd)){
    return true;
} else{
    return false;
}
}

