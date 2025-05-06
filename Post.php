<!--Video and Picture post -->
<?php 
    $post = new Post();
    $userPost = $post->getPost($_SESSION["myuserId"]);
?>
<!--<div class="video-post">
    <div class="display-container">
        <div class="displayer">
        </div>
    </div>
    <div class="post-container">
        <div class="caption-wrap">
            <?php echo $userPost["userID"];?>
        </div>
        <div class="comment-container">
            <p>Falling</p>
            <p>Calling</p>
            <p>Stalling</p>
            <p>Robbing</p>
            <p>Farting</p>
        </div>
        <div class="likes-container">
            <div class="likes-wrapper">
                <span><i class="fa-regular fa-heart"></i><p>Promote</p><!--Once liked button clicked then show the amount of likes the post has</span>
                <span><i class="fa-solid fa-share-from-square"></i><p>Share</p></span>
                <span><i class="fa-regular fa-circle-check"></i><p>Affiliate</p></span>
            </div>
            <div class="date-time-post">01-01-2025</div>
        </div>
    </div>
</div>
-->
<div class="blog-post">
    <div class="caption-wrap">
        <?php echo $userPost["userID"];?>
    </div>
    <div class="userPost">
       Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae voluptas sint cupiditate fuga in rem, quo eligendi incidunt beatae velit ducimus! Tempora enim ipsum repudiandae itaque, soluta expedita fugit laudantium.
    </div>
    <div class="likes-container">
        <div class="likes-wrapper">
            <span><i class="fa-regular fa-heart"></i><p>Promote</p><!--Once liked button clicked then show the amount of likes the post has--></span>
            <span><i class="fa-solid fa-share-from-square"></i><p>Share</p></span>
            <span><i class="fa-regular fa-circle-check"></i><p>Affiliate</p></span>
        </div>
        <div class="date-time-post">01-01-2025</div>
    </div>
</div>