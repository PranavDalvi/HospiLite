<?php

declare(strict_types=1);

function get_user_roles(object $pdo){
    $query = 'SELECT user_role FROM users WHERE user_role = "admin";';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
    return $rowCount;
}

function delete_account(object $pdo, int $id){
    $query = "DELETE FROM users WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}