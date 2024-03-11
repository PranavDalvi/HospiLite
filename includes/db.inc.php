<?php

$dsn = "mysql:host=localhost; dbname=hospilitedb";
$dbusername = "root";
$dbpassword = "";

try{
    $pdo = new PDO($dns, $dbusername, $dbpassword);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error){
    echo "Connection Failed: ". $error->getMessage();
}