<?php 
    session_start();
    include('Database.php');
    include('LoginClass.php');
    include('ProfileClass.php');
    include('PostClass.php');
    include("imageClass.php");

    $login = new Login();
    $user_data = $login->checkLogin($_SESSION["myuserId"]);
    $userId = $_SESSION["myuserId"];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_FILES["file"]["name"])){
            if(($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png")){
                $allowSize = (1024 * 1024) * 4;
                if($_FILES["file"]["size"] < $allowSize){
                    $filename = $_FILES["file"]["name"];
                    move_uploaded_file($_FILES["file"]["tempName"], "uploads/" . $filename);
                    
                    $change = "profile";
                    if(isset($_GET["change"])){
                        $change = $_GET["change"];
                    }

                    $image= new Image();

                    if($change == "cover"){
                        $image->cropImage($fileName, $fileName, 800, 800, $_FILES["file"]["type"]);
                    }elseif($change == "profile"){
                        $image->cropImage($fileName, $fileName, 500, 500, $_FILES["file"]["type"]);
                    }

                    if(file_exists($filename)){
                        $userId = $user_data["userId"];
                        //check for mode for GET parameters
                        
                        if($change == "profile"){
                            $sqlUpdate = "UPDATE userPost set userPfp = '$fileName' WHERE userId = '$userId' LIMIT 1;";
                             
                        }else if($chnage == "cover"){
                            $sqlUpdate = "UPDATE userPost set userCover = '$fileName' WHERE userId = '$userId' LIMIT 1;";
                        }
                        $DB = new Database();
                        $DB->save($sqlUpdate);

                        header("Location: Profile.php");
                        die;
                    }
                }else{
                    echo "File to large, please insert smaller size";
                }
            }else{
                echo "Only image type images";
            }
        }else{
            echo "please add a valid image";   
        }
    }

?>
<html lang="en" id="Changepfp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkSpam | User Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <main>
        <section>
            <div class="card">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <button name="submit">Submit</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>