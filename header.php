<header class="header">
    <div class="container">
        <a href="Index.php" class="Logo">LinkSpam</a> 
        <nav class="navbar">
            <a href="About.php">About</a>
            <a href="Contact.php">Contact</a>
            <a href="index.php #News">News</a> 
            <a href="Login.php">Sign-in</a>   
        </nav>
        <div id="menu-btn" class="fas fa-bars">
            <ul class="mini-navbar" id="mini-navbar">
                <li><a href="About.php">About</a></li>
                <li><a href="Contact.php">Contact</a></li>
                <li><a href="index.php #News">News</a></li>
                <li><a href="Login.php">Sign-in</a></li>   
            </ul>
        </div> 
    </div>
</header>

<script>
    document.getElementById("menu-btn").addEventListener("click", function () {
        const menu = this.querySelector(".mini-navbar");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    });
</script>