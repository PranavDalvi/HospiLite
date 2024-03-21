<?php
declare(strict_types=1);

function updateContact(object $pdo, int $id, string $email, string $phone){
    $query = "UPDATE users SET email = :email, phone = :phone WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
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