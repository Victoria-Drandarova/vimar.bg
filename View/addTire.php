<?php
require_once "adminHeader.html";
$error = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<nav id="head">
    <a href="../View/adminPage.php" class="or navbutton">ВСИЧКИ ГУМИ  </a>
    <a href="addTire.php" class="or navbutton">ДОБАВИ</a>
    <a href="../Controller/indexController.php?page=logout" class="or navbutton">ИЗХОД</a>
</nav>
<h1><?= $error ?></h1>
<div class="profitable">

    <fieldset class="profitable">
        <legend><h2>Продукт</h2></legend>
        <br><br>
        <table>
            <form action="../Controller/gumiController.php" method="post">
                <tr>
                    <td>Марка: </td>  <td><input type="text" size="28" name="nameBrand" required></td>
                </tr>
                <tr>
                    <td>Сезон: </td>  <td><input type="text" size="28" name="season" required></td>
                </tr>
                <tr>
                    <td>Размер:</td> <td> <input type="text" size="28" name="size" required></td>
                </tr>
                <tr>
                    <td>Количество: </td>  <td><input type="number" size="3" name="quantity" required></td>
                </tr>
                <tr>
                    <td>Цена: </td>  <td><input type="text" size="28" name="price" required></td>
                </tr>

                <td> <input type="submit" name="addTireInDB" value="Добави"></td>

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