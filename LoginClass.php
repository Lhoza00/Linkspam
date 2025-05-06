<?php 
class Login{
    private $error = "";
    public function evaluate($data){
        $DB = new Database();
        if (isset($data['userName']) && isset($data['userPassword'])) {
            $userName = trim($data['userName']);
            $userPassword = $data['userPassword'];
            $userName = addslashes($userName);
            $sqlUserDetails = "SELECT * FROM userdetails WHERE userName = '$userName' LIMIT 1";
            $result = $DB->read($sqlUserDetails);
            
            if($result){
                $row = $result[0];
                $PasswordVerified = password_verify($userPassword, $row["userPassword"]);
                if($PasswordVerified){
                    //$this->error .= "successfil";
                    $_SESSION['myuserId'] = $row['userID'];
                    header("Location: Profile.php");
                    die;
                }else{
                    $this->error .= "Incorrect Password</br>";
                }
            }else{
                $this->error .= "Invalid Username</br>";
            }
        }
        return $this->error;
    }

    public function checkLogin($userId){
        if(isset($_SESSION["myuserId"])){
            $DB = new Database();
            $sqlCheckLogged = "SELECT * FROM userStats WHERE userId = '$userId' LIMIT 1";
            $result = $DB->read($sqlCheckLogged);
            if($result){
                $user_data = $result[0];
                return $user_data;
            }else{
                header("Location: Login.php");
                die; 
            }
        }else{
            header("Location: Login.php");
            die; 
        }
    }

    public function checkData($userId){
        if(isset($_SESSION["myuserId"])){
            $DB = new Database();
            $sqlCheckLogged = "SELECT * FROM userdetails WHERE userID = '$userId' LIMIT 1";
            $result = $DB->read($sqlCheckLogged);
            if($result){
                $user_data = $result[0];
                return $user_data;
            }else{
                header("Location: Login.php");
                die; 
            }
        }else{
            header("Location: Login.php");
            die; 
        }
    }

    /*<?php if($posts){
        foreach($posts as $row){
            $user = new Post();
            $rowUser = $user->getUser($row['userId']);
            include("Post.php");
        }
    }?>*/
}
?>