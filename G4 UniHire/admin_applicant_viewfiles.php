<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Applicant Details</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('https://batstate-u.edu.ph/wp-content/uploads/2020/10/lipa-slider-1-scaled.jpg');
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }

        #applicantDetails {
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 600px;
            width: 100%;
            padding: 30px;
            box-sizing: border-box;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            color: #000000;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 40px;
        }

        h1 {
            text-align: center;
            width: 100%;
            margin-top: 0px;
            margin-bottom: 15px;
            color: #ffffff;
            border: 1px solid black;
            background-color: #DD2220;
            border-radius: 20px;
            padding: 15px;
            font-weight: bold;
        }

        .detail {
            flex-basis: calc(50% - 10px);
            margin-bottom: 15px;
        }

        .label {
            font-size: 17px;
            color: #000000;
            text-align: center;
            font-weight: bold;
        }

        .highlight {
            color: #007bff;
            border: 1px solid black;
            border-radius: 20px;
            padding: 5px;
            background-color: #DD2220;
            color: white;
            text-align: center;
        }

        h2 {
            width: 100%;
            margin-top: -10px;
            margin-left: 200px;
            font-weight: bold;
            
        }

        .download-links {
            margin-top: 10px;
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .download-links a {
            margin: 5px;
            padding: 10px;
            background-color: #DD2220;
            border: 1px solid black;
            color: #ffffff;
            text-decoration: none;
            border-radius: 40px;
            transition: background-color 0.3s;
            display: inline-block;
            width: 35%;
            box-sizing: border-box;
        }

        .download-links a:hover {
           
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            margin-left: 216px;
            padding: 10px;
            background-color: #DD2220;
            color: #ffffff;
            text-decoration: none;
            border: 1px solid black;
            border-radius: 40px;
            transition: background-color 0.3s;
            display: inline-block;
            width: 40%;
            box-sizing: border-box;
            margin-top: -5px;
            margin-bottom: 10px;
        }

        .back-link a:hover {
            
        }
    </style>
</head>
<body>

<div id="applicantDetails">
    <?php
    session_start();
    include("db.php");

    if (isset($_GET['appno'])) {
        $applicationNo = $_GET['appno'];

        $sql = "SELECT * FROM tbjobapplication WHERE appno = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $applicationNo);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($row) {
                echo "<h1>Applicant Details</h1>";
                echoDetails("Application ID", $row['appno']);
                echoDetails("Job Title", $row['jobtitle']);
                echoDetails("Name", "{$row['fname']} {$row['mname']} {$row['lname']}");
                echoDetails("Birthday", $row['birthday']);
                echoDetails("Gender", $row['gender']);
                echoDetails("Contact Number", $row['contactno']);
                echoDetails("Email Address", $row['emailadd']);
                echoDetails("Complete Address", $row['appadd']);
                echoDetails("Educational Background", $row['appeducation']);
                echoDetails("Eligibility", $row['appeligibility']);
                echoDetails("Work Experience", $row['appworkexp'], 'margin-left: 135px;');
                echo "<h2>Download Files</h2>";
                echo "<div class='download-links'>";
                echo "<a href='downloadFiles.php?file={$row['fileresume']}'>Download Resume</a>";
                echo "<a href='downloadFiles.php?file={$row['fileletter']}'>Download Cover Letter</a>";
                echo "<a href='downloadFiles.php?file={$row['filediploma']}'>Download Diploma</a>";
                echo "<a href='downloadFiles.php?file={$row['filecert']}'>Download Certificate</a>";
                echo "</div>";

                echo "<div class='back-link'><a href='admin_applicant_control_page.php'>Back</a></div>";
            } 
        } else {
            echo "<p>Error fetching applicant details: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Application number not provided.</p>";
    }

    $conn->close();

    function echoDetails($label, $value, $inlineStyle = '') {
        echo "<div class='detail' style='{$inlineStyle}'><p class='label'>$label:</p><p class='highlight'>$value</p></div>";
    }
    ?>
</div>

</body>
</html>
