<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Equipment Management System</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.cards {
    border-radius: 5px;
    background: #000000;
    padding: 20px;
    height: 120vh;
    display: flex;
    justify-content: center;
    align-items: center;
   
    flex-wrap: wrap; /* Added to allow cards to wrap to the next line */
}

.card {
    position: relative;
    width: 350px; /* Set a fixed width for the cards */
    height: 350px;
    margin: 40px; /* Add margin to provide spacing between cards */
    display: flex;
    justify-content: flex-start;
    align-items: center;
    transition: 0.5s;
    border-radius: 20px;
    transition-delay: 0.5s;
}

.card:hover {
    width: 350px; /* Keep the same width when hovered */
    transition-delay: 0.5s;
}

        .card .circle{
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card .circle::before{
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: #191919;
            border: 8px solid var(--clr);
            filter: drop-shadow(0 0 10px var(--clr)) drop-shadow(0 0 60px var(--clr));
            transition: 0.5s, background 0.5s;
            transition-delay: 0.75s, 1s;
        }
        .card:hover .circle::before{
            width: 100%;
            height: 100%;
            border-radius: 20px;
            background: var(--clr);
        }

        .card .circle .logo{
            position: relative;
            width: 250px;
            transition: 0.5s;
            transition-delay: 0.5s;
        }

        .card:hover .circle .logo{
            transform: scale(0);
            transition-delay: 0s;
        }
        .card .product_img{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0) rotate(-90deg);
            height: 300px;
            transition: 0.5s ease-in-out;
        }

        .card:hover .product_img{
            transition-delay: 0.75s;
            top: 50%;
            left: 72%;
            height: 350px;
            transform: translate(-50%, -50%) scale(1) rotate(0deg);
            
        }

        .card .content{
            position: relative;
            width: 50%;
            left: 20%;
            padding: 20px 20px 20px 40px;
            opacity: 0;
            transition: 0.5s;
            visibility: hidden;
        }

        .card:hover .content{
            transition-delay: 0.75s;
            opacity: 1;
            visibility: visible;
            left: 0;
        }

        .card .content h2{
            color: #fff;
            text-transform: uppercase;
            font-size: 1.5rem;
            line-height: 1em;
        }

        .card .content p{
            color: #fff;
            font-size: 11px;
            
        }

        .form_title {
            background: #023e8a;
            color: #fff;
            padding: 20px;
            margin-bottom: 10px;
            text-align: center;
            font-size: 25px;
            letter-spacing: 10px;
        }

                /* Responsive layout - when the screen is less than 600px wide */
        @media screen and (max-width: 600px) {
            .right-nav,
            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
            }
        }


    </style>

</head>

<body>
<p class="form_title">GET TO KNOW US!</p>
    <div class="cards">
            <div class="card">
                <div class="circle" style="--clr:#48cae4;">
                    <img src="/GameChanger_SEIS/about_us_img/irish_logo.png" class="logo">
                </div>
                <div class="content">
                    <h2>Irish Jane Alvarez</h2> <br>
                    <p>Hello, I'm Irish Jane Alvarez, an avid enthusiast in the world of innovation and technology. Exploring the possibilities of tomorrow with a passion for advancements. <br><br> Let's connect and explore together at alvarezirishjane07 <br> @gmail.com.🌐🚀</p>
                </div>
                <img src="/GameChanger_SEIS/about_us_img/irish_img.png" class="product_img">
            </div>

            <div class="card">
                <div class="circle" style="--clr:#48cae4;">
                    <img src="/GameChanger_SEIS/about_us_img/tiffa_logo.png" class="logo">
                </div>
                <div class="content"> 
                    <h2>Cyril Tiffany Katimbang</h2> <br>
                    <p>👋Hi Im Cyril Tiffany, programming enthusiast. I like languages like HTML, Python, Java and etc. <br> <br>
                        💻 If you want to collaborate with me you may send to this email <br> cyriltiffanykatimbang <br>@gmail.com</p>
                </div>
                <img src="/GameChanger_SEIS/about_us_img/tiffa_img.png" class="product_img">
            </div>

            <div class="card">
                <div class="circle" style="--clr:#48cae4;">
                    <img src="/GameChanger_SEIS/about_us_img/ericka_logo.png" class="logo">
                </div>
                <div class="content">
                    <h2>Ericka Mae Mindanao</h2> <br>
                    <p>Hello! I am Ericka Mae Mindanao, a code voyager exploring the world of code. <br><br> To know more about my details, you can send me a message at erickamindanao <br>@gmail.com</p>
                </div>
                <img src="/GameChanger_SEIS/about_us_img/ericka_img.png" class="product_img">
            </div>

            <div class="card">
                <div class="circle" style="--clr:#48cae4;">
                    <img src="/GameChanger_SEIS/about_us_img/mig_logo.png" class="logo">
                </div>
                <div class="content">
                    <h2>Juan Miguel Montealto</h2> <br>
                    <p>Hey there! I'm Juan Miguel Montealto, a tech aficionado navigating the realms of coding. Passionate about programming. <br><br> Feel free to reach out at 27miguelmontealto <br> @gmail.com and let's create something awesome! 💻🚀</p>
                </div>
                <img src="/GameChanger_SEIS/about_us_img/mig_img.png" class="product_img">
            </div>

            <div class="card">
                <div class="circle" style="--clr:#48cae4;">
                    <img src="/GameChanger_SEIS/about_us_img/ed_logo.png" class="logo">
                </div>
                <div class="content">
                    <h2>Edbert Plopenio</h2><br>
                    <p>🎩 Greetings, I go by the moniker Edbert Plopenio, a digital wanderer in the realm of code.
                        <br><br>
                        📬 If you wish to summon me from the digital ethers, you may do so at edbertplopenio <br>@gmail.com.</p>
                </div>
                <img src="/GameChanger_SEIS/about_us_img/ed_img.png" class="product_img">
            </div>
            
        </div>




</body>
</html>
