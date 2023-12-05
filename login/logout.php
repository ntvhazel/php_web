<?php 
    if (isset($_POST['action']) && $_POST['action']){

        session_start();
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();

        header('location: ./login.php');
    }
?>