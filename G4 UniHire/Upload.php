<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="icon" href="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" type="image/x-icon">

</head>

<body>
    <?php
    session_start();
    include("db.php");
    include('apply_number.php');
    include('file_upload.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jobTitle = $_POST['jobtitle'];
        $fName = $_POST['fname'];
        $mName = $_POST['mname'];
        $lName = $_POST['lname'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $contactNum = $_POST['contactno'];
        $emailAdd = $_POST['emailadd'];
        $compAdd = $_POST['appadd'];
        $education = $_POST['education'];
        $eligibility = $_POST['eligibility'];

        
            if (isset($_POST['workExp']) && !empty($_POST['workExp'])) {
                $workExp = $_POST['workExp'];
        
                $applicationNumber = generateApplicationNumber($fName, $lName);
        
                $uploadDir = "attachments/";
        
                $uploadedFiles = uploadPDFFiles($uploadDir, 2 * 1024 * 1024);
        
                if (count($uploadedFiles) === 4) {
        
                    $currentDateTime = date("Y-m-d H:i:s");
        
                    $sql = "INSERT INTO tbjobapplication (appno, jobtitle, fname, mname, lname, birthday, gender, contactno, emailadd, appadd, appeducation, appeligibility, appworkexp, fileresume, fileletter, filediploma, filecert, appdate)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
                    $stmt = $conn->prepare($sql);
                    if ($stmt === false) {
                        die("Error: " . $conn->error);
                    }
        
                    $stmt->bind_param('ssssssssssssssssss', $applicationNumber, $jobTitle, $fName, $mName, $lName, $birthday, $gender, $contactNum, $emailAdd, $compAdd, $education, $eligibility, $workExp, $uploadedFiles[0], $uploadedFiles[1], $uploadedFiles[2], $uploadedFiles[3], $currentDateTime);
        
                    if ($stmt->execute()) {
                        echo "<script>
                            Swal.fire({
                                position: 'center',
                                title: 'Application Submitted',
                                html: 'Please remember your application number: <strong>$applicationNumber</strong> and email address: <strong>$emailAdd</strong> <br> for checking the status of your application. <br> Thank you!',
                                icon: 'success',
                                showConfirmButton: true
                            }).then(() => {
                                window.location.href = 'job_board.php';
                            });
                        </script>";
                        exit();
                    } else {
                        echo "<script type='text/javascript'> alert('Error: " . $stmt->error . "')</script>";
                    }
        
                    $stmt->close();
                    $conn->close();
                } else {
                    echo "<script type='text/javascript'> alert('Error Uploading Files')</script>";
                }
            }
        }

        
    ?>
</body>

</html>
