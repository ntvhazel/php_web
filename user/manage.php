<?php
    require_once("./connect.php");
    $err = array();
    if (isset($_POST["fname"])) {
        $fname = $_POST["fname"];
    }

    if (isset($_POST["lname"])) {
        $lname = $_POST["lname"];
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }

    if (sizeof($err)) {
        require_once './home.php';
    } else {
        $stmt = $conn->prepare('INSERT INTO user_manager(fname, lname, email) values(:fname, :lname, :email)');
        $stmt->execute(array(
            "fname" => $fname,
            "lname" => $lname,
            "email"=> $email

        ));
    
        header("Location: ./home.php");
    }
?>