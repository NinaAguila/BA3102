<?php
// Include your database connection code here
include 'connection.php';

// Function to fetch a list of users
function getUsersList() {
    global $conn;

    // Prepare the SQL statement to retrieve a list of users from the 'users' table
    $sql = "SELECT userId, firstName, lastName, userName, userRole, userImage FROM users";
    
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $users = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    mysqli_free_result($result);

    return $users;
}

$users = getUsersList();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Equipment Management System</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <!-- SweetAlert CDN -->
    



    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        /* Reset default styles and set font family */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family:'Poppins';
        }

        /* Styling for the first section with a background image */
        .section-1 {
            width: 100%;
            height: 100vh;
            position: relative;
        }

        /* Styling for the header/navigation bar */
        header {
            position: absolute;
            top: 0;
            width: 100%;
            background-color: #92585e;
            z-index: 2;
            display: flex;
            justify-content: flex-end;
            transition: 500ms;
        }
        
        .right-nav {
            display: flex;
            align-items: center;
            padding: 30px;
        }

        /* Styling for the navigation links */
        .right-nav a {
            text-decoration: none;
            color: #eee;
            text-transform: uppercase;
            margin-left: 20px;
            transition: color 0.2s;
        }

        .right-nav a:hover {
            color: #5c050e;
        }

        /* Additional styling to maintain header layout */
        .logo {
            font-size: 30px;
            color: #fff;
        }

        .image {
            width: 100%; /* Set the width to 100% to make the image responsive */
            height: 100%; /* Set the height to 100% to make the image responsive */
            object-fit: cover; /* Maintain aspect ratio and cover the entire container */
        }

        .main-content {
            position: relative;
            min-height: 100vh;
            top: 0;
            left: 80px; /* Adjust to match the sidebar width */
            transition: all 0.5s ease;
            width: calc(100% - 80px); /* Adjust to match the sidebar width */
            padding: 1rem;
        }

        /* Media query for smaller screens */
        @media (max-width: 769px) {
            header {
                flex-direction: column;
                padding: 15px 0;
            }
            .right-nav {
                margin-top: 10px;
                text-align: center;
            }
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .user-list {
            width: 97.5%;
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }
    </style>
</head>

<body>
    <section class="section-1">
        <header>            
            <nav class="right-nav">
                <a href="index.php" class="active">Home</a>
                <a href="#">Contact</a>
                <a href="#" onclick="confirmLogout()">Logout</a>
            </nav>
            <!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
   function confirmLogout() {
      Swal.fire({
         title: 'Are you sure?',
         text: 'You will be logged out!',
         icon: 'warning',
         showCancelButton: true,
         confirmButtonText: 'Yes, logout!',
         cancelButtonText: 'Cancel'
      }).then((result) => {
         if (result.isConfirmed) {
            // If the user confirms, follow the link to logout.php
            window.location.href = 'logout.php';
         }
      });
   }
</script>
        </header>

        <br><br><br><br>
        <h1>Account Management</h1>

        <!-- Form to add a user with image -->
        <form method="post" action="" enctype="multipart/form-data" id="addUserForm">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" required>
            <br>

            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" required>
            <br>

            <label for="userName">Username:</label>
            <input type="text" name="userName" required>
            <br>

            <label for="userRole">User Role:</label>
            <select name="userRole" required style="width: 100%;">
                <option value="" selected disabled>Select an option</option>
                <option value="admin">Admin</option>
                <option value="equipment adder">Equipment Adder</option>
                <option value="equipment remover">Equipment Remover</option>

            </select>
            <br>

            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br>


            <label for="userImage">User Image:</label>
            <input type="file" name="userImage" accept="image/*" required>
            <br>

            <input type="submit" name="addUser" value="Add User" style="width: 100%;">
        </form>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    // Function to add a user using AJAX
    function addUserAjax(formData) {
        $.ajax({
            type: "POST",
            url: "haha.php", // Update with the correct URL for your server-side script
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Handle the success response
                Swal.fire({
                    icon: 'success',
                    title: 'User added successfully.',
                    showConfirmButton: false,
                    timer: 1500
                });

                // You can update the user list or perform other actions as needed
            },
            error: function (error) {
                // Handle the error response
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while adding the user.',
                });
            }
        });
    }

    // Function to remove a user using AJAX
    function removeUserAjax(formData) {
        $.ajax({
            type: "POST",
            url: "haha.php", // Update with the correct URL for your server-side script
            data: formData,
            success: function (response) {
                // Handle the success response
                Swal.fire({
                    icon: 'success',
                    title: 'User removed successfully.',
                    showConfirmButton: false,
                    timer: 1500
                });

                // You can update the user list or perform other actions as needed
            },
            error: function (error) {
                // Handle the error response
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while removing the user.',
                });
            }
        });
    }

    // Update your form submission events to call the AJAX functions instead
    $("#addUserForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        addUserAjax(formData);
    });

    $("#removeUserForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        removeUserAjax(formData);
    });
</script>

        <!-- Form to remove a user -->
        <form method="post" action="" id="removeUserForm">
            <label for="userId">User ID to Remove:</label>
            <input type="number" name="userId" required>
            <br>

            <input type="submit" name="removeUser" value="Remove User" style="width: 100%;">
        </form>

        <div class="user-list">
            <h2>User List</h2>
            <table>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>User Role</th>
                    <th>User Image</th>
                </tr>
                <?php
                // Loop through the list of users and display them in the table
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>{$user['userId']}</td>";
                    echo "<td>{$user['firstName']}</td>";
                    echo "<td>{$user['lastName']}</td>";
                    echo "<td>{$user['userName']}</td>";
                    echo "<td>{$user['userRole']}</td>";
                    echo "<td><img src='{$user['userImage']}' alt='User Image' style='max-width: 100px;'></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
