<?php
declare(strict_types=1);

function get_email(object $pdo, string $email){
    $query = "SELECT id, email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_phone(object $pdo, string $phone){
    $query = "SELECT id, phone FROM users WHERE phone = :phone;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":phone",$phone);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function edit_user_query(object $pdo, int $id, string $fullname, string $email, string $phone,  string $dob, string $gender, string $user_role, string $doctor_specialty){
    $query = "UPDATE users SET fullname = :fullname, email = :email, phone = :phone, dob = :dob, gender = :gender, user_role = :user_role, doctor_specialties = :doctor_specialties  WHERE id = :id;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":fullname", $fullname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":dob", $dob);
    $stmt->bindParam(":gender", $gender);
    $stmt->bindParam(":user_role", $user_role);
    $stmt->bindParam(":doctor_specialties", $doctor_specialty);

    $stmt->execute();
}

function get_user_by_id(object $pdo, int $id){
    $query = "SELECT * FROM users WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}