<!DOCTYPE html>
<html lang="en">
<head>
    <title>Homepage</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" type="image/x-icon">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            background: url('https://batstate-u.edu.ph/wp-content/uploads/2020/10/lipa-slider-2.jpg');
            background-size: cover;  
            background-position: center;  
            height: 100%;
            opacity: 0.9;
            background-attachment: fixed;
        }

        header {
            background-color: #ffffff;
            color: #fff;
            text-align: left;
            margin-top: 20px;
        }

        h1 {
            margin: 10px;
            position: absolute;
            top: 30px;
            left: 30px;
            text-align: center;
        }

        nav {
            background-color: #cfcfcf;
            padding: 40px;
            background: linear-gradient(#420810, #D20808, #AA0808);
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav li {
            display: inline;
            margin: 0 10px;
        }

        .nav-item {
            display: inline-block;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color .3s; 
            color: #FFFFFF; 
            margin-left: 20px; 
            font-size: 16px; 
            font-weight: bold;
            font-family: 'OpenSans', sans-serif;
        }

        .nav-item:hover {
            background-color: #FFFFFF;
            color: #02232F;
        }
        
        .fa-user-group {
            border-radius: 50%;
            height: 35px;
            width: 35px;
            background-color: #840808;
            padding: 8px;
            color: #ffffff;
            font-size: 30px;
            margin-left: 1300px;
            margin-top: -64px;
            position: absolute;
        }

        .fa-briefcase {
            border-radius: 50%;
            height: 35px;
            width: 35px;
            background-color: #840808;
            padding: 8px;
            color: #ffffff;
            font-size: 35px;
            margin-left: 1400px;
            margin-top: -64px;
            position: absolute;
        }
        .fa-check {
            border-radius: 50%;
            height: 35px;
            width: 35px;
            background-color: #840808;
            padding: 8px;
            color: #ffffff;
            font-size: 35px;
            margin-left: 1500px;
            margin-top: -64px;
            position: absolute;
        }

        #first-main {
            margin: auto;
            margin-top: 150px;
            background-color: rgba(255, 255, 255, 1); 
            width: 1000px;
            height: 400px;
            padding: 100px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            border: 1px solid rgb(0, 0, 0);
        }
        #sec-main {
            margin-left: 550px;
            margin-top: -20px;
            background-color: rgba(255, 255, 255, 1);
            width: 500px;
            height: 700px;
            padding: 100px;
            border-radius: 80px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            border: 1px solid rgb(0, 0, 0);
        }

        #second-main {
            margin-left: 150px;
            margin-top: 50px;
            background-color: rgba(255, 255, 255); 
            width: 51px;
            height: 51px;
            padding: 100px;
            border-radius: 5px;
            text-align: center;
            border: 1px solid rgb(0, 0, 0);
            margin-left: 400px;
        }

        #second-main pre {
            margin-top: 15px; 
            margin-left: -115px; 
            margin-right: 400px;
            font-size: 18px;
            font-weight: bold; 
        }

        #third-main {
            margin: auto;
            margin-top: -250px;
            background-color: rgba(255, 255, 255, 0.9); 
            width: 51px;
            height: 51px;
            padding: 100px;
            border-radius: 5px;
            text-align: center;
            border: 1px solid rgb(0, 0, 0);
            margin-left: 770px;
        }

        #third-main pre {
            margin-top: 15px; 
            margin-left: -110px; 
            font-size: 18px;
            font-weight: bold; 
        }

        #fourth-main {
            margin-left: 1448px;
            margin-top: -250px;
            background-color: rgba(255, 255, 255, 0.9); 
            width: 51px;
            height: 51px;
            padding: 100px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            border: 1px solid rgb(0, 0, 0);
            margin-left: 1170px;
        }

        #fourth-main pre {
            margin-top: 15px; 
            margin-left: -105px; 
            font-size: 18px;
            font-weight: bold; 
        }
        

        #fifth-main {
            margin-left: 476px;
            margin-top: 100px;
            background-color: rgba(255, 255, 255, 0.9); 
            width: 51px;
            height: 51px;
            padding: 100px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            border: 1px solid rgb(0, 0, 0);
            margin-left: 600px;
        }

        #fifth-main pre {
            margin-top: 10px; 
            margin-left: -85px; 
            font-size: 16px;
            font-weight: bold; 
        }

        #sixth-main {
            margin-left: 1125px;
            margin-top: -255px;
            background-color: rgba(255, 255, 255, 0.9); 
            width: 51px;
            height: 51px;
            padding: 100px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            border: 1px solid rgb(0, 0, 0);
            margin-left: 970px;
        }

        #sixth-main pre {
            margin-top: 13px; 
            margin-left: -95px; 
            font-size: 20px;
            font-size: 16px;
            font-weight: bold; 
        }
        
        footer {
            background-color: #000000;
            color: #ffffff;
            text-align: center;
            width: 100%;
            margin-top: 120px;
            font-size: 27px;
            display: flex;
            align-items: center;
            height: 300px; 
            bottom: 0;
        }

        footer img {
            width: 165px; 
            height: auto; 
            margin-left: 455px; 
            margin-top: 1px
        }

        footer pre {
            text-align: left; 
            margin-left: 10px; 
            margin-top: 95px;
        }

        .fa-solid.fa-address-book {
            color: red;
            font-size: 35px;
            position: relative;
            top: -55px; 
            margin-left: 70px;
        }

        .fa-solid.fa-phone {
            color: red;
            font-size: 35px;
            position: relative;
            top: 8px; 
            margin-left: -30px;
        }
        
        .fa-solid.fa-at {
            color: red;
            font-size: 35px;
            position: relative;
            top: 70px; 
            margin-left: -37px;
        }

        img.logo {
            width: 80px;
            height: auto;
            margin-right: 10px;
            margin-top: -40px;
            margin-left: 55px
        }

        .red-background {
            background-color: rgba(255, 0, 0, 0.3); 
            padding: 50px; 
            border-radius: 8px;
            height: 914px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
            margin-top: 118px; 
        }
        .white-background {
            background-color: rgba(255, 255, 255, 1); 
            padding: 50px; 
            border-radius: 8px; 
            height: 850px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
            margin-top: -61px; 
        }

        .custom-link {
            text-decoration: none;
            color: #000;
            transition: background-color 0s ease; 
        }

        .custom-link:hover {
            color: red;
            font-weight: bold; 
            background-color: pink; 
            animation: clickAnimation 0s ease-in-out; 
        }

        .custom-link.clicked {
            color: red; 
            font-weight: bold;
            background-color: red; 
            animation: clickAnimation 0s ease-in-out; 
        }

        @keyframes clickAnimation {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

    </style>
</head>
<body>
    <header style="text-align: center; margin-left: 500px;">
        <h1 style="color: #ffffff; font-family: 'Aclonica', sans-serif; margin-top: 13px; margin-left: 700px;">UniHire Job Portal</h1>
    </header>

    <nav>
    
    </nav>

    <a href="admin_login_page.php" class="icon-link">
        <i class="fas fa-user-group"></i>
    </a>

    <a href="job_board.php" class="icon-link">
        <i class="fas fa-briefcase"></i>
    </a>

    <a href="check_status.php" class="icon-link">
        <i class="fas fa-check"></i>
    </a>

    <main id="first-main">
    <a href="https://batstate-u.edu.ph/campuses/lipa/" target="_blank">
    <img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" alt="BSU Logo" class="logo">
    </a>

    <h2 style="color: red; font-family: sans-serif; font-size: 26px;">UniHire Job Portal <br> Batangas State University TNEU Lipa Campus</h2>
    <p style="text-indent: 80px; text-align: justify;  font-size: 22px; line-height: 2; font-family: sans-serif;">UniHire Job Portal provides a platform for job seekers and employers to connect. Whether you are looking for a new job opportunity or searching for qualified candidates, our portal has you covered.
    Job seekers can explore a variety of job listings, submit applications, and track their application status. Employers can post job openings, review applications, and find the perfect match for their team.
    Join UniHire Job Portal today and take the next step in your career journey or find the ideal candidate for your organization.</p>
    </main>

    <div class="red-background">

    <main id="sec-main">
        <h2 style="color: red; font-family: sans-serif; font-size: 26px; margin-left: 22px; margin-top: -70px; ">DEPARTMENTS <br></h2>
        <p style="text-indent: -30px; text-align: justify; font-size: 22px; line-height: 2; font-family: sans-serif;">
        <a href="accounting.php" style="text-decoration: none; color: #000; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this);">
    <u>Accounting Office</u>
    </a>
            <br>
            <a href="cabe.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>College of Accountancy, Business and Economics</u>
            </a>
            <br>
            <a href="caf.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>College of Agriculture and Forestry</u>
            </a>
            <br>
            <a href="cas.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>College of Arts and Sciences</u>
            </a>
            <br>
            <a href="ceafa.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>College of Engineering, Architecture and Fine Arts</u>
            </a>
            <br>
            <a href="cit.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>College of Industrial Technology</u>
            </a>
            <br>
            <a href="cics.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>College of Informatics and Computing Sciences</u>
            </a>
            <br>
            <a href="conr.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>College of Nursing</u>
            </a>
            <br>
            <a href="cond.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>College of Nutrition and Dietetics</u>
            </a>
            <br>
            <a href="cte.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>College of Teacher Education</u>
            </a>
            <br>
            <a href="eao.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>External Affairs Office</u>
            </a>
            <br>
            <a href="hs.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>Health Services</u>
            </a>
            <br>
            <a href="hrm.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>Human Resource Management Office</u>
            </a>
            <br>
            <a href="icts.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>ICT Services</u>
            </a>
            <br>
            <a href="ls.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>Library Services</u>
            </a>
            <br>
            <a href="ogc.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>Office of the Guidance and Counseling</u>
            </a>
            <br>
            <a href="ro.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>Registrar's Office</u>
            </a>
            <br>
            <a href="tao.php" style="text-decoration: none; color: #000; margin-left: -28px; font-size: 19px;" class="custom-link" onclick="toggleHighlight(this)">
            <u>Testing and Admission Office</u>
            </a>
        </p>

        <script>
            function toggleHighlight(link) {
                link.classList.toggle("clicked");
            }
        </script>
    </main>

    </div>

    <div class="white-background" >

    <h3 style="text-align: center; font-weight: bold; color: red; font-size: 28px; font-family: sans-serif;"> <br> 
    <a href="team.php" style="color: red;">DEVELOPERS</h3></a>

    <main id="second-main">
    <a href="https://github.com/karatienza" target="_blank">
        <img src="team-pics/kate.jfif" alt="Kate Andrei Atienza" width="250" height="250" style="margin-right: 10px; margin-left: -100px; margin-top: -98px; opacity: 1; margin-bottom: 15px;">
    </a>
    <span style="background-color: yellow; padding: 7px; font-size: 18px; margin-left: -60px;">KateAndreiAtienza</span>
    </main>


    <main id="third-main">
    <a href="https://github.com/dheacomia" target="_blank">
    <img src="team-pics/dhea.jpeg" alt="Maria Andrea Comia" width="250" height="250" style="margin-right: 10px; margin-left: -100px; margin-top: -98px; margin-bottom: 15px;">
    </a>   
    <span style="background-color: yellow; padding: 7px; font-size: 18px; margin-left: -60px;">MariaAndreaComia</span> 
    </main>

    <main id="fourth-main">
    <a href="https://github.com/Jengwrasck" target="_blank">
    <img src="team-pics/jello.png" alt="Jello Mari Garcia" width="250" height="250" style="margin-right: 10px; margin-left: -100px; margin-top: -98px; margin-bottom: 15px;">
    </a>       
    <span style="background-color: yellow; padding: 7px; font-size: 18px; margin-left: -60px;">JelloMariGarcia</span> 
    </main>

    <main id="fifth-main">
    <a href="https://github.com/solaceyy" target="_blank">
    <img src="team-pics/gube.jpg" alt="Don Daniell Gube" width="250" height="250"  style="margin-right: 10px; margin-left: -100px; margin-top: -98px; margin-bottom: 15px;">
    </a>
    <span style="background-color: yellow; padding: 7px; font-size: 18px; margin-left: -60px;">DonDaniellGube</span> 
    </main>

    <main id="sixth-main">
    <a href="https://github.com/carlaeliiza" target="_blank">
    <img src="team-pics/carla.png" alt="Carla Eliza Villanueva" width="250" height="250" style="margin-right: 10px; margin-left: -100px; margin-top: -98px; margin-bottom: 15px;">
    </a> 
    <span style="background-color: yellow; padding: 7px; font-size: 18px; margin-left: -60px;">CarlaElizaVillanueva</span> 
    </main>

    </div>

    <footer>
    <a href="https://batstate-u.edu.ph/" target="_blank">
    <img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" alt="University Photo">
    </a>
    <pre style="margin: 30px -10px;">    Batangas State University TNEU
    Lipa City Campus
    <span style="font-size: 17px;">Marauoy Road, Lipa City, Batangas</span>
    </pre>

    
    <a href="https://batstate-u.edu.ph/contact-us/" target="_blank">
    <i class="fa-solid fa-address-book"></i>
    </a>
    <a href="https://batstate-u.edu.ph/contact-us/" target="_blank">
        <i class="fa-solid fa-phone"></i>
    </a>
    <a href="https://batstate-u.edu.ph/contact-us/" target="_blank">
        <i class="fa-solid fa-at"></i>
    </a>

    <p style="margin-left: 30px; margin-top: -80px; font-size: 20px;"> <strong>HR</strong> : 425-0139 <i> local number </i>3112</p>
    <p style="margin-left: -272px; margin-top: 35px; font-size: 20px;"><strong>OUP</strong> : 425-0139 <i> local number </i>1546</p>
    <p style="margin-left: -290px; margin-top: 165px; font-size: 20px; "><i>hrmo.lipa@g.batstate-u.edu.ph</i></p>
   
</footer>

</body>
</html>
