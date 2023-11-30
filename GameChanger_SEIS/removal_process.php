<?php

session_start();
// Include the connection file
include('connection.php');

// Initialize response array
$response = array();

// Check if the form is submitted
if (isset($_POST['create'])) {
    // Retrieve form data
    $equipmentId = $_POST['equipmentId'];
    $requestDate = $_POST['requestDate'];
    $removalReason = $_POST['removalReason'];
    $quantityToRemove = $_POST['quantityToRemove'];

    // Check if the equipment ID exists
    $checkEquipmentIdQuery = "SELECT * FROM addquantity WHERE equipmentId = ?";
    $stmtCheckEquipmentId = mysqli_prepare($conn, $checkEquipmentIdQuery);
    mysqli_stmt_bind_param($stmtCheckEquipmentId, 's', $equipmentId);
    mysqli_stmt_execute($stmtCheckEquipmentId);
    $resultCheckEquipmentId = mysqli_stmt_get_result($stmtCheckEquipmentId);

    if (mysqli_num_rows($resultCheckEquipmentId) > 0) {
        // Retrieve existing quantity from the addquantity table
        $selectQuantityQuery = "SELECT quantity FROM addquantity WHERE equipmentId = ?";
        $stmtSelectQuantity = mysqli_prepare($conn, $selectQuantityQuery);
        mysqli_stmt_bind_param($stmtSelectQuantity, 's', $equipmentId);
        mysqli_stmt_execute($stmtSelectQuantity);
        $result = mysqli_stmt_get_result($stmtSelectQuantity);

        if ($row = mysqli_fetch_assoc($result)) {
            $existingQuantity = $row['quantity'];

            // Check if there's enough quantity to remove
            if ($existingQuantity >= $quantityToRemove) {
                // Calculate the new quantity
                $newQuantity = $existingQuantity - $quantityToRemove;

                // Use prepared statement to update the quantity in the addquantity table
                $updateQuantityQuery = "UPDATE addquantity SET quantity = ? WHERE equipmentId = ?";
                $stmtUpdateQuantity = mysqli_prepare($conn, $updateQuantityQuery);
                mysqli_stmt_bind_param($stmtUpdateQuantity, 'ss', $newQuantity, $equipmentId);

                if (mysqli_stmt_execute($stmtUpdateQuantity)) {
                    // Use prepared statement to perform insertion into equipmentremovalrequests
                    $insertRequestQuery = "INSERT INTO equipmentremovalrequests (equipmentId, requestDate, removalReason, quantityToRemove,empid)
                                          VALUES (?, ?, ?, ? , ?)";
                    $stmtInsertRequest = mysqli_prepare($conn, $insertRequestQuery);
                    mysqli_stmt_bind_param($stmtInsertRequest, 'sssis', $equipmentId, $requestDate, $removalReason, $quantityToRemove, $_SESSION['empid']);

                    if (mysqli_stmt_execute($stmtInsertRequest)) {
                        // Record in archived_equipment
                        $insertArchivedQuery = "INSERT INTO archived_equipment (equipmentId, archivedDate, equipmentName, brand, quantity, description, equipmentImage, removalReason, empid)
                        SELECT equipmentId, NOW(), equipmentName, brand, ?, description, equipmentImage, ?, ?
                        FROM equipment
                        WHERE equipmentId = ?";
                        
$stmtInsertArchived = mysqli_prepare($conn, $insertArchivedQuery);
mysqli_stmt_bind_param($stmtInsertArchived, 'ssss', $quantityToRemove, $removalReason, $_SESSION['empid'], $equipmentId);


                        if (mysqli_stmt_execute($stmtInsertArchived)) {
                            // Use prepared statement to delete the record from the addquantity table
                            if ($newQuantity == 0) {
                                // Use prepared statement to delete the record
                                $deleteEquipmentQuery = "DELETE FROM addquantity WHERE equipmentId = ?";
                                $stmtDeleteEquipment = mysqli_prepare($conn, $deleteEquipmentQuery);
                                mysqli_stmt_bind_param($stmtDeleteEquipment, 's', $equipmentId);

                                if (mysqli_stmt_execute($stmtDeleteEquipment)) {
                                    $response['status'] = 'success';
                                    $response['message'] = 'Equipment removed successfully!';
                                } else {
                                    $response['status'] = 'error';
                                    $response['message'] = 'Error deleting equipment: ' . mysqli_error($conn);
                                }
                            } else {
                                $response['status'] = 'success';
                                $response['message'] = 'Removal request processed successfully!';
                            }
                        } else {
                            $response['status'] = 'error';
                            $response['message'] = 'Error inserting into archived_equipment: ' . mysqli_error($conn);
                        }
                    } else {
                        $response['status'] = 'error';
                        $response['message'] = 'Error inserting into equipmentremovalrequests: ' . mysqli_error($conn);
                    }
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Error updating quantity: ' . mysqli_error($conn);
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = "Not enough quantity to remove. Available quantity: $existingQuantity";
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error retrieving existing quantity: ' . mysqli_error($conn);
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Equipment ID does not exist.';
    }

    // Output the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle the case when the form is not submitted
    $response['status'] = 'error';
    $response['message'] = 'Invalid request';

    // Output the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>