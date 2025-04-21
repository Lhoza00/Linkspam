<?php 
include('Database.php');
include('SignupClass.php');   
$error = ""; // Add this

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $signup = new SignUp();
    $error = $signup->evaluate($_POST); // store error
}
?>
<html lang="en" id="SignUpPage"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Linkspam | Sign-in</title>
</head>
<body class="SignBg">
    <?php include('Header.php');?>
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <section class="SignSection">
                <div class="container">
                    <div class="MemOptionContainer">
                        <ul class="OfferPrice">
                            <li>
                                <input type="radio" id="membership" name="subType" value="Free" required>
                                <div class="itemPrice">
                                    <div class="memPrice">
                                        <div>
                                            <h2>Free User</h2>
                                            <h3> $0</h3>
                                        </div>
                                        <i class="fa-solid fa-angle-down"></i>
                                    </div>
                                    <div class="memData" id="memFreeUser">
                                        <p>Access basic feature to fulfill quota to advance</p>
                                        <hr/>
                                        <p>Free networking with new members near you</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <input type="radio" id="memberships" value="Client" name="subType" required>
                                <div class="itemPrice">
                                    <div class="memPrice">
                                        <div>
                                            <h2>Client</h2>
                                            <h3>$25</h3>
                                        </div>
                                        <i class="fa-solid fa-angle-down"></i>
                                    </div>
                                    <div class="memData" id="memClient">
                                        <p>Free 30 days trial to try our service</p>
                                        <hr/>
                                        <p><b>Guaranteed 2000</b> members near your business</p>
                                        <hr/>
                                        <p>Get a trained professional to assist with basic step to step</p>
                                        <hr/>
                                        <p>Collaboration with other businesses</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="PaymentCard" id="PaymentCard">
                            <div class="form">
                                <div class="flForm">
                                    <label>Card Number</label>
                                    <input type="text" name="paymentCardNumber" class="inp CardNumber" 
                                            id="paymentCardNumber" maxlength="19" inputmode="numeric" 
                                            placeholder="1234 5678 9012 3456" required 
                                            oninput="formatCardNumber(this)">
                                </div>
                                <div class="miniForm">
                                <div class="InputContainer">
                                    <label for="paymentExp">Expiry Date (MM/YY)</label>
                                    <input type="text" id="paymentExp" name="paymentExp" maxlength="5" placeholder="MM/YY" required oninput="formatExpiryDate(this)">
                                </div>
                                    <div class="InputContainer">
                                        <label>CVV</label>
                                        <input type="number" placeholder="123" inputmode="numeric" pattern=[0-9]+ name="paymentCVV" required min=100 maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="DetailsDivContainer">
                        <div class="card">
                            <div class="form">
                                <h4 class="signinHeader">Create a Linkspam Account</h4>
                                <div class="UserForm">
                                    <div class="UserDetails">
                                        <label id="userLabel">Username</label>
                                        <input type="text" class="input" name="userName" id="userName" maxlength="25" required>
                                    </div>
                                    <div class="UserDetails">
                                        <label id="nameLabel">Full name</label>
                                        <input type="name" class="input" name="fullName" id="FullName" maxlength="50" required>
                                    </div>
                                    <div class="UserDetails">
                                        <label id="emailLabel">Email</label>
                                        <input type="email" name="userEmail" class="input" id="UserEmail" maxlength="254"required>
                                        
                                    </div>
                                    <div class="UserDetails">
                                        <label id="phoneNumberLabel">Phone Number</label>
                                        <input type="number" name="userPhoneNumber" inputmode="numeric" pattern=[0-9]+ class="input" id="PhoneNumber" maxlength="10" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        
                                    </div>
                                    <div class="UserDetails">
                                        <label id="passwordLabel">Password</label>
                                        <div class="password-container">
                                            <input type="password" name="userPassword" class="input inputPassword" id="sgUserPassword" maxlength="255" required>
                                            <span class="toggle-password" onclick="togglePassword()">
                                                <i id="eyeIcon" class="fas fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?php if (!empty($error)): ?>
                                        <p class="error"> 
                                            <?php echo $error; ?>
                                        </p>  
                                    <?php endif; ?>
                                   
                                    <div class="divButton" >
                                        <button type="submit" name="btnSignIn" id="SignButton" class="SignButton">Sign in</button>
                                    </div>
                                    
                                </div>    
                                <div class="SocialsLoginOption">
                                    <a href="Profile.php"><div class="btnLoginOption FacebookLogin">
                                        <i href="#" class="fab fa-facebook-f"></i>
                                        <p color="black">Facebook</p>
                                    </div></a>
                                    <a href="Profile.php"><div class="btnLoginOption GoogleLogin">
                                        <i href="#" class="fab fa-google"></i>
                                        <p>Google</p>
                                    </div></a>
                                </div>
                                <div class="AlreadyLogged">
                                    <p id="Login">Already have an account? <a href="Login.php">Sign in</a></p>
                                </div>
                                
                            </div> 
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </main>
   <?php include('Footer.php');?>
</body>
<script>
    function formatExpiryDate(input) {
        let value = input.value.replace(/\D/g, '');
        if (value.length >= 3) {
            value = value.slice(0, 2) + '/' + value.slice(2, 4);
        }
        input.value = value;
    }
    function formatCardNumber(input) {
        // Remove all non-digit characters
        let value = input.value.replace(/\D/g, '');
        
        // Add a space every 4 digits
        value = value.match(/.{1,4}/g);
        if (value) {
            input.value = value.join(' ');
        } else {
            input.value = '';
        }
    }
    function togglePassword() {
        const passwordInput = document.getElementById('sgUserPassword');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
</script>
</html>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
       /* $signup = new SignUp();
        $signup->evaluate($_POST);
        $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS);
        $userFullName = filter_input(INPUT_POST, "fullName", FILTER_SANITIZE_SPECIAL_CHARS);
        $userEmail = filter_input(INPUT_POST, "userEmail", FILTER_SANITIZE_EMAIL);
        $userPhoneNumber = filter_input(INPUT_POST, "userPhoneNumber", FILTER_SANITIZE_NUMBER_INT);
        $userPassword = filter_input(INPUT_POST, "userPassword", FILTER_SANITIZE_SPECIAL_CHARS);
        $userPassword = password_hash($userPassword, PASSWORD_BCRYPT); 
        $subType = filter_input(INPUT_POST, "subType", FILTER_SANITIZE_SPECIAL_CHARS);
        $paymentCardNumber = filter_input(INPUT_POST, "paymentCardNumber", FILTER_SANITIZE_NUMBER_INT);
        $paymentExp = filter_input(INPUT_POST, "paymentExp", FILTER_SANITIZE_NUMBER_INT);
        $paymentCVV = filter_input(INPUT_POST, "paymentCVV", FILTER_SANITIZE_NUMBER_INT);
            

            
        $sqlAccounts = "INSERT INTO useraccounts (userName, cardNumber, cardExp, cardCVV)
                        VALUES ('$userName', '$paymentCardNumber', '$paymentExp', '$paymentCVV');";
        $sqlUserDetails = "INSERT INTO userdetails (userName, fullName, userEmail, userPhoneNumber, 
                            userPassword, subType)
                            VALUES ('$userName', '$userFullName', '$userEmail', '$userPhoneNumber','$userPassword', '$subType');";
            
            

            try{
                mysqli_query($conn, $sqlAccounts);
                mysqli_query($conn, $sqlUserDetails);
            }
            catch(mysqli_sql_exception){
                echo "error";
            }

            mysqli_close($conn);
            exit();*/  
    }     
?>