<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Equipment Management System</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
            background-color: #03045e;
            z-index: 2;
            display: flex;
            justify-content: flex-end;
            transition: 500ms;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.2);
            border-radius: 25px;
            
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


         .button {
        background-color: #023e8a; /* Green */
        border: 1px solid white;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        float: right;
        width: 50%;
        margin-top: 18px;
  
        }

        .button:not(:last-child) {
        border-right: none; /* Prevent double borders */
        }

        .button:hover {
        background-color: #0096c7;
        
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
            background: linear-gradient(rgb(156, 163, 175), rgb(75, 85, 99), rgb(30, 64, 175));
            
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
            text-align: center;
        }

        select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }
    #addUserForm{
        height: 92vh;
        background:  linear-gradient(to top, rgb(156, 163, 175), rgb(75, 85, 99), rgb(30, 64, 175));
    }
    #removeUserForm{
        height: 25vh;
        background: linear-gradient(rgb(156, 163, 175), rgb(75, 85, 99), rgb(30, 64, 175));
    }


    </style>

<script>
function showAlert(title, text, icon) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
    });
}

// Global definition of resetForm
function resetForm() {
    document.getElementById("addUserForm").reset();
}

// Function to check empid existence in the users table
function checkEmpIdInUsersTable() {
    var empid = $('#empid').val();

    // Make an AJAX request to check empid existence in the users table
    $.ajax({
        url: 'check_empid_in_users.php', // Update with the correct path if needed
        type: 'POST',
        data: { empid: empid },
        success: function (response) {
            if (response === 'exists_in_users_table') {
                showAlert('Error', 'Empid already exists in the users table.', 'error');
                resetForm(); // Reset the form if empid exists in the users table
            } else {
                // Continue to the checkEmpId function if empid is not in the users table
                checkEmpId();
            }
            // You can add more conditions based on your requirements
        },
        error: function () {
            showAlert('Error', 'Failed to check Empid existence in the users table.', 'error');
        }
    });
}


// Modify the existing checkEmpId function to continue only if empid is not in the users table
function checkEmpId() {
    var empid = $('#empid').val();

    // Make an AJAX request to check empid existence
    $.ajax({
        url: 'check_empid.php', // Update with the correct path if needed
        type: 'POST',
        data: { empid: empid },
        success: function (response) {
            if (response === 'exists_in_tbempinfo') {
                // Display a success message if the empid exists in the tbempinfo table
                showAlert('Success', 'Empid exists in tbempinfo table.', 'success');
            } else if (response === 'not_exists') {
                // Display an error message if the empid is not found in the tbempinfo table
                showAlert('Error', 'Empid not found.', 'error');
                // Optionally reset the form here
                resetForm();
            } else {
                // Handle unexpected response
                showAlert('Error', 'Unexpected response from the server.', 'error');
            }
        },
        error: function () {
            showAlert('Error', 'Failed to check Empid existence.', 'error');
        }
    });
}

// Update the change event listener for the Equipment ID input to trigger checkEmpIdInUsersTable
$('#empid').change(function () {
    var empid = $(this).val();
    fetchEmpInfo(empid);
    checkEmpIdInUsersTable(); // Check empid existence in the users table
});


// Function to fetch firstName and lastName based on empid
function fetchEmpInfo(empid) {
    $.ajax({
        url: 'fetch_emp_info.php', // Update with the correct path if needed
        type: 'POST',
        data: { empid: empid },
        success: function (response) {
            try {
                // Parse the JSON response
                var empInfo = JSON.parse(response);

                // Update the input fields with the fetched data
                $('#firstname').val(empInfo.firstName);
                $('#lastname').val(empInfo.lastName);
            } catch (error) {
                console.error('Error parsing JSON response:', error);
            }
        },
        error: function () {
            console.error('Failed to fetch emp info.');
        }
    });
}


// Function to check userName existence in the users table
function checkUserNameInUsersTable() {
    var userName = $('#userName').val();

    // Make an AJAX request to check userName existence in the users table
    $.ajax({
        url: 'check_username_in_users.php', // Update with the correct path if needed
        type: 'POST',
        data: { userName: userName },
        success: function (response) {
            if (response === 'exists_in_users_table') {
                showAlert('Error', 'Username already exists in the users table.', 'error');
                resetForm(); // Reset the form if userName exists in the users table
            } else {
                // Continue with form submission if userName is not in the users table
                // You can add more conditions based on your requirements
                // For example, you might want to check additional conditions before proceeding
                // with the form submission, depending on your application logic.
                // checkEmpIdInUsersTable(); // Uncomment and call additional functions as needed
            }
        },
        error: function () {
            showAlert('Error', 'Failed to check Username existence in the users table.', 'error');
        }
    });
}

// Update the change event listener for the Username input to trigger checkUserNameInUsersTable
$('#userName').change(function () {
    checkUserNameInUsersTable(); // Check userName existence in the users table
});


$(document).ready(function () {
    // Function to handle form submission
    $('#addUserForm').submit(function (event) {
        // Display a confirmation dialog before submitting the form
        Swal.fire({
            title: 'Do you want to add the user?',
            showCancelButton: true,
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed, proceed with form submission

                event.preventDefault(); // Prevent the form from submitting in the traditional way
                var formData = new FormData($(this)[0]);

                // Use AJAX to submit the form data
                $.ajax({
                    url: 'addUser.php', // Update with the correct path if needed
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log('AJAX Success:', response);

                        if (response.startsWith('Role')) {
                            showAlert('Error', response, 'error');
                        } else {
                            showAlert('Success!', response, 'success');
                            resetForm();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error:', textStatus, errorThrown);

                        showAlert('Oops...', 'Something went wrong! Please try again.', 'error');
                        resetForm();
                    }
                });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // User canceled, do nothing or provide feedback if needed
                Swal.fire('Cancelled', 'The user was not added.', 'info');
            }
        });

        return false; // Prevent the form from submitting in the traditional way
    });

    // SweetAlert2 for the "Cancel" button
    $('#cancel').click(function () {
        Swal.fire({
            title: 'Do you want to cancel?',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
        }).then((result) => {
            if (result.isConfirmed) {
                resetForm();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Changes are not saved', '', 'info');
            }
        });
    });



});


