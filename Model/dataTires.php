<?php

require_once "dbmanager.php";

$statement = $pdo->prepare("SELECT *  FROM tires");
    $statement->execute();
    $fetch = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;

    }
    echo json_encode($data);
