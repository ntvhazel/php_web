<?php 
    require_once("./connect.php");
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }
    $stmt = $conn->prepare('DELETE FROM book_manager WHERE id = :id');
    $stmt->execute(array(
        "id" => $id
    ));
    header("Location: ./home.php");

?>