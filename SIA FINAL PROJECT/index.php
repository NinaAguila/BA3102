<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BSU_TNEU-Student Conduct Management System</title>
    <meta name="description" content="Student Conduct Management System">
    <link rel="icon" href="img/BSULogo.png" sizes="32x32" type="image/png">
    <!-- custom.css -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- font-awesome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    
    <!-- AOS -->
    <link rel="stylesheet" href="css/aos.css">
</head>

<body>
    <!--PreLoader-->
    <div id="preloader"></div>

    <!-- banner -->
    <div class="jumbotron jumbotron-fluid" id="banner" style="background-image: url(img/Banner.png);">
        <div class="container text-center text-md-left">
            <header>
                <div class="row justify-content-between">
                    <div class="col-2">
                        <img src="img/BSULogo.png" alt="logo">
                    </div>
                    <div class="col-md-4 align-self-center text-md-right">
                    <a class="text-white lead">Batangas State University <br> The National Engineering University</a>
                    </div>
                    
                </div>
            </header>
            <h1 data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="display-3 text-white font-weight-bold my-5">
            	Student Conduct<br>
            	Management System
            </h1>
            <p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="lead text-white my-4">
                A student conduct management system for the Office of the Student Discipline
                <br> of Batangas State University The National Engineering University. 
            </p>
            <a href="login.php" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="btn my-4 font-weight-bold scms-cta cta-white">Get Started</a>
        </div>
    </div>
    <!-- about -->
    <div class="container my-5 py-2">
        <h2 class="text-center font-weight-bold my-5">About </h2>
        <div class="row">
            <div data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center">
                <img src="img/OSD  Icon.png" alt="Phishing Detect" class="mx-auto">
                <h4>Student Discipline Office</h4>
                <p class = 'justify'> The Office of Student Discipline is anchored on the principle of self-respect, 
                    acceptance of legitimate authority, and respect for the rights of others and nurtures a 
                    strong sense of self-discipline in the student to provide peace and harmony, unity and 
                    cooperation necessary in a healthy school environment.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center">
                <img src="img/Handbook Icon.png" alt="Phishing Detect" class="mx-auto">
                <h4>Student Handbook</h4>
                <p class="justify">A student handbook is a written document or guide provided by educational institutions, 
                   such as schools, colleges, or universities, to inform students about their rights, responsibilities,
                    and the policies and procedures that govern their academic and social life within the institution. Student Handbook:
                    <a href="https://batstate-u.edu.ph/sites/files/osas/manuals/OSD%20manual%20FINAL.pdf" target="_blank">BSU_TNEUHandbook.com</a></p>
            </div>
            <div data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center">
                <img src="img/OSD Goal Icon.png" alt="Smart Scan" class="mx-auto">
                <h4>OSD Goals</h4>
                <p class="justify">the Office of the Student Discipline (OSD) aims to cultivate a strong sense of self-discipline 
                    within the students in a health university environment through disciplinary procedures which 
                    are in line with the vision and mission of the university.</p>
            </div>
        </div>
    </div>
    <!-- contact -->
    <div class="jumbotron jumbotron-fluid" id="contact" style="background-image: url(img/footer.png);">
        <div class="container my-5">
            <div class="row justify-content-between">
                <div class="col-md-6 text-black">
                    <h2 class="font-weight-bold">Contact Us</h2>
                    <p class="my-4">
                        If you have other question, you can contact us to the following websites
                    </p>
                    <ul class="list-unstyled">
                        <li>Email : osd.lipa@g.batstate-u.edu.ph</li>
                        <li>Facebook : OSD BatStateULipa</li>
                        <li>Address : A. Tanco Drive, Marawoy, Lipa, Batangas</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

	<!-- copyright -->
	<div class="jumbotron jumbotron-fluid" id="copyright">
        <div class="container">
            <div class="row justify-content-between">
            	<div class="col-md-6 text-white align-self-center text-center text-md-left my-2">
                    Copyright © 2023 Batangas State University The NEU
                </div>
                <div class="col-md-6 align-self-center text-center text-md-right my-2" id="social-media">
                    <a href="#" class="d-inline-block text-center ml-2">
                    	<i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="d-inline-block text-center ml-2">
                    	<i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="d-inline-block text-center ml-2">
                    	<i class="fa fa-medium" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="d-inline-block text-center ml-2">
                    	<i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- AOS -->
    <script src="js/aos.js"></script>
    <script>
      AOS.init({
      });
    </script>

<script>
        var loader = document.getElementById("preloader");

        window.addEventListener("load",function(){
            loader.style.display = "none";
        })
</script>
</body>

</html>