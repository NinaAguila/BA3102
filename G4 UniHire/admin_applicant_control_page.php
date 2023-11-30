<!DOCTYPE html>
<html lang="en">
<head>
    <title>Applicant View and Update</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
            max-width: 500px;
            text-align: center;
            margin: 70px auto 20px;
            background: #fafeff;
            padding: -12px;
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
            max-width: 1500px;
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
        th {
            color:red;
        }
    </style>
</head>

<body>

<nav>
    <ul>
        
    <li><a class="nav-item" href="admin_home_page.php">Back</a></li>
    </ul>
</nav>


<div class="title-container">
    <h2>APPLICANTS LIST</h2>
</div>

<main>
        <table class="table">
            <thead>
                <tr>
                    <br>
                    <br>
                    <th>App No.</th>
                    <th>Job Title</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Status Update</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    include("db.php");

                    $sql = "SELECT * FROM tbjobapplication";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        die("Error: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='output-row'>
                            <td class='align-middle'>{$row['appno']}</td>
                            <td class='align-middle'>{$row['jobtitle']}</td>
                            <td class='align-middle'>{$row['appdate']}</td>
                            <td class='align-middle'>{$row['appstatus']}</td>
                            <td class='align-middle'>{$row['statusdate']}</td>
                            <td class='btn-row'>
                                <button type='button' class='btn btn-primary btn-view' data-user-id='{$row['appno']}'>View</button>
                                <button type='button' class='btn btn-secondary btn-edit' data-user-id='{$row['appno']}'>Edit</button>
                                <button type='button' href: class='btn btn-danger btn-remove' data-user-id='{$row['appno']}'>Remove</button>
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
                <h5 class="modal-title">Edit Application Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="appno" name="appno">

                    <div class="form-group">
            <label for="appstatus">New Status:</label>
            <select id="appstatus" name="appstatus" class="form-control" required>
                <option value="">Select Status</option>
                <?php
                include("db.php");

                $statusQuery = "SELECT statusid, statusname FROM tbappstatus ORDER BY statusid";
                $statusResult = $conn->query($statusQuery);

                while ($statusRow = $statusResult->fetch_assoc()) {
                    $statusName = $statusRow['statusname'];
                    echo "<option value='$statusName'>$statusName</option>";
                }
                ?>
            </select>
            </div>

                    <button type="button" id="updateBtn" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {

        function handleButtonClick(action, appno) {
            $.ajax({
                type: 'POST',
                url: getActionUrl(action),
                data: { appno: appno, action: action },
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
            var appno = $(this).data('user-id');
            window.location.href = 'admin_applicant_viewfiles.php?appno=' + appno;
        });

        $('.btn-edit').click(function () {
            var appno = $(this).data('user-id');

            $.ajax({
                type: 'POST',
                url: 'admin_applicant_edit.php',
                data: { appno: appno },
                dataType: 'json',
                success: function (response) {
                    $('#appno').val(appno); 
                    $('#appstatus').val(response.appstatus);
                    $('#editModal').modal('show');
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });

        $('#updateBtn').click(function () {
            var formData = {
                appno: $('#appno').val(),
                appstatus: $('#appstatus').val()
            };
            $.ajax({
                type: 'POST',
                url: 'admin_applicant_update.php',
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
                    // Handle errors
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
                    return 'admin_applicant_viewfiles.php';
                case 'edit':
                    return 'update.php';
                case 'remove':
                    return 'admin_applicant_remove.php';
                default:
                    return '';
            }
        }
    });
</script>
</body>
</html>