<?php 
    require_once("./connect.php");
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }
    $stmt = $conn->prepare('DELETE FROM user_manager WHERE user_id = :id');
    $stmt->execute(array(
        "id" => $id
    ));
    header("Location: ./home.php");

?>