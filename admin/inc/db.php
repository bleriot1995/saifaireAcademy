<?php
$db_name = 'mysql:host=localhost;dbname=saifaircours';
$user_name = 'root';
$user_password = '';

//$conn = new PDO($db_name, $user_name, $user_password);
try {
    $conn = new PDO($db_name, $user_name, $user_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
} catch (Exception $e) {
    //throw $th;
    die("Errer de connexion" . $e->getMessage());
}
