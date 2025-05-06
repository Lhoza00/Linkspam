<html lang="en" id="IndexPage">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linkspam</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <?php include('header.php');?>
    <main>
        <section class="hero">
            <div class="container">
                <section class="hero_card">
                    <div class="hero_header"> 
                        <h1>Advertisor with unlimited potential</h1>
                    </div>
                    <div class="hero_text">
                        <p>Join our advertising team at Linkspam, Build a network for business, social media & more.</p>
                    </div>
                    <div class="hero_btn">
                        <a href="Signup.php"><button class="Signup" type="button">Signup</button></a>
                        <a href="Login.php"><button class="Login" type="button">Login</button></a>
                    </div>
                </section>
                <section class="HeroSectionImage">
                    <img src="Images/97899c8479596a9fede11d2b50f05a1a.jpg" class="hero_image">
                </section>
            </div>
        </section>
        <?php include('OurServices.php');?>
        <section class="benefits_section">
            <div class="container">
            <div id="UMB">
                <h1>User membership benefits</h1>
            </div>
        </section>
        <section class="BenefitContainer"  id="firstBenefitContainer">
            <div class="container">
                <img src="free.png" class="CircleImage" alt="FreePic">
                <div class="text_container"> 
                    <h1>Affiliate's Benefits</h1>
                    <p>Join Linkspam affiliate user for free and start your growth with us. Have a passive income and have anytime, anywhere 24/7. Have the flexibility and freedom to choose what to promote and who you share with. Performance based rewards, through clicks, sales and more you can level your skill.</p>
                    <ul>
                        <li>
                            <p><b>Level</b> = <b>Trust</b> = <b>Monetization</b>. Every level recongnize you as a more trusted and experience partner. Leveling up to higher commision rate, early access to new features, bonuses and milestone payouts. Motivation to stay engaged to build a reputational followers.</p>
                        </li>
                        <li>
                            <p>Referal to progress and experience as our course lead you to the step needed to level up your experience. Avoid confusion on where to start or piercing together random ideas. Recieve custom referral link, marketing tools and real time tracking.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="BenefitContainer" id="secondBenefitContainer">
            <div class="container">
                <div class="text_container">
                    <h1>Business's Benefits</h1>
                    <p>Partnership to promote your business through your channels(blogs, social media, email, etc.), putting your brand in the front of new local or global audience. Be discovered locally or globally on your decision. Highly recommended for startups to grow from little to more followers and expand.</p>
                    <ul>
                        <li>
                            <p>Analtyics and insight tools allow you see which affiliate products drive followers interested in. Use your data to refine your overall marketing approach to build trust and encourage people to engage with your business. Have an extend sales and marketing for return of interest.</p>
                        </li>
                        <li>
                            <p>Cross-promotion collaboration to build relationship with affiliates to giveaways, joint campiagns and shoutouts to grow your followership engagements. Recieve resullt in user generated content for reviews and testimonials. Easily scale your outreach by part-taking with affiliation.</p>
                        </li>
                    </ul>
                </div>
                <img src="client.png" class="CircleImage" alt="Client">
            </div>
        </section>
        <section class="News" id="News">
            <div class="container">
                <div class="backgroundcard">
                    <h2>Stay updated with Linkspam news</h2>
                    <div class="DivNews" >
                        <input type="email" placeholder="E-mail addresss" id="NewsEmail" data-key="NewsEmail" >
                        <button type="submit" id="btn btnNewsSubscribe" onclick="NewsEmailFunction()">Subscribe</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('Footer.php');?>
    <script>
        var NewsEmail = document.getElementById("NewsEmail");
        function validateEmail(email){
            var re =  /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        };

        function NewsEmailFunction(){
            email= NewsEmail.value;
            if(validateEmail(email) && NewsEmail.value.length > 0){
                NewsEmail.style.border = "3px solid green";
                alert(`correct`);
            } else if(NewsEmail.value.length === 0 || !validateEmail(email)){
                NewsEmail.style.border = "3px solid red";
                NewsEmail.value = "";
                NewsEmail.placeholder = "Invalid Email";
                alert(`Incorrect`);
            }
            //return false;
            //unbind();
            //location.reload(true);
        }
    </script>
</body>
</html>

<?php 
   
?>