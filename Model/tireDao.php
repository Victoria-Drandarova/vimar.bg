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

function exitTire($deleted_pr_name){
    $quantity = $_SESSION['cart'][$deleted_pr_name]['quantity'];
    require_once "../Model/dbmanager.php";
    $statement = $pdo->prepare("UPDATE `projectvm`.`tires` SET quantity = quantity + $quantity WHERE `name_brand`= ? ");
    $statement->execute(array(trim($deleted_pr_name)));
}

function insertInCart ($email, $name_brand, $season, $size, $quantity, $price){
    require_once "../Model/dbmanager.php";
    $statement = $pdo->prepare("INSERT INTO orders (user_email, name_brand, season, size, quantity, price, time)        
                                VALUES (?,?,?,?,?,?,NOW())");

    if ($statement->execute(array($email, $name_brand, $season, $size, $quantity, $price))) {
        return true;
    } else {
        return false;
    }
}

function saveTireInDB ($nameBrand, $season, $size, $quantity, $price, $id){
    require_once "../Model/dbmanager.php";
    $statement = $pdo->prepare("UPDATE tires SET name_brand = ?, season = ?, size = ?, quantity = ?, price = ?   WHERE id_tires = ?");

    if ($statement->execute(array($nameBrand, $season, $size, $quantity, $price, $id))) {
        return true;
    } else {
        return false;
    }
}

function deleteTireFromDB($id){
    require_once "../Model/dbmanager.php";
    $statement = $pdo->prepare("DELETE FROM tires WHERE id_tires = ?");
    $statement->execute(array(trim($id)));
}

function addTireInDB($nameBrand, $season, $size, $quantity, $price){
    require_once "../Model/dbmanager.php";
    $statement = $pdo->prepare("INSERT INTO tires (name_brand, season, size, quantity, price)  
                                VALUES(?, ?, ?, ?, ?)");
    $statement->execute(array($nameBrand, $season, $size, $quantity, $price));
}
