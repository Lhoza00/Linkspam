<?php
    session_start();
    include('Database.php');
    include('LoginClass.php'); 
    $error = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userName = $_POST['userName'];
        $userPassword = $_POST['userPassword'];
        $login = new Login();
        $error = $login->evaluate($_POST);
    
        if(empty($error)) {
            header("Location: Profile.php");
            die;
        }
    }
    
?>
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
                    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <p class="LoginHeader">Sign in to your Account</p>
                        <div class="password">
                            <label>Username</label>
                            <label class="forgot"><a href="#" class="forgot">Forget username</a></label>
                        </div>
                        <input class="input" name="userName" required value="<?php echo htmlspecialchars($userName ?? ''); ?>">
                        <div class="password">
                            <label>Password</label>
                            <label class="forgot"><a href="#" class="forgot">Forget password</a></label>
                        </div>
                        <input type="password" class="input" name="userPassword" required>
                        <?php if (!empty($error)): ?>
                            <p class="error"> 
                                <?php echo $error; ?>
                            </p>  
                        <?php endif; ?>
                        <div class="device">
                            <input type="checkbox" class="RememberCheckBox">
                            <p>Remember me on this device</p>
                        </div>
                        <div class="divButton">
                            <button type="submit" class="SignButton" name="loggin">Log in</button>
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
