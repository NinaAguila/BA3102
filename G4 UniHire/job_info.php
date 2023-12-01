<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Information</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="icon" href="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" type="image/x-icon">

    <style>
        html, body {
            margin: 0;
            padding: 0;
            background: url('https://batstate-u.edu.ph/wp-content/uploads/2020/10/lipa-slider-1-scaled.jpg');
            background-size: cover;  
            background-position: center;  
            height: 100%;
            opacity: 0.9;
            font-family: 'Open Sans', sans-serif;
            background-attachment: fixed;
        }

        header {
            color: #fff;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
        }

        h1 {
            margin: 28px;
            position: absolute;
            top: 40px;
            left: 30px;
            text-align: center;
            font-family: 'Aclonica', sans-serif;
        }

        nav {
            background: linear-gradient(#420810, #D20808, #AA0808);
            padding: 20px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
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
            font-size: 20px; 
            font-weight: bold;
            margin-left: 20px; 
            font-family: 'Segoe UI', sans-serif;
        }

        .nav-item:hover {
            background-color: #FFFFFF;
            color: #02232F; 
        }

        .nav-item.profile,
        .nav-item.sign-out {
            float: right;
        }

        main {
            font-size: 15px;
            max-width: 800px;
            margin: 70px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: left;
            margin-bottom: 30px;
        }

        .about-us {
            padding: 40px;
            text-align: center;
        }

        .about-us h3 {
            font-size: 30px;
            color: #000000;
            font-family: 'OpenSans', sans-serif;
        }

        .search-container {
            display: flex;
            align-items: center;
            background: #fff;
            border: 1px solid #000000;
            border-radius: 10px;
            padding: 10px;
            width: 300px;
            margin: 0 auto;
        }

        .search-icon {
            color: #888;
            margin-right: 10px;
        }

        .search-box {
            border: none;
            outline: none;
            width: 100%;
        }

        .apply-button {
            height: 50px;
            width: 300px;
            margin-top: -100px;
            position: relative;
            background-color: #ffff;
            cursor: pointer;
            border: 1px solid #252525;
            overflow: hidden;
            border-radius: 30px;
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

          .apply-button:hover {
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

        .job-details {
            text-align: left;
            margin: 0 auto;
            width: 50%;
        }

        .job-detail {
            text-align: left;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1 style="color: #ffffff; font-family: 'Aclonica', sans-serif;">UniHire</h1>
    </header>

    <script>
        function redirectToApplicationForm(jobtitle) {
            window.location.href = 'apply_form.php?jobtitle=' + encodeURIComponent(jobtitle);
        }
    </script>

    <nav>
        <ul>
        <li><a class="nav-item" href="job_board.php">Back</a></li>
            <li><a class="nav-item" href="homepage.php">Home</a></li>
            <li><a class="nav-item" href="job_board.php">Find Jobs</a></li>
        </ul>
    </nav>

  
        <?php
            include("db.php");

            if (isset($_GET['jobtitle'])) {
                $jobTitle = $_GET['jobtitle'];

                $sql = "SELECT * FROM tbjobs WHERE jobtitle = '" . $jobTitle . "'";
                $result = $conn->query($sql);

                if ($result === false) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                } else {
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

                        $isJobFull = ($row['hiringstatus'] === 'Full');

                        $buttonClasses = 'apply-button type1';
                        $buttonText = 'Apply for this Job';
                        $buttonAttributes = '';

                        if ($isJobFull) {
                            $buttonClasses .= ' disabled';
                            $buttonText = 'Job Full';
                            $buttonAttributes = 'disabled="disabled" style="cursor: not-allowed;"';
                        }

                        echo "<main>";
                        echo "<div class='job-title-container' style='text-align: center; margin: 0 auto; width: 50%; background-color: #D20808; padding: 10px; border-radius: 25px;'>";
                        echo "<p class='job-title-text' style='font-size: 30px; font-weight: bold; color: #FFFFFF;'>{$row['jobtitle']}</p>";
                        echo "</div>";
                        echo "<div class='job-details' style='text-align: left; margin: 0 auto; width: 50%;'>";
                        echo "<p class='job-detail'><strong>DEPARTMENT</strong>: " . $row['departmentname'] . "</p>";
                        echo "<p class='job-detail'><strong>QUANTITY</strong>: " . $row['quantity'] . "</p>";
                        echo "<p class='job-detail'><strong>DATE POSTED</strong>: " . $row['dateposted'] . "</p>";
                        echo "<p class='job-detail'><strong>EDUCATION</strong>: " . $row['education'] . "</p>";
                        echo "<p class='job-detail'><strong>EXPERIENCE</strong>: " . $row['experience'] . "</p>";
                        echo "<p class='job-detail'><strong>EXPERTISE</strong>: " . $row['expertise'] . "</p>";
                        echo "<p class='job-detail'><strong>COMPETENCY</strong>: " . $row['competency'] . "</p>";
                        echo "<p class='job-detail'><strong>ELIGIBILITY</strong>: " . $row['eligibility'] . "</p>";
                        echo "<p class='job-detail'><strong>DUTIES AND RESPONSIBILITY</strong>: " . $row['dutres'] . "</p>";
                        echo "</div>";
                        echo "</main>";

                        echo "<section style='text-align: center; padding: 20px;'>";
                        echo "<a href='applicant_apply_form_page.php?jobtitle=" . urlencode($row['jobtitle']) . "&departmentname=" . urlencode($row['departmentname']) . "&dateposted=" . urlencode($row['dateposted']) . "' class='apply-job-button'>";
                        echo "<button class='$buttonClasses' $buttonAttributes onclick='redirectToApplicationForm(\"$jobTitle\")'>";
                        echo "<span class='btn-txt'>$buttonText</span>";
                        echo "</button>";
                        echo "</a>";
                        echo "</section>";
                    } else {
                        echo "No job details found for the provided job title.";
                    }
                }
            } else {
                echo "No job title provided.";
            }

            $conn->close();
            ?>

    

</body>
</html>