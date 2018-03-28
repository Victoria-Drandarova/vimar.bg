<?php
session_start();

if($_SESSION["logged_user"]) {
    if (isset ($_POST["add_in_cart"])) {
        $name_brand = $_POST["hidden_tire"];
        $season = $_POST["hidden_season"];
        $size = $_POST["hidden_size"];
        $price = $_POST["hidden_price"];
        $quantity = 1;

        $product = array();
        $product[]

        $_SESSION["cart"]=array();
        $_SESSION["cart"]["name_brand"] = array("season" => $season, "size" => $size, "quantity" => $quantity, "price" => $price);







        require_once "../Model/userDao.php";
        buyTire($_POST["hidden_tire"]);
      header("Location:../View/cart.php");

    }

}
else{

    header("location: ../Controller/indexController.php?page=buyFailed");


}

if(isset($_POST["delete"])){
    $deleted_pr_name = htmlentities($_POST["name_tire"]);}










if(isset($_POST["buy"])){
    header ("location: ../View/finalOrder.html");
}
