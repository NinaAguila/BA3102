<!DOCTYPE html>
<html lang="en">

<head>
    <title>Post Job</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="icon" href="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" type="image/x-icon">

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
                            window.location.href = 'job_board.php';
                        });
                    </script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
</body>

</html>