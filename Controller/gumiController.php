<?php
session_start();

if($_SESSION["logged_user"]) {
    if (isset ($_POST["add_in_cart"])) {
        require_once "../Model/userDao.php";
        buyTire($_POST["hidden_tire"]);
    }

}
else{

    header("location: ../Controller/indexController.php?page=buyFailed");


}
