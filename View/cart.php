<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
require_once "header.html";
require_once "../View/nav_logged.html";

if(empty($_SESSION["cart"])){?>
    <link href="../View/assets/style.css" rel="stylesheet" type="text/css">

    <h1><i>Количката Ви е празна!</i></h1>
<?php
//    echo "Количката Ви е празна!";
    require_once "../View/footer.html";
    die();
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
<link href="../View/assets/new.css" rel="stylesheet" type="text/css">
<link href="../View/assets/style.css" rel="stylesheet" type="text/css">
<section class="tprod" style="margin-left: 28%; width: 100%">
    <h2 id="user"><i>
            <script src="hello.js"></script>
        </i></h2>
    <form action="../Controller/gumiController.php" method="post">
<table class="products_table" border="1">
    <tr>
        <th>Марка</th>
        <th>Сезон</th>
        <th>Размер</th>
        <th>Количество</th>
        <th>Цена</th>

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
                    <form action="../Controller/gumiController.php" method="post">
                        <input type="hidden" name="name_tire" value="<?= $product_in_cart["name_brand"] ?>">
                        <input style="color: goldenrod" type="submit" name="delete" value="Откажи"></form>
                </td>
            </tr>

            <?php

    }
            ?>
    <tr>
        <td colspan="5"> <h3>Общо за плащане: <?php
            $total=0;
            foreach($_SESSION["cart"] as $product_in_cart){
                $total += $product_in_cart["price"]*$product_in_cart["quantity"];
            }
            echo $total;
            ?>BGN</h3></td>
        <td colspan="1"><input style="color: goldenrod; width: 100%" type="submit" name="buy" value="Купи"></td>
    </tr>
</table>
    </form>

</section>


</body>
</html>
<?php
require_once "../View/footer.html";
?>
