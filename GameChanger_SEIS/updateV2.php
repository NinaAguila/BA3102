
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
            background-color: #5c050e;
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
        height: 84vh;
        box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.2);
        border-radius: 15px;
        
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

    <script>
        function showAlert(title, text, icon) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
    });
    }

    function resetForm() {
    document.getElementById("update").reset();
    document.getElementById("originalValue").value = ""; // Clear the originalValue field
    }

    function fetchOriginalValue(equipmentId) {
    // Make an AJAX request to fetch the original value
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var response = xhr.responseText;
                if (response !== "Not found") {
                    // Update the originalValue input field with the fetched value
                    document.getElementById("originalValue").value = response;
                    showAlert("Good job!", "Original value fetched!", "success");
                } else {
                    showAlert("Error", "Equipment not found for ID " + equipmentId, "error");
                    resetForm(); // Reset the form when ID is not found
                }
            } else {
                // Display an error message when there is an issue with the request
                showAlert("Error", "Failed to fetch original value", "error");
            }
        }
    };

    // Adjust the URL based on your server setup and script location
    xhr.open("GET", "fetch_original_value.php?equipmentId=" + equipmentId, true);
    xhr.send();

    return false; // Prevent the form from submitting in the traditional way
    }
    </script>

    <script>
$(document).ready(function () {
    // Function to reset the form
    function resetForm() {
        $('#update')[0].reset();
        $('#originalValue').val(''); // Clear the originalValue field
    }

    // Function to show confirmation dialog
    function showConfirmation() {
        Swal.fire({
            title: 'Do you want to update?',
            showCancelButton: true,
            confirmButtonText: 'Update',
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, proceed with form submission
                submitForm();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Update canceled', '', 'info');
            }
        });
    }

    // Function to handle form submission
    function submitForm() {
        // Serialize form data
        var formData = new FormData($('#update')[0]);

        // Use AJAX to submit the form data
        $.ajax({
            url: 'update_process.php', // Update with the correct path if needed
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log('AJAX Success:', response);

                // Handle the server response
                showAlert('Success!', 'Form submitted successfully!', 'success');

                // Reset the form after the user clicks "OK"
                resetForm();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);

                // Handle any errors that occur during the AJAX request
                showAlert('Oops...', 'Something went wrong!', 'error');

                // Reset the form after the user clicks "OK" in case of an error
                resetForm();
            }
        });
    }

    // Event listener for form submission
    $('#update').submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting in the traditional way

        // Show confirmation dialog before updating
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




</head>


<body>
    <section class="section-1">

        <p class="form_title">EQUIPMENT UPDATE</p>

        
        <div class="container">

        <form id="update" method="post">
                
    <div class="row">
        <div class="col-25">
            <label for="equipmentId">Equipment ID</label>
        </div>
        <div class="col-75">
        <input type="text" id="equipmentId" name="equipmentId" placeholder="Enter equipment ID.." required onchange="fetchOriginalValue(this.value)">
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label for="updateDate">Update Date</label>
        </div>
        <div class="col-75">
            <input type="datetime-local" id="updateDate" name="updateDate" required>
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label for="originalValue">Original Value</label>
        </div>
        <div class="col-75">
        <input type="text" id="originalValue" name="originalValue" placeholder="Original value will be filled automatically" readonly>
        </div>
    </div>

    <div class="row">
    <div class="col-25">
        <label for="valueToAdd">Value to Add</label>
    </div>
    <div class="col-75">
        <input type="text" id="valueToAdd" name="valueToAdd" placeholder="Enter value to add..." required>
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
