<?php $error = "";?>
<html lang="en" id="LoginPage">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Linkspam | Login</title>
</head>
<body class="SignBg">
    <?php include('header.php'); ?>
    <main >
        <section class="LoginSection">
            <div class="container">
                <div class="card">   
                    <form class="form" action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
                        <p class="LoginHeader">Sign in to your Account</p>
                        <div class="password">
                            <label>Username</label>
                            <p id="error" font-color="red"></p>
                        </div>
                        <input class="input" name="userName">
                        <div class="password">
                            <label>Password</label>
                            <label class="forgot"><a href="#" class="forgot">Forget password</a></label>
                        </div>
                        <input type="password" class="input" name="userPassword">
                        <div class="device">
                            <input type="checkbox" class="RememberCheckBox">
                            <p>Remember me on this device</p>
                        </div>
                        <div class="divButton">
                            <button type="submit" class="SignButton" name="loggin">Sign in</button>
                        </div>
                        <p id="createAccount">Create an account? <a href="Signup.php">Sign in</a></p>
                    </form> 
                </div>
            </div>
        </section>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>
<?php 
    include("Database.php");
    session_start();
    
    $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS);
    $userPassword = filter_input(INPUT_POST, "userPassword", FILTER_SANITIZE_SPECIAL_CHARS);

    // Use prepared statements to prevent SQL injection
    if(isset($_POST["loggin"])){
        $stmt = $conn->prepare("SELECT * FROM userDetails WHERE username = ?");
        $stmt->bind_param("s", $userName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if(!password_verify($userPassword, $row["userPassword"])) {
                $error = "Incorrect password";
                exit();
            }
            $_SESSION["userName"] = $userName;
            echo "Logged in";
            exit();
        } else {
            $error = "Incorrect username or password";
            echo "<script>javascript: alert('Show inccorrect');
                    </script>";
            exit();
        }

        mysqli_close($conn);
    }
?>
