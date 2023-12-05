<?php
        require_once("./connect.php");
        if (isset($_POST['action']))
            $action = $_POST['action'];
        if (isset($_POST['user_name']))
            $user_name = $_POST['user_name'];
        if (isset($_POST['pwd']))
            $pwd = $_POST['pwd'];

        switch($action){
            case "register":
                $stmt = $conn->prepare('INSERT INTO authen_user(user_name, pwd) values(:user_name, :pwd)');
                $stmt->execute(array(
                    "user_name" => $user_name,
                    "pwd" => $pwd
                ));
                header("location: ./home.php");
                break;
            case "login":
                $stmt = $conn->prepare("SELECT * FROM authen_user ");
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                $response = $stmt->fetchAll();
                foreach($response as $r){
                    if ($r['user_name'] === $user_name && $r['pwd'] === $pwd){
                        // $_SESSION["active"] = TRUE;
                        header("location: ./home.php");
                    } else {
                        header("location: ./login.php");
                    }
                }
        }
?>