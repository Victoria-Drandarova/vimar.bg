<?php
session_start();

if($_SESSION["logged_user"]) {
    if (isset ($_POST["add_in_cart"])) {
        $name_brand = htmlentities($_POST["hidden_tire"]);
        $season = htmlentities($_POST["hidden_season"]);
        $size = htmlentities($_POST["hidden_size"]);
        $price = htmlentities($_POST["hidden_price"]);
        $quantity = 1;
        $new_product = array(
            "name_brand"=>$name_brand,
            "season" => $season,
            "size" => $size,
            "quantity" => $quantity,
            "price" => $price);



       if(!empty($_SESSION["cart"])){ //if not empty
           //if the product exist, increase the quantity
           if(isset($_SESSION["cart"][$name_brand]) == $name_brand){
               $_SESSION["cart"][$name_brand]["quantity"]++;
           } else{
               //if the product is new, add it in cart
               $_SESSION["cart"][$name_brand] = $new_product;
           }
       }else{
           $_SESSION["cart"]=array();
           $_SESSION["cart"][$name_brand] = $new_product;
       }

        require_once "../Model/userDao.php";
        buyTire($_POST["hidden_tire"]);
      header("Location:../View/cart.php");
    }
}
else{
    header("location: ../Controller/indexController.php?page=buyFailed");
}

if(isset($_POST["delete"])) {
    $deleted_pr_name = htmlentities($_POST["name_tire"]);
    if (isset($_SESSION["cart"][$deleted_pr_name])) {
        $product_data = &$_SESSION["cart"][$deleted_pr_name];
        if ($product_data["quantity"] > 1) {
            $product_data["quantity"]--;
        } else {
            unset($_SESSION["cart"][$deleted_pr_name]);
        }
    }
    header("Location:../View/cart.php");
}









if(isset($_POST["buy"])){
    header ("location: ../Controller/indexController.php?page=finalOrder");
}
