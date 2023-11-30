<?php
session_start();

// Unset specific session variables
unset($_SESSION['appno']);
unset($_SESSION['emailadd']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Applicant Status</title>

    <link rel="icon" href="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" type="image/x-icon">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    
    <style>
html, body {
    margin: 0;
    padding: 0;
    background: url('https://batstate-u.edu.ph/wp-content/uploads/2020/10/lipa-slider-1-scaled.jpg');
    background-size: cover;  
    background-position: center;  
    height: 100%;
    opacity: 0.9;
    background-attachment: fixed;
}


header {
    background-color: #f0f0f0;
    color: #fff;
    text-align: center;
    margin-top: 20px;
}

h1 {
    margin: 10px;
    position: absolute;
    top: 40px;
    left: 30px;
    text-align: center;
}

nav {
    background-color: #cfcfcf;
    padding: 20px;
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
    font-size: 20px; 
    font-weight: bold;
    font-family: 'Segoe UI', sans-serif;
}

.nav-item:hover {
    background-color: #FFFFFF;
    color: #02232F;
} 


main {
    max-width: 600px;
    margin: 100px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 45px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
}

.about-us {
    padding: 40px;
    text-align: center;
}

.about-us h3 {
    font-size: 30px;
    color: #ff0000;
    font-family: 'OpenSans', sans-serif;
}

.textbox-container {
    text-align: center;
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.textbox {
    width: 300px;
    height: 30px;
    padding: 5px;
    font-size: 16px;
    margin: 10px;
    text-align: center;
    display: block;

}


.registration-text {
    font-size: 14px;
    color: #333;
    margin-top: 10px;
}

.sign-up-button {
    width: 150px;
    height: 35px;
    background-color: #000000;
    color: #fff;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 0px 0px 25px 0px;
    text-align: center;
    line-height: 35px;
    text-decoration: none;
    display: inline-block;
}

.registration-text {
    font-size: 18px;
    color: #333;
    margin-top: 20px;
    margin-bottom: 25px; 
}


.login-button {
  height: 50px;
  width: 200px;
  margin-top: 5px;
  position: relative;
  background-color: transparent;
  cursor: pointer;
  border: 1px solid #252525;
  overflow: hidden;
  border-radius: 10px;
  color: #333;
  transition: all 0.5s ease-in-out;
}

.btn-txt {
  z-index: 1;
  font-weight: 800;
  letter-spacing: 4px;
}

.type1::after {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  transition: all 0.5s ease-in-out;
  background-color: #333;
  border-radius: 30px;
  visibility: hidden;
  height: 10px;
  width: 10px;
  z-index: -1;
}

.login-button:hover {
  box-shadow: 1px 1px 10px #252525;
  border: none;
  background-color: #D20808;
  color: #ffffff;
}

.type1:hover::after {
  visibility: visible;
  transform: scale(1.5) translateX(2px);
  background-color: #073141;
}
#logo {
            width: 90px; /* Adjust the width as needed */
            height: auto;
            margin-right: 10px;
            margin-top: 10px;
            margin-left: 55px;
            margin-bottom: -60px;
        }
</style>
</head>
      
</head>
<body>
    

    <header>
    </header>

    <nav>
        <ul>
            <li><a class="nav-item" href="homepage.php">Home</a></li>
            <li style="text-align: center; color: white; font-family: 'Aclonica'; font-size: 30px;">UniHire Job Portal</li>
            <li><a class="nav-item" href="job_board.php">Find jobs</a></li>
        </ul>
    </nav>

    <h4>
    <a href="https://batstate-u.edu.ph/campuses/lipa/" target="_blank">
    <img id="logo" src="https://edurank.org/assets/img/uni-logos/batangas-state-university-logo.png" alt="University Logo">
    </a>
    </h4>


    <main>
    <h2 style="color: #000000; font-family: 'Aclonica', sans-serif; font-size: 20px;">APPLICATION STATUS</h2>
    

    
    <p style="text-align: center;">Please input <strong>Application Number</strong> and <strong>Email Address</strong> to Login to your account.</p>

    <form action="applicant_status_page.php" method="post">
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error']; ?> </p>
            <?php } ?>

            
    
    <div class="textbox-container">
        <input type="text" class="textbox" name="appno" placeholder="Application Number" required>
        <input type="text" class="textbox" name="emailadd" placeholder="Email Address" required>
        <button type="submit" name="submit" class="login-button type1">
            <span class="btn-txt">View Status</span>
        </button>
    </div>
</form>








   
</body>
</html>