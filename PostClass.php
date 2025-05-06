<?php
class Post{
    private $error = "";
    public function createPost($userID, $data, $userName){
        if(!empty($data['post'])){
            $post = addslashes($data['post']);
            $postid = $this->createPostID();
            
            $sqlPost = "INSERT INTO userposts(userId, userName, postid, post) 
                        VALUES('$userID', '$userName','$postid','$post')";
            $DB = new Database();
            $DB->save($sqlPost);
        }else{
            $this->error = "Insert into the input to post";
        }
    }

    public function createPostID(){
        return bin2hex(random_bytes(8));
    }

    public function getPost($userID){
        if(!empty($userID)){
            $sqlretrieve = "SELECT * FROM userposts WHERE userID = $userID ORDER BY date DESC LIMIT 10";
            $DB = new Database();
            $user_post = $DB->read($sqlretrieve);
            if($user_post){
                return $user_post;
            }else{
                return false;
            }
        }
    }

    public function getUser($userId){
        $sqlGetUser = "SELECT * FROM userPosts WHERE userId = '$userId' Limit 1";
        $DB = new Database();
        $gotUser = $DB->read($sqlGetUser);
        if($gotUser){
            return $gotUser[0];
        }else{
            return false;
        }
    }
}
?>