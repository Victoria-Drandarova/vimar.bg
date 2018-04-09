<?php
session_start();
require_once "../View/header.html";
require_once "../Model/userDao.php";?>
<html><a href="../Controller/indexController.php?page=register">Назад</a> <br><br></html>

<?php
if (isset($_POST["register"])) {
    $errors = array();

    $user = array();
    $email = htmlentities($_POST["email"]);
    $username = htmlentities($_POST["username"]);
    $password_1 = htmlentities($_POST["password1"]);
    $password_2 = htmlentities($_POST["password2"]);//две пароли ли ще имаме при регистрация??

    if (empty($username)) {
        array_push($errors, "Липсва потребителско име!");
    }
    if (empty($email)) {
        array_push($errors, "Липсва email!");
    }
    if (empty($password_1)) {
        array_push($errors, "Липсва парола!");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "Паролите не съвпадат!");
    }
    if (mb_strlen($username) < 2) {
        array_push($errors, "Потребителското име може да бъде най-малко от две букви!");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Невалиден email!");
    }
    if (userExist($email) > 0) { //try catch
        array_push($errors, "Този email вече има регистрация.");
    }
    if (count($errors) == 0) {
        try {
            if (registerUser($username, $email, sha1($password_1))) {
                header("Location: ../Controller/indexController.php?page=login");
            } else {
                require_once "../View/registerFail.html";
            }
        } catch (PDOException $e) {
            require_once "../View/error.html";
            print_r($e);
        }
    } else {
        foreach ($errors as $error) {
            echo $error."<br>";
        }

    }
}
require_once "../View/footer.html";
