<?php
    session_start();
    if (isset($_GET["action"]) == "logout"){
        session_abort();
        header("location:login.php");
    }
    $user = array(
        "shop" => "shop",
        "checkout" => "checkout",
        "account"=> "account",
    );

    if (isset($_POST["username"])) {
        $username  = $_POST["username"];
        $_SESSION["username"] = $_POST["username"];
    }
    if (isset($_POST["pwd"])) {
       $pwd = $_POST["pwd"];
    }

    if ($pwd == ""){
        header("location:login.php");
    }


    foreach ($user as $key => $value) {
        if ($_SESSION["username"] == $key && $pwd == $value) {
            $location = $key."/".$key.".php";
            header("location:".$location);
        }
    }

    // 
?>