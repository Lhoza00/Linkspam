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
            if($this->checkUniqueness($data)){$this->create_user($data);}
        }else{
            $this->error .= "Username, email, or phone number already exists.<br/>";
        }
        return $this->error;
    }

    private function checkUniqueness($data) {
        $DB = new Database();
        $userName = $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($data['userName'])) {
            $usernameCheck = $DB->read("SELECT username FROM userdetails WHERE userName = $userName");
            if ($usernameCheck) {
                $this->error .= "Username already taken.<br/>";
            }
        }
    
        if (!empty($data['userEmail'])) {
            $emailCheck = $DB->read("SELECT userEmail FROM userdetails WHERE userEmail = ?", [$data['userEmail']]);
            if($emailCheck) {
                $this->error .= "Email already registered.<br/>";
            }
        }
    
        if (!empty($data['userPhoneNumber'])) {
            $phoneCheck = $DB->read("SELECT 1 FROM userdetails WHERE userPhoneNumber = ?", [$data['userPhoneNumber']], 's');
            if ($phoneCheck) {
                $this->error .= "Phone number already in use.<br/>";
            }
        }

        if($this->error == ""){
            return true;
        }else{
            return false;
        }
    }

    public function create_user($data) {
        $DB = new Database();
        $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS);
        $userFullName = filter_input(INPUT_POST, "fullName", FILTER_SANITIZE_SPECIAL_CHARS);
        $userEmail = $data["userEmail"];
        /*$userEmail = filter_input(INPUT_POST, "userEmail", FILTER_SANITIZE_EMAIL);*/
        $userPhoneNumber = filter_input(INPUT_POST, "userPhoneNumber", FILTER_SANITIZE_NUMBER_INT);
        $userPassword = filter_input(INPUT_POST, "userPassword", FILTER_SANITIZE_SPECIAL_CHARS);
        $userPasswordHash = password_hash($userPassword, PASSWORD_DEFAULT);
        $subType = filter_input(INPUT_POST, "subType", FILTER_SANITIZE_SPECIAL_CHARS);

        $paymentCardNumber = filter_input(INPUT_POST, "paymentCardNumber", FILTER_SANITIZE_NUMBER_INT);
        $paymentExp = filter_input(INPUT_POST, "paymentExp", FILTER_SANITIZE_NUMBER_INT);
        $paymentCVV = filter_input(INPUT_POST, "paymentCVV", FILTER_SANITIZE_NUMBER_INT);

        $sqlUserDetails = "INSERT INTO userdetails (userName, fullName, userEmail, userPhoneNumber, 
                        userPassword, subType)
                        VALUES ('$userName', '$userFullName', '$userEmail', '$userPhoneNumber','$userPasswordHash', '$subType');";
        
        
        $sqlAccounts = "INSERT INTO useraccounts (userName, cardNumber, cardExp, cardCVV)
                    VALUES ('$userName', '$paymentCardNumber', '$paymentExp', '$paymentCVV');";
        
        try{
            $DB->save($sqlUserDetails);
            $DB->save($sqlAccounts);
        }catch(mysqli_sql_exception){
            header("Location: Database.php");
            exit();
        }
    }
}

/*class Signup{
    private $error = "";
    public function evaluate($data){
        foreach($data as $key => $value){
            if(empty($value)){
                $this->error =  $this->error . $key . " is empty!<br/>";
            }else if($this->error == "btnSignIn is empty!"){
                $data[$key] = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }
        if($this->error == "" || $this->error == "btnSignIn is empty!"){
            //save
            $this->create_user($data);
        }else{
            return $this->error;
        }
    }
    public function create_user($data){
        $DB = new Database();
        $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS);
        $userFullName = filter_input(INPUT_POST, "fullName", FILTER_SANITIZE_SPECIAL_CHARS);
        $userEmail = filter_input(INPUT_POST, "userEmail", FILTER_SANITIZE_EMAIL);
        $userPhoneNumber = filter_input(INPUT_POST, "userPhoneNumber", FILTER_SANITIZE_NUMBER_INT);
        $userPassword = filter_input(INPUT_POST, "userPassword", FILTER_SANITIZE_SPECIAL_CHARS);
        $userPasswordHash = password_hash($userPassword, PASSWORD_DEFAULT);
        $subType = filter_input(INPUT_POST, "subType", FILTER_SANITIZE_SPECIAL_CHARS);
        $sqlUserDetails = "INSERT INTO userdetails (userName, fullName, userEmail, userPhoneNumber, 
                        userPassword, subType)
                        VALUES ('$userName', '$userFullName', '$userEmail', '$userPhoneNumber','$userPasswordHash', '$subType');";
        
        $paymentCardNumber = filter_input(INPUT_POST, "paymentCardNumber", FILTER_SANITIZE_NUMBER_INT);
        $paymentExp = filter_input(INPUT_POST, "paymentExp", FILTER_SANITIZE_NUMBER_INT);
        $paymentCVV = filter_input(INPUT_POST, "paymentCVV", FILTER_SANITIZE_NUMBER_INT);
        $sqlAccounts = "INSERT INTO useraccounts (userName, cardNumber, cardExp, cardCVV)
                    VALUES ('$userName', '$paymentCardNumber', '$paymentExp', '$paymentCVV');";
        
        try{
            $DB->save($sqlUserDetails);
            $DB->save($sqlAccounts);
        }catch(mysqli_sql_exception){
            header("Location: Database.php");
            exit();
        }
    }
}*/
?>