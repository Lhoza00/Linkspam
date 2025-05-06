<?php 
    session_start();
    include('Database.php');
    include('LoginClass.php');
    include('ProfileClass.php');
    include('PostClass.php');

    $login = new Login();
    $user_data = $login->checkLogin($_SESSION["myuserId"]);
    $userId = $_SESSION["myuserId"];

    $post = new Post();
    $user_post = $post->getPost($_SESSION["myuserId"]);

    if(($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST["btnSavePost"])){
        $post = new Post();
        $data_post = $post->createPost($userId, $_POST, $user_data["userName"]);
    }
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
                    <div>
                        <div class="fa-solid fa-circle-user" id="circle-user">
                            <ul class="home-sidebar">
                                <li><a href="Home.php">Linkspam</a></li>
                                <li><a href="#">Leaderboard</a></li>
                                <li><a href="#">Payment</a></li>
                                <li><a href="Profile.php"><?php echo $user_data["userName"]?></a></li>
                                <li><a href="Setting.php">Setting</a></li>
                            </ul>
                        </div>
                    </div>
                    <input class="hmSearch" type="search" placeholder="Search">
                    <div class="btnPost">
                        <i class="fa-solid fa-plus"></i>
                        <p>Post</p>
                    </div>
                    
                </div>
        </section>
        <section class="SectionPost">
            <div class="container">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <textarea rows="4" maxlength="260" name="post"></textarea>
                <div class="inner-post">
                    <i class="fa-solid fa-hashtag"></i>
                    <i class="fa-solid fa-user-tag"></i>
                    <i class="fa-solid fa-image"></i>
                    <button class="btnSavePost" name="btnSavePost">Post</button>
                </div>
                </form>
            </div>
        </section>
        <section class="Section-userHome">
            <div class="container">
                <?php echo include("Post.php")?>
            </div>
        </section>
    </main>
    <?php include("Footer.php");?>
</body>
</html>
<script>
    document.getElementById("circle-user").addEventListener("click", function () {
        const menu = this.querySelector(".home-sidebar");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    });
</script>
<script>
    const btnPost = document.querySelector('.btnPost');
    const sectionPost = document.querySelector('.SectionPost');

    btnPost.addEventListener('click', () => {
        sectionPost.classList.toggle('active');
    });
</script>