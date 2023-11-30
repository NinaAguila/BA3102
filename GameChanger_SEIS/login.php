<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $enteredPassword = $_POST["passwordHash"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM users WHERE userName=?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $userName);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Verify entered password against hashed password in the database
            if (password_verify($enteredPassword, $row["passwordHash"])) {
                // Passwords match, proceed with login

                // Log the login event in the database
                $event_type = 'login';
                $timestamp = date('Y-m-d H:i:s');
                $userRole = $row["userRole"];

                // Set the time zone to 'Asia/Manila' (Philippine time)
                date_default_timezone_set('Asia/Manila');

                $timestamp = date('Y-m-d H:i:s'); // Adjusted to Philippine time
                // Rest of the code to log the event

                $insert_log_query = "INSERT INTO login_logout_log (username, userRole, event_type, timestamp) VALUES (?, ?, ?, ?)";
                $insert_log_stmt = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($insert_log_stmt, $insert_log_query)) {
                    mysqli_stmt_bind_param($insert_log_stmt, "ssss", $userName, $userRole, $event_type, $timestamp);
                    mysqli_stmt_execute($insert_log_stmt);
                }

                // Set session variables
                $_SESSION["userName"] = $userName;
                $_SESSION["userRole"] = $userRole;
                $_SESSION["empid"] = $row['empid'];

                // Respond with success JSON
                header('Content-Type: application/json');
                echo json_encode(['success' => true]);
                exit;
            } else {
                // Passwords do not match, send a JSON response indicating failure
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'error' => 'Incorrect password']);
                exit;
            }
        } else {
            // Send a JSON response indicating failure
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'error' => 'User not found']);
            exit;
        }
    } else {
        echo "Query preparation failed: " . mysqli_error($conn);
    }
}

// Close the database connection when done
mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <title>Login</title>

    <style>
        /**Poppins Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        *{
            font-family: 'Poppins';
        }



        .title{
        font-size: 35px;
        position: relative;
        display: inline-block;
        padding-left: 15px;
        top: 19px;   
        line-height: 40px;
        padding-bottom: 8px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .title::before{
            content: '';
            width: 9px;
            height: 100px;
            display: block;
            background-color: #023e8a;
            position: absolute;
            left: -6px;
            top: 5px;
        }
        
        .subtitle {
            font-size: 12px;
            text-align: left;
            padding-bottom: 35px;
            padding-left: 15px;
        }
        
        .wrapper{
            background: #dbf5fa;
            padding: 0 20px 0 20px;
        }
        .main{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .row{
            width: 900px;
            height: 550px;
            border-radius: 10px;
            background: #fff;
            box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0); 
        }
        .side-image{
            background-image: url(login_home_img/Sports\ equipment\ Inventory\ system.gif);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 10px 0 0 10px;

        }
        img{
            width: 55px;
            position: absolute;
            top: 30px;
            right: 30px;
        }
        .right{
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .input-box{
            width: 330px;
            box-sizing: border-box;
        }

        .input-box header{
            font-weight: 700;
            text-align: center;
            margin-bottom: 45px;
        }
        .input-field{
            display: flex;
            flex-direction: column;
            position: relative;
            padding: 0 10px 0 10px;
        }
        .input{
            height: 45px;
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            outline: none;
            margin-bottom: 20px;
            color: #40414a;
        }
        .input-box .input-field label{
            position: absolute;
            top: 10px;
            left: 10px;
            pointer-events: none;
            transition: .5s;
        }
        .input-field .input:focus ~ label{
            top: -10px;
            font-size: 13px;
        }

        .input-field .input:valid ~ label{
            top: -10px;
            font-size: 13px;
            color: #5d5076;
        }
       
        .input-field .input:focus, .input-field .input:valid{
            border-bottom: 1px solid #023e8a;
        }
        .submit{
            border: none;
            outline: none;
            height: 45px;
            background: #ececec;
            border-radius: 5px;
            transition: .4s;
        }

        .submit:hover{
            background: #023e8a;
            color: #fff;
        }
    </style>
  
</head>

  <body>
<form action="login.php" method="post">
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                <!--Image-->
                <div class="text">
                    
                </div>
            </div>
            <div class="col-md-6 right">
                <img src="images/bsulogo.png" alt="">
                <div class="input-box">
                    <p class="title">Sports Equipment <br> Inventory System</p>
                    <p class="subtitle">Batangas State University TNEU Lipa Campus</p>
                    <div class="input-field">
                        <input type="text" name="userName" class="input" id="userName" required autocomplete="off">
                        <label for="userName">Username</label>
                    </div>

                    <div class="input-field">
                        <input type="password" name="passwordHash" class="input" id="passwordHash" required>
                        <label for="passwordHash">Password</label>
                    </div>

                    <div class="input-field">
                        <input type="submit" value="Submit" class="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>
</form>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Your existing HTML code here -->

<script>
document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector('form');

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    // Use fetch to send a request to the server
    fetch(form.action, {
      method: form.method,
      body: new URLSearchParams(new FormData(form)),
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // If login successful, show success message
        Swal.fire({
          icon: 'success',
          title: 'Good job!',
          text: 'Login successful!',
        }).then(() => {
          // Redirect to index.php
          window.location.href = 'index.php';
        });
      } else {
        // If login fails, show an alert message
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Username or password incorrect!',
        });
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
});

</script>

  </body>
</html>