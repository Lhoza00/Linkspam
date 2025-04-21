<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Document</title>
</head>
<style>
    header{
        width: 100%;
    }
    .header .container nav, .header .container .fa-bars{
        visibility: hidden;
        display: none;
    }
    .header .container{
        justify-content: center;
        padding-left: 0;
        padding-right: 0;
        width: 100%;
        max-width: 100%;
    }
    .UserInfo{
        border: 2px solid navy;
        padding: 0 1rem;
    }
    form{
        border: 2px solid green;
        margin: 0 auto;
        width: 40%;
        
    }
    .comboSelector{
        display: flex;
        justify-content: space-between;
    }
    .EmailContainer{
        width: 100%;
        height: 3rem;
        justify-content: center;
        display: flex;
        border: 0px solid blue;
    }
    #EmailPlay{
        outline: none;
        width: 100%;
        border-width: 1px;
        padding: 0 1.5rem;
        font-size: 1.3rem;
        text-align: center;
        height: 1.8rem;
        border-radius: 2rem;
        margin: 0 auto;
    }
    #EmailPlay::placeholder{
        text-align: center;
        font-size: 1.3rem;
        color: #444;
    }
    #btnPlay{
        outline: none;
        width: 100%;
        border-width: 1px;
        padding: 0 1.5rem;
        font-size: 1.3rem;
        text-align: center;
        height: 1.8rem;
        border-radius: 2rem;
        margin: 0.5rem auto;
    }
    div{
        padding: 0.5rem 0;
    }
    main{
        min-height: 80vh;
        flex-direction: column;
        display: flex;
    }
    select{
        width: 45%;
        height: 1.8rem;
        text-align: center;
        outline: none;
        font-size: 1.3rem;
        border-radius: 1rem;
    }
    footer .container{
        margin-top: auto;   
    }
    .roulette{
        border: 2px solid cyan;
        justify-content: center;
        display: flex;
        min-height: 60vh;
    } 
    .spinBtn{
        position: relative;
        width: 4rem;
        height: 4rem;
        top: 100px;
        right: 50px;
        background: #fff;
        border-radius: 50%;
        z-index: 10;
        display: flex;
        justify-content: center;
        align-items: center;
        place-items: center;
        text-transform: uppercase;
        font-weight: 600;
        color: #333;
        letter-spacing: 0.1rem;
        border: 3px solid black;
        cursor: pointer;
        user-select: none;
    }
    .spinBtn::before{
        content: '';
        position: absolute;
        top: 28px;
        width: 1.25rem;
        height: 1.85rem;
        background: red;
        clip-path: polygon(50% 0%, 15% 100%, 85% 100%);
    }
    .wheel{
        position: relative;
        margin: auto 0;
        width: 35%;
        height: 60vh;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 0 0 0 5px #333;
        transition: transform 5s ease-in-out;
    }
    .wheel .number{
        position: absolute;
        width: 50%;
        height: 50%;
        background: var(--clr);
        transform-origin: bottom right;
        transform: rotate(calc(45deg * var(--i)));
        clip-path: polygon(0 0, 56% 0, 100% 100%, 0 56%);
        display: flex;
        justify-content: center;
        align-items: center;
        user-select: none;
        cursor: pointer;
    }
    .wheel .number span{
        position: relative;
        transform: rotate(45deg);
        font-size: 1.5rem;
        text-shadow: 3px 5px 2px rgba(0,0,0,0,15);
        font-weight: 700;
        color: white;
    }
    .wheel .number span::before{
        content: 'R';
    }

</style>
<body>
    <?php include('Header.php');?>
    <main>
        <section>
            <div class="container">
                <div class="roulette">
                    <div class="spinBtn">Spin</div>
                    <div class="wheel">
                        <div class="number" style="--i:1;--clr:#db7093;"><span>20</span></div>
                        <div class="number" style="--i:2;--clr:#20b2aa;"><span>1</span></div>
                        <div class="number" style="--i:3;--clr:#d63e92;"><span>5</span></div>
                        <div class="number" style="--i:4;--clr:#daa520;"><span>8</span></div>
                        <div class="number" style="--i:5;--clr:#ff330f;"><span>0</span></div>
                        <div class="number" style="--i:6;--clr:#ff7f50;"><span>3</span></div>
                        <div class="number" style="--i:7;--clr:#3cb371;"><span>0</span></div>
                        <div class="number" style="--i:8;--clr:#4169e1;"><span>4</span></div>
                    </div>
                </div>
                <div class="UserInfo">
                    <form>
                        <div class="comboSelector">
                            <select name="gender" required>
                                <option value="" hidden>Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <select name="provinces" required>
                                <option value="" hidden>Provinces</option>
                                <option value="Eastern Cape">Eastern Cape</option>
                                <option value="Free State">Free State</option>
                                <option value="Gauteng">Gauteng</option>
                                <option value="KwaZulu Natal">KwaZulu-Natal</option>
                                <option value="Limpopo">Limpopo</option>
                                <option value="Mpumalanga">Mpumalanga</option>
                                <option value="Northern Cape">Northern Cape</option>
                                <option value="North West">North West</option>
                                <option value="Western Cape">Western Cape</option>
                            </select>
                        </div>
                        <div class="EmailContainer">
                            <input id="EmailPlay" type="email" placeholder="Email Addr." required>
                        </div> 
                        <button name="btnPlay" id="btnPlay">Play</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include('footer.php');?>
    <script>
        let wheel = document.querySelector('.wheel');
        let spinBtn = document.querySelector('.spinBtn');
        let value = Math.ceil(Math.random() * 3600);
        let prizes = ["$1", "Nothing", "Nothing", "Nothing", "Nothing",     "Nothing", "Nothing", "Nothing"];

        spinBtn.onclick = function(){
            let value = Math.ceil(Math.random() * 3600);
            let PrizeIndex = Math.floor(Math.random() * prizes.length);

            wheel.style.transform = "rotate(" + value + "deg)";
            value += Math.ceil(Math.random() * 3600);
            
        
            setTimeout(function(){
                alert("You won " + 
                prizes[PrizeIndex] + ", share for more attempts");
            }, 4000);
        }

    </script>
</body>
</html>
