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
            // ako e admin da otiva na adminska stranica
            if(isAdmin($email)){
               // require_once "../View/nav_admin.html";
                header("location: ../View/adminPage.php");
            }else {
                //ako ne e admin da si e kakto do sega
                header("location: ../Controller/indexController.php?page=main");
            }
        } else {
            require_once "../View/loginFailed.html";
        }
    }
    catch (PDOException $e){
        require_once "../View/error.html";
    }
}

require_once "../View/footer.html";
