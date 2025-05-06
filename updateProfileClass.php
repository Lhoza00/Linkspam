<?php
    
class UpdateProfile{

    private function checkUniqueness($userPost) {
        $DB = new Database();
        $userName = $userPost['userName'];
        if (!empty($userPost['userName'])) {
            $usernameCheck = $DB->read("SELECT userName FROM userdetails WHERE userName = '$userName'");
            if(!empty($usernameCheck)){
                return true;
            }else{
                return false;
            }
        }
    }

    public function updateInfo($userPost){
        if(isset($_SESSION["myuserId"])){
            $DB = new Database();
            $userId = $_SESSION["myuserId"];
            $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS);
            $jobSkill = filter_input(INPUT_POST, "jobSkill", FILTER_SANITIZE_SPECIAL_CHARS);
            $bioStatement = filter_input(INPUT_POST, "bioStatement", FILTER_SANITIZE_SPECIAL_CHARS);
            $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_SPECIAL_CHARS);
            $DateOfBirth = filter_input(INPUT_POST, "bodYear", FILTER_SANITIZE_NUMBER_INT) . "-" .
                            filter_input(INPUT_POST, "bodMonth", FILTER_SANITIZE_NUMBER_INT) . "-" .
                            filter_input(INPUT_POST, "bodDate", FILTER_SANITIZE_NUMBER_INT);
            $townCity = filter_input(INPUT_POST, "townCity", FILTER_SANITIZE_SPECIAL_CHARS);
            $province = filter_input(INPUT_POST, "provinces", FILTER_SANITIZE_SPECIAL_CHARS);
            $zipCode = filter_input(INPUT_POST, "zipCode", FILTER_SANITIZE_NUMBER_INT);
            if($this->checkUniqueness($userPost)){
                $sqlSaveStats = "UPDATE userstats SET userName = '$userName', jobSkill = '$jobSkill',
                                 bioStatement = '$bioStatement' WHERE userID = '$userId';";
                $sqlSaveDetails = "UPDATE userdetails SET userName = '$userName', Gender = '$gender', DateOfBirth = '$DateOfBirth', 
                                    townCity = '$townCity', Province = '$province', zipCode = '$zipCode'
                                    WHERE userID = '$userId';";
                
                $DB->save($sqlSaveDetails);
                $DB->save($sqlSaveStats);
                return true;
            }else{
                return false;
            }

        }
    }
}

?>