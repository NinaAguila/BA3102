<!DOCTYPE html>
<html lang="en">

<head>
    <title>Post Job</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="icon" href="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('https://batstate-u.edu.ph/wp-content/uploads/2020/10/lipa-slider-1-scaled.jpg');
            background-size: cover;
            background-position: center;
            height: 100%;
            opacity: 0.99;
            font-family: 'Segoe UI', sans-serif;
        }

        main {
            max-width: 1200px;
            margin: 40px auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            text-align: center;
            font-size: 18px;
        }

        form {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 30px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 20px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        nav {
            background-color: #f0f0f0;
            padding: 20px;
            margin-top: 20px;
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

        .nav-item.profile,
        .nav-item.sign-out {
            float: right;
        }
    </style>
</head>

<body>

<?php
    session_start();
    include "db.php";
    include "job_id.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $jobTitle = validate($_POST['jobtitle']);
        $departmentName = validate($_POST['departmentname']);
        $quantity = validate($_POST['quantity']);
        $education = validate($_POST['education']);
        $experience = validate($_POST['experience']);
        $expertise = validate($_POST['expertise']);
        $competency = validate($_POST['competency']);
        $eligibility = validate($_POST['eligibility']);
        $dutiesAndResponsibilities = validate($_POST['dutres']);
        $hiringStatus = validate($_POST['hiringstatus']);

        $jobId = generateJobID($conn);

        $datePosted = date("Y-m-d H:i:s");

        $sql = "INSERT INTO tbjobs (jobid, jobtitle, departmentname, quantity, dateposted, education, experience, expertise, competency, eligibility, dutres, hiringstatus)
                VALUES ('$jobId', '$jobTitle', '$departmentName', '$quantity', '$datePosted', '$education', '$experience', '$expertise', '$competency', '$eligibility', '$dutiesAndResponsibilities', '$hiringStatus')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                        Swal.fire({
                            position: 'center',
                            title: 'New Job Posted!',
                            icon: 'success',
                            showConfirmButton: true
                        }).then(() => {
                            window.location.href = 'admin_job_control_page.php';
                        });
                    </script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>

<nav>
        <ul>
        <li><a class="nav-item" href="admin_job_control_page.php">Back</a></li>
            <li><a class="nav-item" href="admin_job_post.php">Home</a></li>
        </ul>
    </nav>

<main>

<form action="admin_job_post.php" method="post">

    <label for="jobtitle">Job Title:</label>
    <input type="text" name="jobtitle" required>

    <label for="departmentname">Department Name:</label>
    <select id="departmentname" name="departmentname" class="form-control" required>
        <?php
        include("db.php");
        $sqlDept = "SELECT * FROM tbdepartment";
        $resultDept = $conn->query($sqlDept);

        if ($resultDept === false) {
            die("Error: " . $conn->error);
        }

        while ($rowDept = $resultDept->fetch_assoc()) {
            echo "<option value='{$rowDept['deptname']}'>{$rowDept['deptname']}</option>";
        }
        ?>
    </select>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" required>

    <label for="education">Education:</label>
    <input type="text" name="education" required>

    <label for="experience">Experience:</label>
    <input type="text" name="experience" required>

    <label for="expertise">Expertise:</label>
    <input type="text" name="expertise" required>

    <label for="competency">Competency:</label>
    <input type="text" name="competency" required>

    <label for="eligibility">Eligibility:</label>
    <input type="text" name="eligibility" required>

    <label for="dutres">Duties and Responsibilities:</label>
    <textarea name="dutres" required></textarea>

    <label for="hiringstatus">Hiring Status:</label>
    <select name="hiringstatus" required>
        <option value="Full">Full</option>
        <option value="Active">Active</option>
    </select>

    <input type="submit" value="Submit">
</form>
</main>

</body>

</html>