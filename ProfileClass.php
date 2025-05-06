<?php
class Profile{
    public $profileData = "";
    public function get_data($userId){
        $DB = new Database();
        $query = "SELECT * FROM userstats WHERE userID = '$userId'";
        $result= $DB->read($query);
        if($result){
            $row = $result[0];
            return $row;
        }else{
            return false;
        }
    }

    public function xpLevel($userId){
        $userData = $this->get_data($userId);
        $quota = ((($userData['userLevel'] + 1) * 8) * 4) + 2;
        $LevelUp = ceil(($userData['xpLevel'] * 100) / $quota);
        if($LevelUp == 100){
            $userData['userLevel'] += 1;
            $userData['totalXP'] += $userData['xpLevel'];
            $userData['xpLevel'] = 0;
        }
        $DB = new Database();
        $updateQuery = "UPDATE userstats SET userLevel = '{$userData['userLevel']}', totalXP = '{$userData['totalXP']}', xpLevel = '{$userData['xpLevel']}' WHERE userID = '$userId'";
        $DB->save($updateQuery);
        $userData['quota'] = $quota;

        return $userData;
    }

    
    
}

?>