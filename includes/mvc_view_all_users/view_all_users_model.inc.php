<?php
declare(strict_types=1);

function viewUsers(object $pdo){
    $query = "SELECT * FROM users;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}