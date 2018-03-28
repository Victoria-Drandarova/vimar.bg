<?php
session_start();

if($_SESSION["logged_user"]) {
    if (isset ($_POST["add_in_cart"])) {
        $name_brand = $_POST["hidden_tire"];
        $season = $_POST["hidden_season"];
        $size = $_POST["hidden_size"];
        $price = $_POST["hidden_price"];
        $quantity = 1;

        $cart=array();
        $product = array();
        $product = ["name_brand" => $name_brand, "season" => $season, "size" => $size, "quantity" => $quantity, "price" => $price];


        $cart = $_SESSION["cart"];



        $cart[]= $product;
        $_SESSION["cart"] = $cart;

        require_once "../Model/userDao.php";
        buyTire($_POST["hidden_tire"]);
      header("Location:../View/cart.php");

    }

}
else{

    header("location: ../Controller/indexController.php?page=buyFailed");


}
if(isset($_POST["delete"])){
    $deleted_pr_name = htmlentities($_POST["name_tire"]);

    foreach ($_SESSION["cart"] as $item){
    if(isset($item[$deleted_pr_name])) { //ne raboti

        $product_data = &$_SESSION["cart"][$item][$deleted_pr_name];
        unset($_SESSION["cart"][$item][$deleted_pr_name]);
    }
    }
  header("Location:../View/cart.php");

}

if(isset($_POST["buy"])){
    header ("location: ../View/finalOrder.html");
}
