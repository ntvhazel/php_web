<?php 
        session_start();
        if (isset($_SESSION["username"]) && $_SESSION["username"] == "shop") {
            require("shop.html");
            echo "<script>alert('".$_SESSION["username"]."')</script>";
        } else {
            header("location: http://localhost/WEB_DESIGN/login.php");
            // echo $_SESSION["username"];
        }
?>