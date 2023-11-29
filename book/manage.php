<?php
    require_once("./connect.php");
    $err = array();
    if (isset($_POST["book_name"])) {
        $book_name = $_POST["book_name"];
    }

    if (isset($_POST["author"])) {
        $author = $_POST["author"];
    }
    if (isset($_POST["publish_year"])) {
        $publish_year = $_POST["publish_year"];
    }

    if (sizeof($err)) {
        require_once './home.php';
    } else {
        $stmt = $conn->prepare('INSERT INTO book_manager(book_name, author, publish_year) values(:book_name, :author, :publish_year)');
        $stmt->execute(array(
            "book_name" => $book_name,
            "author" => $author,
            "publish_year"=> $publish_year

        ));
    
        header("Location: ./home.php");
    }
?>