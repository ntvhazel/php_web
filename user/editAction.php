<?php
require_once("./connect.php");
$err = array();

if (isset($_POST["user_id"])) {
    $id = $_POST["user_id"];
}

if (isset($_POST["fname"])) {
    $fname = $_POST["fname"];
}

if (isset($_POST["lname"])) {
    $lname = $_POST["lname"];
}
if (isset($_POST["email"])) {
    $email = $_POST["email"];
}
// echo $book_name

if (sizeof($err)) {
    require_once './edit.php';
} else {
    $stmt = $conn->prepare('UPDATE user_manager SET fname = :fname, lname = :lname, email= :email WHERE user_id = :id');
    $stmt->execute(array(
        "id" => $id,
        "fname"=> $fname,
        "lname"=> $lname,
        "email"=> $email
    ));
    header("Location: ./home.php");
}
?>