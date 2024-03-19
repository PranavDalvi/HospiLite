<?php
declare(strict_types=1);

function updatePwd(object $pdo, int $id, string $pwd){
    $query = "UPDATE users SET pwd = :pwd WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $options = ["cost" => 12];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":pwd", $hashedPwd);


}