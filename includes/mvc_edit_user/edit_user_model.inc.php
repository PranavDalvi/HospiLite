<?php
declare(strict_types=1);

function update_user(object $pdo, int $id, string $fullname, string $email, string $phone,  string $dob, string $gender, string $user_role){
    $query = "UPDATE users SET fullname = :fullname, email = :email, phone = :phone, dob = :dob, gender = :gender, user_role = :user_role WHERE id = :id;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":fullname", $fullname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":dob", $dob);
    $stmt->bindParam(":gender", $gender);
    $stmt->bindParam(":user_role", $user_role);

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