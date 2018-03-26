<?php

$pdo = null;


const DB_NAME = "projectvm";
const DB_IP = "127.0.0.1";
const DB_PORT = "3306";
const DB_USER = "root";
const DB_PASS = "";

try {
    $pdo = new PDO("mysql:host=" . DB_IP . ":" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

}
catch (PDOException $e){
    echo "Problem with db query  - " . $e->getMessage();
}


$statement = $pdo->prepare("SELECT *  FROM tires WHERE  season='Winter'");
$statement->execute();
$fetch = array();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;

}
echo json_encode($data);



