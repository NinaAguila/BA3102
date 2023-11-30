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