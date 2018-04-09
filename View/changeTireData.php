<?php
require_once "adminHeader.html";

$id = $_POST["hidden_id"];
$nameBrand = $_POST["hidden_tire"];
$size  = $_POST["hidden_size"];
$season  = $_POST["hidden_season"];
$quantity  = $_POST["hidden_quantity"];
$price  = $_POST["hidden_price"];
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
<nav id="head">
    <a href="../View/adminPage.php" class="or navbutton">ВСИЧКИ ГУМИ  </a>
    <a href="addTire.php" class="or navbutton">ДОБАВИ</a>
    <a href="../Controller/indexController.php?page=logout" class="or navbutton">ИЗХОД</a>
</nav>
<div class="profitable">

    <fieldset class="profitable">
        <legend><h2>Продукт</h2></legend>
        <br><br>
        <table>
            <form action="../Controller/gumiController.php" method="post">
                <tr>
                   <td> ID номер: </td> <td><input type="text" size="28" name="id" value=" <?= $id ?>" readonly></td>
                </tr>
                <tr>
                    <td>Марка: </td>  <td><input type="text" size="28" name="nameBrand" value="<?= $nameBrand ?>" ></td>
                </tr>
                <tr>
                    <td>Сезон: </td>  <td><input type="text" size="28" name="season" value="<?= $season ?>"></td>
                </tr>
                <tr>
                    <td>Размер:</td> <td> <input type="text" size="28" name="size" value="<?= $size ?>"></td>
                </tr>
                <tr>
                    <td>Количество: </td>  <td><input type="text" size="28" name="quantity" value="<?= $quantity ?>"></td>
                </tr>
                <tr>
                    <td>Цена: </td>  <td><input type="text" size="28" name="price" value="<?= $price ?>"></td>
                </tr>

                <td> <input id="profilesubmit" type="submit" name="save_changes" value="Запази промените"></td>

            </form>
        </table>
    </fieldset>

    <br>
    <br>
</div>

</body>
</html>

<?php
require_once "footer.html"
?>