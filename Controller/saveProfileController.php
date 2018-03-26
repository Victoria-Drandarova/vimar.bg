<?php
session_start();
$id_user = $_SESSION["id_user"];
require_once "../Model/userDao.php";

if(isset($_POST["save_profile"])){
    $error = false;
    $email = htmlentities($_POST["email"]);
    $username = htmlentities($_POST["username"]);
    $password = htmlentities($_POST["new_password"]);

    if (empty($email) || empty($username) || empty($password)) {
        $error = "All fields must be filled";
    }
    if (mb_strlen($username) < 2){
        $error = "Min length for user  name  is  2 chars!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid  Email!";
    }
    if(isset($error)){
        echo "<h1>$error</h1>";
    }

    try {
        saveProfile($username, $email, sha1($password), $id_user);
        header ("location: ../Controller/indexController.php?page=main");

    }
    catch (PDOException $e){
        require_once "../View/error.html";
        print_r($e);
    }
}