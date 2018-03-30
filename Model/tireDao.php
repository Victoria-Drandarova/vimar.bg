<?php

function buyTire($tire1){
    require_once "../Model/dbmanager.php";
    $statement = $pdo->prepare("UPDATE `projectvm`.`tires` SET quantity=quantity-1  WHERE `name_brand`= ?");
    $statement->execute(array(trim($tire1)));
}

function returnTire($deleted_pr_name){
    require_once "../Model/dbmanager.php";
    $statement = $pdo->prepare("UPDATE `projectvm`.`tires` SET quantity=quantity+1  WHERE `name_brand`= ?");
    $statement->execute(array(trim($deleted_pr_name)));
}

//function deleteRow($name_brand){
//    require_once "../Model/dbmanager.php";
//    $statement = $pdo->prepare("DELETE FROM `projectvm`.`tires` WHERE `name_brand`= ?");
//    $statement->execute(array(trim($name_brand)));
//}

