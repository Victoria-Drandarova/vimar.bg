<?php


session_start();
require_once "../Model/userDao.php";

if(isset($_POST["register"])) {
    $error = false;
    $user = array();
    $email = htmlentities($_POST["email"]);
    $username = htmlentities($_POST["username"]);
    $password = htmlentities($_POST["password1"]);  //две пароли ли ще имаме при регистрация??

    if (empty($email) || empty($username) || empty($password)) {
        $error = "All fields must be filled";
    }
    if (mb_strlen($username) < 2){
        $error = "Min length for user  name  is  2 chars!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid  Email!";
    }
    if (isset($error) && $error) { // $error e от  if (isset($_POST["register"]) този иф, ако е сетната и е true да изпишем ГРЕШКА
        echo "<h1>$error</h1>";    //и да си остане пак на регистър, докато се регистрира правилно
        //require_once "../View/register.html";
    }
    try {
        if (registerUser($username, $email, sha1($password))) {
            header("Location: ../Controller/indexControllerE.php?page=loginE");
        } else {
            require_once "../View/registerFailE.html";
        }
    }
    catch (PDOException $e){
        require_once "../View/errorE.html";
        print_r($e);
    }
}