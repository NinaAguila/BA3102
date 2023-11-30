<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job View and Update</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        .title-container {
            max-width: 350px;
            text-align: center;
            margin: 70px auto 20px;
            background: #fafeff;
            padding: -9px;
            border-radius: 45px;
        }

        h2 {
            color: red;
            text-align: center;
            margin-top: 70px;
            font-weight: bold;
            font-family: times new roman;
            font-size: 45px;
            margin-bottom: 0px;
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
            max-width: 1400px;
            margin: 100px auto; 
            background: #fafeff;
            padding: 10px;
            border-radius: 45px;
            text-align: center;
            margin-top: 70px;
        }

        .table {
        }

       
        .btn-row {
            display: flex;
            justify-content: space-around;
        }

        .btn-row button {
            margin: 10px;
        }

        .table {
        }

        th {
            color: red;
        }

    </style>
</head>
<body>

<nav>
    <ul>
    <li><a class="nav-item" href="admin_home_page.php">Back</a></li>
        <li><a class="nav-item" href="admin_job_post.php">Post Job</a></li>
    </ul>
</nav>

<div class="title-container">
    <h2>JOBS LIST</h2>
</div>

<main>

        <table class="table">
            <thead>
                <tr>
                    <br>
                    <br>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>

                <?php
                    include("db.php");

                    $sql = "SELECT * FROM tbjobs ORDER BY jobid";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        die("Error: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='output-row'>
                            <td class='align-middle'>{$row['jobid']}</td>
                            <td class='align-middle'>{$row['jobtitle']}</td>
                            <td class='align-middle'>{$row['departmentname']}</td>
                            <td class='align-middle'>{$row['quantity']}</td>
                            <td class='align-middle'>{$row['hiringstatus']}</td>
                            <td class='align-middle'>{$row['dateposted']}</td>
                            <td class='btn-row'>
                                <button type='button' class='btn btn-primary btn-view' data-user-id='{$row['jobid']}'>View</button>
                                <button type='button' class='btn btn-secondary btn-edit' data-user-id='{$row['jobid']}'>Edit</button>
                                <button type='button' href: class='btn btn-danger btn-remove' data-user-id='{$row['jobid']}'>Remove</button>
                               
                            </td>
                        </tr>";
                    }
                    ?>

            </tbody>
        </table>
</main>

<div class="modal" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Job Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="editForm">
                    <!-- Hidden input for applicationNo -->
                    <input type="hidden" id="jobid" name="jobid">

                    <!-- Input fields for editing -->
                    <label for="jobtitle">Job Title:</label>
                    <input type="text" id="jobtitle" name="jobtitle" class="form-control" required>

                    <label for="departmentname">Department Name:</label>
                    <select id="departmentname" name="departmentname" class="form-control" required>
                    <?php

                            // Fetch department names from tbl_department
                            $sqlDept = "SELECT * FROM tbdepartment";
                            $resultDept = $conn->query($sqlDept);

                            if ($resultDept === false) {
                                die("Error: " . $conn->error);
                            }

                            // Populate the dropdown list with department names
                            while ($rowDept = $resultDept->fetch_assoc()) {
                                  echo "<option value='{$rowDept['deptname']}'>{$rowDept['deptname']}</option>";
                            }
                     ?>
                     </select>

                    <label for="quantity">Quantity:</label>
                    <input type="text" id="quantity" name="quantity" class="form-control" required>

                    <label for="education">Education:</label>
                    <input type="text" id="education" name="education" class="form-control" required>

                    <label for="experience">Experience:</label>
                    <input type="text" id="experience" name="experience" class="form-control" required>

                    <label for="expertise">Expertise:</label>
                    <input type="text" id="expertise" name="expertise" class="form-control" required>

                    <label for="competency">Competency:</label>
                    <input type="text" id="competency" name="competency" class="form-control" required>

                    <label for="eligibility">Eligibility:</label>
                    <input type="text" id="eligibility" name="eligibility" class="form-control" required>

                    <label for="dutres">Duties and Responsibilities:</label>
                    <input type="text" id="dutres" name="dutres" class="form-control" required>

                    <label for="hiringstatus">Hiring Status:</label>
                    <select id="hiringstatus" name="hiringstatus" class="form-control" required>
                    <?php
                    $sqlStatus = "SHOW COLUMNS FROM tbjobs LIKE 'hiringstatus'";
                    $resultStatus = $conn->query($sqlStatus);
                    if ($resultStatus === false) {
                        die("Error: " . $conn->error);
                    }

                    $enumStr = $resultStatus->fetch_assoc()['Type']; 
                    if (strpos($enumStr, 'enum') !== false) {
                    preg_match_all("/'(.*?)'/", $enumStr, $matches); 
                    foreach ($matches[1] as $value) {
                    echo "<option value='{$value}'>{$value}</option>";
                    }
                } else {
                $options = array("Active", "Full");
                foreach ($options as $value) {
                echo "<option value='{$value}'>{$value}</option>";
                }
            }
            ?>
            </select>

                    <button type="button" id="updateBtn" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        function handleButtonClick(action, jobid) {
            $.ajax({
                type: 'POST',
                url: getActionUrl(action),
                data: { jobid: jobid, action: action },
                success: function (response) {
                   
                    alert(response);

                    
                    if (action === 'remove') {
                        location.reload();
                    }
                },
                error: function (error) {
                    
                    console.error('Error:', error);
                }
            });
        }


        $('.btn-view').click(function () {

            var jobid = $(this).data('user-id');

            window.location.href = 'admin_job_view.php?jobid=' + jobid;
        });

        $('.btn-edit').click(function () {

            var jobid = $(this).data('user-id');

            $.ajax({
                type: 'POST',
                url: 'admin_job_edit.php',
                data: { jobid: jobid },
                dataType: 'json',
                success: function (response) {
                    $('#jobid').val(jobid); // Set the hidden input
                    $('#jobtitle').val(response.jobtitle);
                    $('#departmentname').val(response.departmentname);
                    $('#quantity').val(response.quantity);
                    $('#education').val(response.education);
                    $('#experience').val(response.experience);
                    $('#expertise').val(response.expertise);
                    $('#competency').val(response.competency);
                    $('#eligibility').val(response.eligibility);
                    $('#dutres').val(response.dutres);
                    $('#hiringstatus').val(response.hiringstatus);

                    $('#editModal').modal('show');
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });

        $('#updateBtn').click(function () {
            var formData = {
                jobid: $('#jobid').val(),
                jobtitle: $('#jobtitle').val(),
                departmentname: $('#departmentname').val(),
                quantity: $('#quantity').val(),
                education: $('#education').val(),
                experience: $('#experience').val(),
                expertise: $('#expertise').val(),
                competency: $('#competency').val(),
                eligibility: $('#eligibility').val(),
                dutres: $('#dutres').val(),
                hiringstatus: $('#hiringstatus').val()

            };

 
            $.ajax({
                type: 'POST',
                url: 'admin_job_update.php', 
                data: { updateData: JSON.stringify(formData) },
                dataType: 'json',
                success: function (response) {
    
                    if (response.status && response.message) {
                        alert(response.message);
                    } else {
                        console.error('Unexpected response structure:', response);
                    }

                    location.reload();
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });

        $('.btn-remove').click(function () {
            handleButtonClick('remove', $(this).data('user-id'));
        });

        function getActionUrl(action) {
            switch (action) {
                case 'view':
                    return 'admin_job_view.php';
                case 'edit':
                    return 'admin_job_update.php';
                case 'remove':
                    return 'admin_job_remove.php';
                default:
                    return ''; 
            }
        }
    });
</script>
</body>
</html>