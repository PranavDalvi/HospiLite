<?php

declare(strict_types=1);

function get_email(object $pdo, string $email){
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_phone(object $pdo, string $phone){
    $query = "SELECT phone FROM users WHERE phone = :phone;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":phone",$phone);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $fullname, string $email, string $phone,  string $dob, string $gender, string $cpwd, string $user_role, string $doctor_specialty){
    $query = "INSERT INTO users (fullname, email, phone, dob, gender, pwd, user_role, doctor_specialties) VALUES (:fullname, :email, :phone, :dob, :gender, :pwd, :user_role, :doctor_specialty);";
    $stmt = $pdo->prepare($query);

    $options = ["cost" => 12];

    $hashedPwd = password_hash($cpwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":fullname", $fullname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":dob", $dob);
    $stmt->bindParam(":gender", $gender);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":user_role", $user_role);
    $stmt->bindParam(":doctor_specialty", $doctor_specialty);

    $stmt->execute();
}