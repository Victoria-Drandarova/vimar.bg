<?php
session_start();
require_once "../Model/userDao.php";
require_once "../View/headerE.html";


if(isset($_POST["login"])){

    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["password"]);
    try {
        if (loginUser ($email, sha1($password))) {
            $_SESSION["logged_user"] = $email;
            require_once "../View/nav_loggedE.html";
            require_once "../View/mainE.html";
        } else {
            require_once "../View/loginFailedE.html";
        }
    }
    catch (PDOException $e){
        require_once "../View/errorE.html";
    }
}

require_once "../View/footer.html";
