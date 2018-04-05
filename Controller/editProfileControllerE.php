<?php
session_start();
require_once "../Model/userDao.php";

$email= $_SESSION["logged_user"];

try{
    $function_result = getLoggedUserFromDB($email);
    $_SESSION["id_user"] = $function_result["id_user"];
    print_r (json_encode($function_result)); // този принт праща резултата от функцията към profile.html

}
catch(PDOException $e){
    require_once "../View/errorE.html";
    print_r($e); //за лична употреба; да се изртие,ако трябва
}


