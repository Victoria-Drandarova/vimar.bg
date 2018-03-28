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
    $deleted_pr_name = $_POST["name_tire"];

    var_dump($deleted_pr_name);
    var_dump($_SESSION["cart"]);

    for ($i=0; $i<count($_SESSION["cart"]); $i++){
       echo "tova e guma: ";

        $guma = array();
        $guma = [$i];
        var_dump($guma);
        foreach ($guma as $value ){
            echo"tova e value:";
            var_dump($value) ;
            if($value == $deleted_pr_name){
                echo "tova,koeto iskame da unsetnem:".$_SESSION["cart"][$i];
                unset($_SESSION["cart"][$i]);

                echo "sesia sled unset: ";
                var_dump($_SESSION["cart"]);
            }
        }
    }

//    echo $deleted_pr_name . "ime na produkta ot delete";
//    $max = count($_SESSION["cart"]);
//    echo $max . " tova e max";
//    for ($i = 0; $i < $max; $i++) {
//        var_dump($i);
//
//        if (($i["name_brand"]) == $deleted_pr_name) {
//            echo $i["name_brand"] . "ime na produkta ot sesiqta, veroqtno"; //ne raboti
//            unset($_SESSION["cart"][$i]);
//
//            echo "!!!!!!";
//            var_dump($_SESSION["cart"]);
//            echo "tova e sesiqta sled unset";
//        }
//        //header("Location:../View/cart.php");
//
//
//    }
}
