<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Equipment Management System</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function () {

        function resetForm() {
            $('#removal')[0].reset();
        }

        $('#removal').submit(function (event) {
            event.preventDefault();

            // Show a confirmation dialog before submitting the form
            Swal.fire({
                title: 'Are you sure you want to remove?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes," proceed with form submission
                    var formData = new FormData($(this)[0]);
                    formData.append('create', 'true');

                    $.ajax({
                        url: 'removal_process.php',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (response) {
                            console.log('AJAX Success:', response);

                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: response.message,
                                    onClose: resetForm
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message,
                                    onClose: resetForm
                                });
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.error('AJAX Error:', textStatus, errorThrown);

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops... Something went wrong!',
                                text: 'AJAX Error: ' + textStatus + '\nErrorThrown: ' + errorThrown,
                                onClose: resetForm
                            });
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // User clicked "No," do nothing
                    Swal.fire('Removal canceled', '', 'info');
                }
            });

            return false;
        });

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




    <style>
        

        /* Reset default styles and set font family */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
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
            border-radius: 15px;
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

        input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        }

        label {
        padding: 12px 12px 12px 0;
        display: inline-block;
        padding: 12px 12px 12px 0;
        display: inline-block;
        font-size: 20px; /* Adjust the font size to your preference */
        font-weight: 4px; /* Optionally, make the labels bold */
        padding-left: 30px;
        }

        .container p {
        padding: 12px 12px 12px 0;
        text-align: center;
        font-size: 50px; /* Adjust the font size to your preference */
        font-weight: 4px; /* Optionally, make the labels bold */
        padding-left: 30px;
        font-weight: 20px; /* Optionally, make the text bold */
        margin-bottom: 15px; /* Adjust the margin as needed */
        }

        .form_title {
            background: #000000;
            color: #fff;
            padding: 20px;
            margin-bottom: 10px;
            text-align: center;
            font-size: 25px;
            letter-spacing: 10px;
        }

        input[type=submit] {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        }

        input[type=submit]:hover {
        background-color: #45a049;
        }

        input[type=text], input[type=file], select, textarea, input[type=number], input[type=datetime-local] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        }

        .container {
        border-radius: 5px;
        background: linear-gradient(to top, rgb(219, 234, 254), rgb(147, 197, 253), rgb(59, 130, 246));
        padding: 20px;
        height: 78vh;
        
        }

        .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
        }

        .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row::after {
        content: "";
        display: table;
        clear: both;
        }

        .btn-group .button {
        background-color: #023e8a; /* Green */
        border: 1px solid white;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        float: right;
        width: 37.5%;
        margin-top: 18px;
  
        }

        .btn-group .button:not(:last-child) {
        border-right: none; /* Prevent double borders */
        }

        .btn-group .button:hover {
        background-color: #0096c7;
        }


        

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
        .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
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

        function showContactImage() {
            Swal.fire({
                imageUrl: 'about_us_img/contacts.png',
                imageHeight: 1500,
                imageAlt: 'A tall image'
            });
        }
    </script>
        </header>
        <br><br><br><br>
        <p class="form_title">REMOVAL</p>

        <div class="container">
    
        <!-- Change this line in your form tag -->
        <form id="removal" method="post">
                <!-- Your form HTML remains unchanged -->

            <div class="row">
            <div class="col-25">
                <label for="equipmentId">Equipment ID</label>
            </div>
            <div class="col-75">
                <input type="text" id="equipmentId" name="equipmentId" placeholder="Enter equipment id.." required>
            </div>
            </div>


            <div class="row">
            <div class="col-25">
                <label for="requestDate">Request Date</label>
            </div>
            <div class="col-75">
                <input type="datetime-local" id="requestDate" name="requestDate" required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="removalReason">Removal Reason</label>
            </div>
            <div class="col-75">
                <select id="removalReason" name="removalReason" required>
                <option value="" selected disabled>Select an option</option>
                <option value="Out of Service">Out of Service</option>
                <option value="Obsolete">Obsolete</option>
                <option value="Damage">Damage</option>
                <option value="End of Lifecycle">End of Lifecycle</option>
                <option value="Regulatory Compliance">Regulatory Compliance</option>
                </select>
            </div>
            </div>


            <div class="row">
            <div class="col-25">
                <label for="quantityToRemove">Quantity to Remove</label>
            </div>
            <div class="col-75">
                <input type="number" id="quantityToRemove" name="quantityToRemove" required>
            </div>
            </div>


            
            <div class="btn-group">
            <button type="button" class="button" id="cancel">Cancel</button>
            <button type="submit" class="button" id="submit" name="create">SUBMIT</button>
                </div>

            </form>
        </div>
    </section>


</body>
</html>