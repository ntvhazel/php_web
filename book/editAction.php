<?php
require_once("./connect.php");
$err = array();

if (isset($_POST["id"])) {
    $id = $_POST["id"];
}

if (isset($_POST["book_name"])) {
    $book_name = $_POST["book_name"];
}

if (isset($_POST["author"])) {
    $author = $_POST["author"];
}
if (isset($_POST["publish_year"])) {
    $publish_year = $_POST["publish_year"];
}
// echo $book_name

if (sizeof($err)) {
    require_once './edit.php';
} else {
    $stmt = $conn->prepare('UPDATE book_manager SET book_name = :book_name, author = :author, publish_year= :publish_year WHERE id = :id');
    $stmt->execute(array(
        "id" => $id,
        "book_name"=> $book_name,
        "author"=> $author,
        "publish_year"=> $publish_year
    ));
    header("Location: ./home.php");
}
?>