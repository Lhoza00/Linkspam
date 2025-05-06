<html lang="en" id="AboutPage">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linkspam | About</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <?php include 'Header.php';?>
    <main>
        <section class="sectionWhoWeAre">
            <div class="container">
                <div class="containerCardWhoWeAre">
                <h1 class="aboutHeader">Who are Linkspam</h1>
                <div class="cardWhoWeAre">
                    <!--Place in the middle with a card, like a introduction in a powerpoint
                    Play a video/image in the section then with the container have a card at the front view-->
                    <p>We are a social media based platform that helps users to interact with each other and boost businesses by user's interactions with one another. Using business's affiliate links and user's followers count, we advertise to the customer's the business model that they are missing out on.</p>
                </div>
                </div>
            </div>
        </section>
        
        <section class="sectionMission">
            <div class="container">
                <h2 class="aboutHeader">Mission</h2>
                <div class="MissionBox">
                    <div class="MissionContainer">
                        <div class="cardMission">
                            <p>Our mission is to help the missions and the goals of the business to have a starting or finishing customer following account.
                            We allow users to create and share their content publicly to family and friends, linking your social media platforms to let your followers know about you. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid minima aperiam eaque earum provident</p>
                        </div>
                    </div>
                    <div class="MissionImage">
                        <img src="Images/1f62fddaafb2026669e09f680c977c08.jpg" alt="Mission Image">
                    </div>
                </div>
                <!--Add photograph about a user mission and a business mission(try using humans as it)-->
            </div>
        </section>
        <?php include('OurServices.php');?>
        <section class="sectionHowWeOperate">
            <div class="container">
                <h2 class="aboutHeader">How we operate</h2>
                <!--Financial Operation-->
                <div class="AboutCard">
                    <p>Profit gains is implemented by the users growth on followers and the users level xp. The 75% of our client's business funds are contained and shared to user's who level up experience to help business to grow.
                
                    User's are given opportunity to advertise for business to gain level experience. Content shared to user will be comprassing wide range that is primary to like, share and follow. Any embedded content will be counted in Linkspam and the social platform is embedded in.</p>
                </div>
                <!--Do a transition every min/second(float: right) Maybe an image aswell-->
            </div>
        </section>
        <section class="sectionAboutContact" id="sectionAboutContact">
            <div class="container">
                <h2 class="aboutHeader">Contact</h2>
                <div class="ContactContainer">
                    <div class="divAboutContact">    
                        <p>Contacting with Linkspam be on our <a href="Contact.php"><button id="contactpage">contact page</button></a> or contact us at <a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJqXPtHvlrkVNhfjgpsrXWSvvvqMsHtnKCQqddhXqtmdsvfqdqMVwnBmCSKGMQDVgRnfKLB" target="_blank"><button id="infoEmail">info@linkspam.co.za</button></a> for help. We are also available on whatsapp or via call for any helpline assistance on <button id="contactPhoneNumber">+27 71 180 9947.</p>
                    </div>
                    <div class="cardAboutContact">
                        <div class="backgroundcard">
                            <h2>Stay updated with Linkspam news</h2>
                            <div class="DivNews" >
                                <input type="email" placeholder="E-mail addresss" id="NewsEmail" data-key="NewsEmail" >
                                <button type="submit" id="btn btnNewsSubscribe" onclick="NewsEmailFunction()">Subscribe</button>
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