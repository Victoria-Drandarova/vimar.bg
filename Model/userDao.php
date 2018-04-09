<?php
function loginUser($email, $password){
    require "../Model/dbmanager.php";
    $statement = $pdo->prepare("SELECT COUNT(*) as broi FROM users WHERE email = ? AND password = ?");
    $statement->execute(array($email, $password));
    $result = $statement->fetch();
    return $result["broi"] > 0;
}
function userExist($email){
    require "../Model/dbmanager.php";
    $statement = $pdo->prepare("SELECT COUNT(*) as broi FROM users WHERE email = ?");
    $statement->execute(array($email));
    $result = $statement->fetch();
    return $result["broi"];
}

function isAdmin($email){
    require "../Model/dbmanager.php";
    $pdo = null;
    try {
        $pdo = new PDO("mysql:host=" . DB_IP . ":" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    }
    catch (PDOException $e){
        echo "Problem with db query  - " . $e->getMessage();
    }

    $statement = $pdo->prepare("SELECT COUNT(*) as broi FROM users WHERE email = ? AND admin = '1' ");
    $statement->execute(array($email));
    $result = $statement->fetch();
    return $result["broi"] > 0;
}

function registerUser($username, $email, $password)
{
    require "../Model/dbmanager.php";
    $statement = $pdo->prepare("INSERT INTO users (username, password, email)         VALUES (?,?,?)");

    if ($statement->execute(array($username, $password, $email))) {
        return true;
    } else {
        return false;
    }
}
function getLoggedUserFromDB ($email) {
    require "../Model/dbmanager.php";
    $statement = $pdo->prepare("SELECT * FROM users WHERE email= ? ");
    $statement->execute(array($email));
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function saveProfile($username, $email, $password,$id_user){
    require "../Model/dbmanager.php";
    $statement = $pdo->prepare("UPDATE users SET username = ?, email = ?, password =? WHERE id_user = ?");

    if ($statement->execute(array($username, $email, $password, $id_user))) {
        return true;
    } else {
        return false;
    }
}


