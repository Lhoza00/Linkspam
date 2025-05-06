<?php
class Database {
    private $db_server = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "linkspamdb";
    private $conn;

    function connect(){
        $connection = mysqli_connect($this->db_server, $this->db_user, $this->db_pass, $this->db_name);
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $connection;
    }
    function read($query){
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);
        if(!$result){
            return false;
        }else{
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            mysqli_close($conn);

            return $data;
        }
    }

    function save($query){
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        if(!$result){
            
            return false;
        }else{
            return true;
        }
        
    }



}   
$DB = new Database();

?>