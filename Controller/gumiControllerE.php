<?php
session_start();

if($_SESSION["logged_user"]) {
    if (isset ($_POST["add_in_cart"])) {
        if(($_POST["hidden_quantity"])>0) {
            $name_brand = htmlentities($_POST["hidden_tire"]);
            $season = htmlentities($_POST["hidden_season"]);
            $size = htmlentities($_POST["hidden_size"]);
            $price = htmlentities($_POST["hidden_price"]);
            $db_quantity = htmlentities($_POST["hidden_quantity"]);
            $quantity = 1;
            $new_product = array(
                "name_brand" => $name_brand,
                "season" => $season,
                "size" => $size,
                "quantity" => $quantity,
                "price" => $price);

            if ($db_quantity==0){
                require_once "../Model/tireDao.php";

            }

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

            require_once "../Model/tireDao.php";
            buyTire($_POST["hidden_tire"]);
            header("Location:../View/cartE.php");
        }else{
            header("Location:../Controller/indexControllerE.php?page=outOfStockE");
        }
    }
    else{
        header ("location:../Controller/indexControllerE.php?page=outOfStockE");
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
    require_once "../Model/tireDao.php";
    returnTire($deleted_pr_name);
    header("Location:../View/cartE.php");
}

if(isset($_POST["buy"])){
    header ("location: ../Controller/indexControllerE.php?page=finalOrderE");
}

if(isset($_POST["finalOrder"])) {
    $email = $_SESSION["logged_user"];

    foreach ($_SESSION["cart"] as $product) {
        $name_brand = $product["name_brand"];
        $season = $product["season"];
        $size = $product["size"];
        $quantity = $product["quantity"];
        $price = $product["price"]*$quantity;
        $time = time();

        require_once "../Model/tireDao.php";
        insertInCart ($email, $name_brand, $season, $size, $quantity, $price, $time);

        unset($_SESSION["cart"][$name_brand]);

    }
    header("Location:../Controller/indexControllerE.php?page=successOrderE");
}
