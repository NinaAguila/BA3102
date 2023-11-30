
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Equipment Management System</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
$(document).ready(function () {
    // Function to reset the form
    function resetForm() {
        $('#registration')[0].reset();
    }

    // Function to show a confirmation dialog before submitting the form
    function showConfirmation() {
        Swal.fire({
            title: 'Do you want to submit the form?',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, proceed with form submission
                submitForm();
            }
        });
    }

    // Function to handle form submission using AJAX
    function submitForm() {
        // Serialize form data
        var formData = new FormData($('#registration')[0]);

        // Use AJAX to submit the form data
        $.ajax({
            url: 'register_equipment.php', // Replace with the correct path
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log('AJAX Success:', response);

                // Handle the server response
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Form submitted successfully!',
                    onClose: resetForm // Reset the form after the user clicks "OK"
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);

                // Handle any errors that occur during the AJAX request
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    onClose: resetForm // Reset the form after the user clicks "OK"
                });
            }
        });
    }

    // Form submission handling
    $('#registration').submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting in the traditional way

        // Show confirmation dialog before submitting the form
        showConfirmation();

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
            background: #03045e;
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
        height: 85vh;
        box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.2);
        border-radius: 20px;
        
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

        <p class="form_title">EQUIPMENT REGISTRATION</p>
        

        <div class="container">
    
        <!-- Change this line in your form tag -->
        <form action="" id="registration" method="post" enctype="multipart/form-data">

                <!-- Your form HTML remains unchanged -->

            <div class="row">
            <div class="col-25">
                <label for="equipmentName">Equipment Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="equipmentName" name="equipmentName" placeholder="Enter equipment name.." required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="equipmentCategoryId">Equipment Category</label>
            </div>
            <div class="col-75">
                <select id="equipmentCategoryId" name="equipmentCategoryId" required>
                <option value="" selected disabled>Select an option</option>
                <option value="1">Soccer</option>
                <option value="2">Basketball</option>
                <option value="3">Tennis</option>
                <option value="4">Baseball</option>
                <option value="5">Volleyball</option>
                </select>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="brand">Brand</label>
            </div>
            <div class="col-75">
                <select id="brand" name="brand">
                <option value="" selected disabled>Select an option</option>
                <option value="Nike">Nike</option>
                <option value="Adidas">Adidas</option>
                <option value="Wilson">Wilson</option>
                <option value="Rawlings">Rawlings</option>
                <option value="Mikasa">Mikasa</option>
                </select>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="description">Description</label>
            </div>
            <div class="col-75">
                <textarea id="description" name="description" placeholder="Enter description.." style="height:100px"></textarea>
            </div>
            </div>


            <div class="row">
            <div class="col-25">
                <label for="locationId">Location</label>
            </div>
            <div class="col-75">
                <select id="locationId" name="locationId">
                <option value="" selected disabled>Select an option</option>
                <option value="1">Equipment Room 1</option>
                <option value="2">Equipment Room 2</option>
                <option value="3">Storage Area A</option>
                <option value="4">Storage Area B</option>
                <option value="5">Gymnasium</option>
                </select>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="equipmentImage">Equipment Image</label>
            </div>
            <div class="col-75">
            <input type="file" id="equipmentImage" name="equipmentImage" accept="image/*">
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
