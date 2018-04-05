<?php
session_start();
require_once "../View/headerE.html";

if (isset($_GET["page"]) && $_GET["page"] == "logoutE") { //ако е натиснат някой линк и линкът log out, унищожи сесията

    if(!empty($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $product) {
            $deleted_pr_name = $product["name_brand"];
            $quantity = $product["quantity"];
            require_once "../Model/tireDao.php";
            exitTire($deleted_pr_name);
            unset($_SESSION["cart"][$deleted_pr_name]);
        }
    }

    session_destroy();
    header("location:../Controller/indexController.php?page=mainE"); //пренасочи потребителя към log in
    die();   // прекрати изпълнението на какъвто и да е следващ скрипт, защото няма смисъл да продължава след като се е логаутнал
}

if (isset($error) && $error) { // $error e от  if (isset($_POST["register"]) този иф, ако е сетната и е true да изпишем ГРЕШКА
    echo "<h1>$error</h1>";    //и да си остане пак на регистър, докато се регистрира правилно
    require_once "../View/registerE.html";
}
//    elseif (isset($_GET["page"])) {   //ако няма грешки при регистрация (!!дали идват само от там)
//        $page_name = $_GET["page"];     //променливата $page_name да има стойност цъкнатата страница
//
//        if (isset($_SESSION["user"])) { // ако има сесия за този потребител
//            $page_name = $_GET["page"]; //променливата $page_name да има стойност цъкнатата страница НЕ ЗНАМ ЗАЩО СЕ ПОВТАРЯ ПАК
//            require_once "$page_name.php"; // и да повикаме съдържанието на цъкнатата страница (ТОВА Е РАБОТАТА НА ФРОНТ КОНТРОЛЕРА)
//        }
//        elseif ($page_name == "register") {             //ако няма сесия, но доброволно си е цъкнал регистър
//            require_once "register.php";           // препрати го към регистър
//        }
//
//        else {                        //ако няма сесия и не е цъкнал регистър, трябва да се логне
//            require_once "login.php";// изпрати го на логин
//        }
//    }
//    else{
//       require_once "login.php";
//    }
if(isset($_GET["page"])){
    $page_name = $_GET["page"];
    if(isset($_SESSION["logged_user"])){
        require_once "../View/nav_loggedE.html";
        $page_name = $_GET["page"];
        require_once "../View/$page_name.html";
    }
    else{
        require_once "../View/nav_not_loggedE.html";
        $page_name = $_GET["page"];
        require_once "../View/$page_name.html";
    }
}else{
    require_once "../View/nav_not_loggedE.html";
    require_once "../View/indexE.html";
}
require_once "../View/footerE.html";
//if(isset($_GET["page"])){
//    if($_GET["page"]=="main"){
//        require_once "../View/footer.html";
//    }else{
//        require_once "../View/staticFooter.html";
//    }
//}else{
//    require_once "../View/footer.html";
//}