</script>




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

        <!-- Form to add a user with image -->
        <form id="addUserForm" method="post">
            <p style="font-size: 30px;">ADD USER</p> <br>
                
    <div class="row">
        <div class="col-25">
            <label for="empid">Employee ID</label>
        </div>
        <div class="col-75">
        <input type="text" id="empid" name="empid" placeholder="Enter employee ID.." required >
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label for="firstname">First Name</label>
        </div>
        <div class="col-75">
        <input type="text" id="firstname" name="firstname" placeholder="Enter First Name.." required >
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label for="lastname">Last Name</label>
        </div>
        <div class="col-75">
        <input type="text" id="lastname" name="lastname" placeholder="Enter Last Name.." required >
        </div>
    </div>



        <div class="row">
            <div class="col-25">
                <label for="userRole">User Role</label>
            </div>
            <div class="col-75">
                <select id="userRole" name="userRole">
                <option value="" selected disabled>Select an option</option>
                <option value="admin">Admin</option>
                <option value="equipment adder">Equipment Adder</option>
                <option value="equipment remover">Equipment Remover</option>
                </select>
            </div>
            </div>

            <!-- Add this block inside the form to include the userName field -->
            <div class="row">
                <div class="col-25">
                    <label for="userName">Username</label>
                </div>
                <div class="col-75">
                    <input type="text" id="userName" name="userName" placeholder="Enter Username.." required>
                </div>
            </div>

            <div class="row">
        <div class="col-25">
            <label for="password">Password</label>
        </div>
        <div class="col-75">
        <input type="text" id="password" name="password" placeholder="Password.." required >
        </div>
    </div>

    <div class="row">
            <div class="col-25">
                <label for="userImage">User Image</label>
            </div>
            <div class="col-75">
            <input type="file" id="userImage" name="userImage" accept="image/*">
            </div>
            </div>

    <div class="btn-group">
        <button type="button" class="button" id="cancel">Cancel</button>
        <button type="submit" class="button" id="submit" name="create">SUBMIT</button>
                </div>
            </form>


            <form id="removeUserForm" method="post">
    <div class="row">
        <div class="col-25">
            <label for="userId">User ID</label>
        </div>
        <div class="col-75">
            <input type="text" id="userId" name="userId" placeholder="Enter User ID.." required>
        </div>
    </div>

    <div class="btn-group">
        <button style="width: 100%;" type="submit" class="button" id="submit" name="create">Remove</button>
    </div>
</form>

<script>
    $(document).ready(function () {
        // Function to handle form submission
        $('#removeUserForm').submit(function (event) {
            event.preventDefault(); // Prevent the form from submitting in the traditional way

            // Check if the user ID field is not empty
            var userId = $('#userId').val().trim();
            if (userId === '') {
                showAlert('Error', 'Please enter a User ID.', 'error');
                return;
            }

            // Show a confirmation dialog before proceeding
            showConfirmationDialog(userId);
        });

        // Function to show a confirmation dialog
        function showConfirmationDialog(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to remove the user with ID ' + userId + '. This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes, remove it!"
                    checkUserIdExists(userId);
                }
            });
        }

        // Function to check if the user ID exists
        function checkUserIdExists(userId) {
            // Use AJAX to check if the user ID exists
            $.ajax({
                url: 'checkUserIdExists.php', // Update with the correct path if needed
                type: 'POST',
                data: { userId: userId },
                success: function (response) {
                    console.log('AJAX Success:', response);

                    // Handle the server response
                    if (response === 'exists') {
                        // User ID exists, proceed with removal
                        removeUser(userId);
                    } else {
                        // User ID doesn't exist, show an error
                        showAlert('Error', 'User ID does not exist.', 'error');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);

                    // Handle any errors that occur during the AJAX request
                    showAlert('Oops...', 'Something went wrong! Please try again.', 'error');
                }
            });
        }

        // Function to remove the user
        function removeUser(userId) {
            // Use AJAX to submit the form data
            $.ajax({
                url: 'removeUser.php', // Update with the correct path if needed
                type: 'POST',
                data: { userId: userId },
                success: function (response) {
                    console.log('AJAX Success:', response);

                    // Handle the server response
                    showAlert('Success!', response, 'success');
                    // Reset the form after the user clicks "OK"
                    resetRemoveUserForm();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);

                    // Handle any errors that occur during the AJAX request
                    showAlert('Oops...', 'Something went wrong! Please try again.', 'error');

                    // Reset the form after the user clicks "OK" in case of an error
                    resetRemoveUserForm();
                }
            });
        }

        // Function to reset the removeUserForm
        function resetRemoveUserForm() {
            $('#removeUserForm')[0].reset();
        }

        // Function to display a simple alert using SweetAlert2
        function showAlert(title, message, icon) {
            Swal.fire({
                title: title,
                text: message,
                icon: icon,
            });
        }
    });
</script>


            </form>
        <?php 
            include 'get_user_list.php';
        ?>

<div class="user-list">
    <h2>User List</h2>
    <table>
        <tr>
            <th>User ID</th>
            <th>Employee ID</th> <!-- Added for empid -->
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
            echo "<td>{$user['empid']}</td>"; 
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

</body>
</html>