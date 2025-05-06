<html lang="en" id="ContactPage">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linkspam | Contact</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <?php include 'header.php';?>
    <main>
    <section class="section_contact">
        <div class="container">
            <div class="cardcontact">
                <div class="cardpadding">
                    <p class="contactTitle">Submit question</p>
                </div>
                    <hr size="3" color="black"/>
                <div class="cardpadding">
                    <p class="wording">Please fill out the form below to contact us.</p>
                    <input type="email" placeholder="Enter your e-mail" class="contacter">
                    <input placeholder="Enter subject" class="contacter">
                    <textarea placeholder="Enter your message" class="contactermessage"></textarea>
                    <button class="btn Contactbtn">Send</button>
                </div>
                    <hr size="3" color="black"/>
                <div class="cardpadding">    
                    <p class="helpHeader">Need help?</p>
                    <div class="Divhelp">
                        <div class="HelpDiv1">
                            <p class="HelpPar">Get help instruction to problem:</p>
                            <button class="btn Contactbtn">Help</button>
                        </div>
                        
                            <img src="question.png" class="Imgquestion">
                    </div>
                </div>
                    <hr size="3" color="black"/>
                <div class="cardpadding">
                    <p class="ContactAddress">Can personally contact us @ Lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </div>   
    </section>
    </main>
    <?php include 'Footer.php';?>
</body>
</html>