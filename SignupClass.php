<?php
class Signup {
    private $error = "";
    

    public function evaluate($data) {
        $requiredFields = ['userName', 'fullName', 'userEmail', 'userPhoneNumber', 'userPassword', 'subType'];
        $excludeKeys = ['btnSignIn'];

        foreach ($data as $key => $value) {
            if (in_array($key, $excludeKeys)) continue;
            if (in_array($key, $requiredFields) && empty(trim($value))) {
                $this->error .= ucfirst($key) . " is empty!<br/>";
            }
        }
        if ($this->error === "") {
            $this->checkUniqueness($data);
            if($this->error === ""){
                $this->create_user($data);
            }else{
                return $this->error;
            }
            
        }else{
            $this->error .= "Username, email, or phone number already exists.<br/>";
        }
        return $this->error;
    }

    private function checkUniqueness($data) {
        $DB = new Database();
        $userName = $data["userName"];
        if (!empty($data['userName'])) {
            $usernameCheck = $DB->read("SELECT username FROM userdetails WHERE userName = '$userName'");
            if (!empty($usernameCheck)) {
                $this->error .= "Username already taken.<br/>";
                return $this->error;
            }
        }

        $userEmail = $data["userEmail"];
        if (!empty($data['userEmail'])) {
            $emailCheck = $DB->read("SELECT userEmail FROM userdetails WHERE userEmail = '$userEmail'");
            if(!empty($emailCheck)) {
                $this->error .= "Email already registered.<br/>";
                return $this->error;
            }

        }

        $userPhoneNumber = $data["userPhoneNumber"];
        if (!empty($data['userPhoneNumber'])) {
            $phoneCheck = $DB->read("SELECT userPhoneNumber FROM userdetails WHERE userPhoneNumber = '$userPhoneNumber'");
            if (!empty($phoneCheck)) {
                $this->error .= "Phone number already in use.<br/>";
                return $this->error;
            }
        }

        $length = strlen(preg_replace('/\D/', '', $data["paymentCardNumber"])); // Remove non-digits
        if($length < 16 || $length > 19){
            $this->error = "Payment Card Number must be 16 digits <br/>";
            return $this->error;
        }

        

    }

    private function createUserID(){
        return 'user_' . bin2hex(random_bytes(8));
    }

    public function create_user($data) {
        $DB = new Database();
        $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS);
        $userFullName = filter_input(INPUT_POST, "fullName", FILTER_SANITIZE_SPECIAL_CHARS);
        $userEmail = filter_input(INPUT_POST, "userEmail", FILTER_SANITIZE_EMAIL);
        $userPhoneNumber = filter_input(INPUT_POST, "userPhoneNumber", FILTER_SANITIZE_NUMBER_INT);
        $userPassword = filter_input(INPUT_POST, "userPassword", FILTER_SANITIZE_SPECIAL_CHARS);
        $userPasswordHash = password_hash($userPassword, PASSWORD_DEFAULT);
        $subType = filter_input(INPUT_POST, "subType", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $userId = $this->createUserID();

        $paymentCardNumber = filter_input(INPUT_POST, "paymentCardNumber", FILTER_SANITIZE_NUMBER_INT);
        $paymentExp = filter_input(INPUT_POST, "paymentExp", FILTER_SANITIZE_NUMBER_INT);
        $paymentCVV = filter_input(INPUT_POST, "paymentCVV", FILTER_SANITIZE_NUMBER_INT);

        $sqlUserDetails = "INSERT INTO userdetails (userid, userName, fullName, userEmail, userPhoneNumber, 
                        userPassword, subType)
                        VALUES ('$userId', '$userName', '$userFullName', '$userEmail', '$userPhoneNumber','$userPasswordHash', '$subType');";
        
        
        $sqlAccounts = "INSERT INTO useraccounts (userid, userName, cardNumber, cardExp, cardCVV)
                    VALUES ('$userId', '$userName', '$paymentCardNumber', '$paymentExp', '$paymentCVV');";
        
        $sqlStats = "INSERT INTO userStats(userid, userName, userEmail)
                    VALUES ('$userId', '$userName','$userEmail');";
        
        try{
            $DB->save($sqlUserDetails);
            $DB->save($sqlAccounts);
            $DB->save($sqlStats);
        }catch(mysqli_sql_exception){
            header("Location: Database.php");
            exit();
        }
    }

}

?>