<?php
session_start();
$email = trim($_SESSION["logged_user"]);

function getOrders($email){
    require_once "../Model/dbmanager.php";
    $statement = $pdo->prepare("SELECT username FROM users WHERE  email = ? ");
    $statement->execute(array(trim($email)));
    $data = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;

    }
    echo json_encode($data);
}


getOrders($email);