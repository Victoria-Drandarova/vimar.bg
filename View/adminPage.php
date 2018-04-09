<?php
require_once "adminHeader.html"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../View/assets/searchMenu.css" rel="stylesheet">
    <link href="../View/menuservices.js" rel="stylesheet" type="text/css">
    <link href="../View/assets/menuservices.css" rel="stylesheet" type="text/css">
</head>

<body>
<nav id="head">
    <a href="../View/adminPage.php" class="or navbutton">ВСИЧКИ ГУМИ  </a>
    <a href="addTire.php" class="or navbutton">ДОБАВИ</a>
    <a href="../Controller/indexController.php?page=logout" class="or navbutton">ИЗХОД</a>
</nav>

<section class="tprod">

    <table class="products_table" border="1" style="width: 55%">
        <tr>
            <th>ID номер</th>
            <th>Марка</th>
            <th>Сезон</th>
            <th>Размер</th>
            <th>Наличност</th>
            <th>Цена BGN</th>
            <th>Промени</th>
            <th>Изтрий</th>

        </tr>
        <tbody id="data"></tbody>

    </table>

    <script>

        //xmlhttprequest
        //get -> gumicontroller
        //handle response - > json s gumi
        //for each guma in json
        //get table add row with columns with values from guma
        debugger;
        var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "../Model/dataTires.php";
        var asynchronous = true;
        ajax.open(method, url, asynchronous);
        ajax.send();
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                console.log(data);
                var html = "";
                for (var a = 0; a < data.length; a++) {
                    var id_tire = data[a].id_tires;
                    var name_brand = data[a].name_brand;
                    var season = data[a].season;
                    var size = data[a].size;
                    var quantity = data[a].quantity;
                    var price = data[a].price;

                    html += "<tr>";
                    html += "<td>" + id_tire + "</td>";
                    html += "<td>" + name_brand + "</td>";
                    html += "<td>" + season + "</td>";
                    html += "<td>" + size + "</td>";
                    html += "<td>" + quantity + "</td>";
                    html += "<td>" + price + "</td>";
                    html += "<td>" + "" +
                        "<form action='../View/changeTireData.php' method='post'>" +
                        "<input type='hidden' name='hidden_id' value=' " +id_tire+  " '  >" +
                        "<input type='hidden' name='hidden_tire' value=' " +name_brand+  " '  >" +
                        "<input type='hidden' name='hidden_season' value=' " +season+  " '  > " +
                        "<input type='hidden' name='hidden_size' value=' " +size+  " '  >" +
                        "<input type='hidden' name='hidden_quantity' value=' " +quantity+  " '  >" +
                        "<input type='hidden' name='hidden_price' value=' " +price+  " '  >" +

                        "<input style='color: goldenrod' type='submit'  " +
                        "name='makeChanges' value='Направи промяна'>" +
                        "</form>" + "</td>";

                    html += "<td>" + "" +
                        "<form action='../Controller/gumiController.php' method='post'>" +
                        "<input type='hidden' name='hidden_id' value=' " +id_tire+  " '  >" +
                        "<input type='hidden' name='hidden_tire' value=' " +name_brand+  " '  >" +
                        "<input type='hidden' name='hidden_season' value=' " +season+  " '  > " +
                        "<input type='hidden' name='hidden_size' value=' " +size+  " '  >" +
                        "<input type='hidden' name='hidden_quantity' value=' " +quantity+  " '  >" +
                        "<input type='hidden' name='hidden_price' value=' " +price+  " '  >" +

                        "<input style='color: goldenrod' type='submit'  " +
                        "name='adminDelete' value='Изртий'>" +
                        "</form>" + "</td>";



                    html += "</tr>";
                }
                document.getElementById("data").innerHTML = html;
            }

        }

    </script>

</section>

</body>
</html>

<?php
require_once "footer.html"
?>