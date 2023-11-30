<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Details</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" type="image/x-icon">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('https://batstate-u.edu.ph/wp-content/uploads/2020/10/lipa-slider-1-scaled.jpg');
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }

        #jobDetails {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
            padding: 30px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: red;
          
            background-color: #fff;
            border-radius: 20px;
            padding: 15px;
            font-weight: bold;
        }

        .detail {
            width: 100%;
            margin-bottom: 20px;
        }

        .label {
            font-size: 25px;
            color: red;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .highlight {
            font-size: 18px;
            color: #000;
            text-align: left;
            margin: 0;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #000;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .back-link a:hover {
            color: #DD2220;
        }

        hr {
            margin: 15px 0;
            border: none;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div id="jobDetails">
    <?php
    session_start();
    include("db.php");

    if (isset($_GET['jobid'])) {
        $jobId = $_GET['jobid'];

        $sql = "SELECT * FROM tbjobs WHERE jobid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $jobId);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($row) {
                echo "<h1>JOB DETAILS</h1>";
                echoDetails("Job ID", $row['jobid']);
                echoDetails("Job Title", $row['jobtitle']);
                echoDetails("Department Name", $row['departmentname']);
                echoDetails("Quantity", $row['quantity']);
                echoDetails("Date Posted", $row['dateposted']);
                echoDetails("Education", $row['education']);
                echoDetails("Experience", $row['experience']);
                echoDetails("Expertise", $row['expertise']);
                echoDetails("Competency", $row['competency']);
                echoDetails("Eligibility", $row['eligibility']);
                echoDetails("Duties and Responsibilities", $row['dutres']);
                echoDetails("Hiring Status", $row['hiringstatus']);
             
                echo "<div class='back-link'><a href='admin_job_control_page.php'>Back</a></div>";
            }
        } else {
            echo "<p>Error fetching job details: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Job ID not provided.</p>";
    }

    $conn->close();

    function echoDetails($label, $value) {
        echo "<div class='detail'><p class='label'>$label</p><p class='highlight'>$value</p><hr></div>";
    }
    ?>
</div>

</body>
</html>
