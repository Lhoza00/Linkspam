<?php

$fullname = $_POST["full_Name"];
$email = $_POST["email"];
$phoneNumber = $_POST["phone_Number"];
$password = $_POST["password"];

$fullnameErr = NULL;
$emailErr = NULL;
$phoneNumberErr = NULL;
$passwordErr = NULL;

if(isset($_POST["btnSignIn"])){
    function EmptyInput(){
        if(!isset($fullname)){
            $fullnameErr = "Please fill in your name";  
        }
        if(!isset($email)){
            $emailErr = "Please fill in your email";
        }
        if(!isset($phoneNumber)){
            $phoneNumberErr = "Please fill in your phone number";
        }
        if(!isset($password)){
            $passwordErr = "Please enter a password";
        }
    }

    
    if(isset($_POST["full_Name"]) && preg_match("/^[a-zA-Z-' ]*$/",$fullname)){
        $fullname = filter_input(INPUT_POST, $fullname, FILTER_SANITIZE_SPECIAL_CHARS);
    }else if(empty($_POST["full_name"])){
        $fullnameErr = "Please fill in your name";
    }
    else if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname)){
        $fullnameErr = "Only letters and space allowed";
    }
    /*------------------------------------------------------------------ */
    if(isset($_POST["email"]) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email = filter_input(INPUT_POST, $email, FILTER_SANITIZE_EMAIL);
    }else if(empty($_POST["email"])){
        $emailErr = "Please fill in your email";
        echo '<p style>.email-error{display: "block"}</style>';
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid email format";
    }
    /**----------------------------------------------------------------- */
    if(isset($_POST["phone_number"]) && filter_var($phoneNumber, FILTER_VALIDATE_INT)){
        $phoneNumber = filter_input(INPUT_POST, $phoneNumber, FILTER_SANITIZE_NUMBER_INT);
    }else if(empty($_POST["phone_number"])){
        
    }
    else if(!filter_var($phoneNumber, FILTER_VALIDATE_INT)){
        
    }
    /***-------------------------------------------------------------------- */
    if(isset($_POST["password"])){
        $password = password_hash($password, PASSWORD_DEFAULT);
    }else{
        echo '<script>alert("it work")</script>';
    }
    if(isset($_POST["subType"])){
        /*
        $subType = NULL;
        if($subType == "Free"){
            echo "example";
        }*/
        $subType = $_POST["subType"];
    }else if(empty($_POST["subType"])){
        echo "";
    }
}
?>