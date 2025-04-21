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
                    <a href="Home.php" class="Logo">LinkSpam</a> 
                    
                    <div class="LevelStats">
                        <p>Level 7</p>
                        <progress min="0" max="100" value="40">Xp Level</progress>
                        <p id="xp">576/16000 xp</p>
                    </div>
                </div>
        </section>
        <section class="Profile_Wrap">
            <div class="container">
                    <div class="BioContainer">
                        <div class="pfpBox">
                            <img src="Free.png" alt="ProfilePicture">
                        </div>    
                        <div class="BioCard">
                            <div>
                                <p class="atUsername">InvalidName123</p>
                                <p id="pfSkill" class="pfInfo">Software Engineer</p>        
                                <p id="pfEmail" class="pfInfo">lolwethudamane07@gmail.com</p>
                            </div>
                            <div class="ClashedDIV">
                                <div class="AboutUserContainer">
                                    <div class="FollowContainer">
                                        <div class="FollowCard">
                                            <b class="value of following">19</b>
                                            <p>Affilaition</p>
                                        </div>
                                        <div class="FollowCard">
                                            <b class="value of following">11</b>
                                            <p>Following</p>
                                        </div>
                                        <div class="FollowCard">
                                            <b class="value of followers">9</b>
                                            <p>Followers</p>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="BioStatement">
                                        <p>Bio: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid minima aperiam eaque earum provident voluptas minus assumenda! Distinctio quibusdam debitis tempora, quidem neque nobis adipisci laboriosam quaerat temporibus, enim delectus!</p>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="btnTrack">
                                <button>Follow</button>
                            </div>
                        </div>
                    </div>
                    <div class="ProgressContainer">
                        
                        <div class="SettingLast">
                            <div class="Tabs_Option">
                                <p>Post</p>
                                <p>Save</p>
                                <p>Stats</p>
                            </div>
                            <div class="Setting">
                                <i class="fa-solid fa-share-from-square"></i>
                                <i class="fa-solid fa-gear"></i>
                            </div>
                        </div>
                        <div class="progressday">
                            <div class="Streakday">
                                <i class="fa-solid fa-fire"></i>
                                <h3>4 Day Streak</h3>
                            </div>
                            <div class="Reward_Gift">
                                <i class="fa-solid fa-gift"></i>
                                <p>Reward Gift</p>
                            </div>
                        </div>
                        <hr color=" black";>
                        <div class="CentrehubContainer">
                            <div class="ProgressData">
                                <div class="ProgressMiniCard">
                                    <p>Total xp recieved</p>
                                    <p>24000 xp</p>
                                </div>
                                <div class="ProgressMiniCard">
                                    <p>Total Jobs Hired</p>
                                    <p>0</p>
                                </div>
                                <div class="ProgressMiniCard">
                                    <p>Total Users Shared To</p>
                                    <p>24 </p>
                                </div>
                                <div class="ProgressMiniCard">
                                    <p>Total Affiliate points</p>
                                    <p>1200 xp</p>
                                </div>
                                <div class="ProgressMiniCard">
                                    <p>Total Affiliate code</p>
                                    <p>2</p>
                                </div>
                                <div class="ProgressMiniCard">
                                    <p>Total Shout Outs</p>
                                    <p>0</p>
                                </div>
                            </div>
                            <div class="CourseSection">
                                <div class="CourseCard">
                                    <div class="CourseImage">
                                        <img src="advertise.pn" alt="CourseImage">
                                    </div>
                                    <div>
                                        <h3>Affiliate Marketing Course</h3>
                                        <p>A 12 step lesson course, step to step</p>
                                        <p>The first two chapers are for free</p>
                                    </div>   
                                </div>
                                <div class="CourseCard">
                                    <div class="CourseImage">
                                        <img src="advertise.pn" alt="CourseImage">
                                    </div>
                                    <div>
                                        <h3>Advertising Sales Course</h3>
                                        <p>A 12 step lesson course, step to step</p>
                                        <p>Coming soon</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include 'Footer.php';?>
</body>
</html>