<?php
    session_start();
    if(isset($_SESSION["myuserId"])){
        unset($_SESSION["myuserId"]);
    }
    header("Location: Login.php");
    die;
?>