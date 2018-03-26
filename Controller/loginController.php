<?php
session_start();
require_once "../Model/userDao.php";
require_once "../View/header.html";


if(isset($_POST["login"])){

    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["password"]);
    try {
        if (loginUser ($email, sha1($password))) {
            $_SESSION["logged_user"] = $email;
            require_once "../View/nav_logged.html";
            require_once "../View/main.html";
        } else {
            require_once "../View/loginFailed.html";
        }
    }
    catch (PDOException $e){
        require_once "../View/error.html";
    }
}

require_once "../View/footer.html";
