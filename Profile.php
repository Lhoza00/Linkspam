<?php 
    session_start();
    include('Database.php');
    include('LoginClass.php');
    include('ProfileClass.php');
    include('PostClass.php');

    $userId = $_SESSION["myuserId"];

    $login = new Login();
    $user_data = $login->checkLogin($_SESSION["myuserId"]);
    $checkData = $login->checkData($_SESSION["myuserId"]);

    //collect post
    $post = new Post();
    $user_post = $post->getPost($userId);
    
    
    //profile class
    $profile = new Profile();
    $XPdata = $profile->xpLevel($userId);


?>
<?php
    echo ceil(($XPdata['xpLevel'] * 100) / $XPdata['quota']);
?>
<html lang="en" id="Profile_Page">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkSpam | User Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <main> 
        <section class="SectionSetting">
            <div class="container">
                <div class="SettingContainer">
                    <a href="Home.php" class="Logo" onclick="">LinkSpam</a> 
                    
                    <div class="LevelStats">
                        <p>Level <?php echo $XPdata['userLevel'];?></p>
                        <progress min="0" max="100" value=<?php
                        echo ceil(($XPdata['xpLevel'] * 100) / $XPdata['quota']);
                        ?>
                        >
                         Xp Level</progress>
                        <p><?php echo $XPdata['xpLevel'];?>/<?php echo $XPdata['quota'];?> xp</p>

                    </div>
                </div>
        </section>
        <section class="Profile_Wrap">
            <div class="container">
                    <div class="BioContainer">
                        <!--Figure out to make a cover page link up with the profile image-->
                        <!--<div class="pfCoverBox">
                            <img name="userCover" src="Images/97899c8479596a9fede11d2b50f05a1a.jpg" alt="Cover Image">
                        </div>-->
                        <div class="pfpBox">
                            <!--<?php
                                $image = "";
                                if(file_exists($user_data["userPfp"])){
                                    $image = $user_data["userPfp"];
                                }
                             ?>-->
                            <img src="Free.png" alt="ProfilePicture">
                        </div>    
                        <div class="BioCard">
                            <div>
                                <p class="atUsername"><?php echo $user_data['userName'];?></p>
                                <p id="pfSkill" class="pfInfo"><?php echo $user_data['jobSkill']?></p>        
                                <p id="pfEmail" class="pfInfo"><?php echo $checkData['Gender'];?></p>
                            </div>
                            <div class="ClashedDIV">
                                <div class="AboutUserContainer">
                                    <div class="FollowContainer">
                                        <div class="FollowCard">
                                            <b class="value of following"><?php echo $user_data['affiliationCount'];?></b>
                                            <p>Affilaition</p>
                                        </div>
                                        <div class="FollowCard">
                                            <b class="value of following"><?php echo $user_data['followingCount'];?></b>
                                            <p>Following</p>
                                        </div>
                                        <div class="FollowCard">
                                            <b class="value of followers"><?php echo $user_data['followerCount'];?></b>
                                            <p>Followers</p>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="BioStatement">
                                        <?php echo $user_data['bioStatement'];?>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="btnTrack">
                                <a href="EditProfile.php"><button name="EditProfile ">Edit</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="ProgressContainer">
                        
                        <div class="SettingLast">
                            <div class="Tabs_Option">
                                <button onclick="loadPosts()" class="loadbutton">Post</button>
                                <button onclick="loadSaves()" class="loadbutton">Save</button>
                                <button onclick="loadStats()" class="loadbutton">Stats</button>
                            </div>
                            <div class="Setting">
                                <i class="fa-solid fa-share-from-square"></i>
                                <i class="fa-solid fa-gear"></i>
                            </div>
                        </div>
                        <div class="progressday">
                            <div class="Streakday">
                                <i class="fa-solid fa-fire"></i>
                                <h3>5 Day Streak</h3>
                            </div>
                            <div class="Reward_Gift">
                                <i class="fa-solid fa-gift"></i>
                                <p>Reward Gift</p>
                            </div>
                        </div>
                        <hr color=" black";>
                            <!--Change what is displace inbetween CentrehubContainer-->
                        <div id="centrehubContainer">
                            <!-- Content from Stats.php will appear here -->
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include 'Footer.php';?>
</body>
<script>
    function loadStats() {
        fetch('Stats.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('centrehubContainer').innerHTML = data;
            })
            .catch(error => {
                console.error('Error loading Stats:', error);
            });
    }
    function loadPosts(){
        fetch('Post.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('centrehubContainer').innerHTML = data;
            })
            .catch(error => {
                console.error('Error loading Stats:', error);
            });
    }
    function loadSaves(){
        fetch('Saves.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('centrehubContainer').innerHTML = data;
            })
            .catch(error => {
                console.error('Error loading Stats:', error);
            }); 
    }
</script>
</html>