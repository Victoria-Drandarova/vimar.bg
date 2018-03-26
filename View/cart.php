<?php
session_start();
if(isset($_POST["add_in_cart"])) {
    $name_brand = $_POST["hidden_tire"];
    $season = $_POST["hidden_season"];
    $size = $_POST["hidden_size"];
    $quantity = 1;
    $price = $_POST["hidden_price"];

    $cart=array();
    $cart = $_SESSION["cart"];
    $product = array();
    $product = ["name_brand"=> $name_brand, "season"=>$season, "size"=>$size, "quantity"=>$quantity, "price"=>$price];
//    foreach ($cart as $products){
//        foreach ($products as $product){
//            if($product["name_brand"]==$name_brand){
//                $product["quantity"]++;
//            }else
//            {
////                $products[] = $product;
////                var_dump($products);
////                $cart[] = &$products;
////                $_SESSION["cart"] = $cart;
////                var_dump($cart);
//            }
//        }
//    }
//    $products[] = $product;
//    var_dump($products);
//    $cart[] = &$products;
    $cart[]= $product;
    $_SESSION["cart"] = $cart;
//    var_dump($cart);


//    $cart=$_SESSION["cart"];
//    $_SESSION["name_brand"] = $_POST["hidden_tire"];
//    $_SESSION["season"] = $_POST["hidden_season"];
//    $_SESSION["size"] = $_POST["hidden_size"];
//    $_SESSION["price"] = $_POST["hidden_price"];
//    $cart=$_SESSION["name_brand"];
//    $cart=$_SESSION["season"];
//    $cart=$_SESSION["size"];
//    $cart=$_SESSION["price"];



}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="../View/assets/style.css">
</head>
<body>
<table border="1">
    <tr>
        <th>Марка</th>
        <th>Сезон</th>
        <th>Размер</th>
        <th>Количество</th>
        <th>Цена</th>
        <th>Купи</th>
        <th>Откажи</th>
    </tr>
    <?php
    foreach ($_SESSION["cart"] as $product_in_cart) {
            ?>
            <tr>
                <td><?= $product_in_cart["name_brand"] ?></td>
                <td><?= $product_in_cart["season"] ?></td>
                <td><?= $product_in_cart["size"] ?></td>
                <td><?= $product_in_cart["quantity"] ?></td>
                <td><?= $product_in_cart["price"] ?></td>
                <td>
                    <form action="../Controller/gumiController.php" method="post"><input type="submit" name="buy"
                                                                                         value="Купи"></form>
                </td>
                <td>
                    <form action="../Controller/gumiController.php" method="post"><input type="submit" name="delete"
                                                                                         value="Откажи"></form>
                </td>
            </tr>
            <?php

    }
            ?>
</table>
</body>
</html>
