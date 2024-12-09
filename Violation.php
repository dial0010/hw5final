<?php
// Include the database connection
include 'db_connection.php';

// Action handling based on POST variables (CRUD operations)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['actionType'])) {
        // Handle Add Violation
        if ($_POST['actionType'] == 'Add') {
            $violationNumber = $_POST['vNumber'];
            $violationReason = $_POST['vReason'];
            $driverId = $_POST['driverId'];

            $query = "INSERT INTO violations (Violation_number, Violation_reason, Driver_id) VALUES ('$violationNumber', '$violationReason', '$driverId')";
            $result = $conn->query($query);

            if ($result) {
                echo "Violation added successfully!";
            } else {
                echo "Error adding violation: " . $conn->error;
            }
        }

        // Handle Edit Violation
        elseif ($_POST['actionType'] == 'Edit') {
            $violationId = $_POST['vid'];
            $violationNumber = $_POST['vNumber'];
            $violationReason = $_POST['vReason'];
            $driverId = $_POST['driverId'];

            $query = "UPDATE violations SET Violation_number='$violationNumber', Violation_reason='$violationReason', Driver_id='$driverId' WHERE Violation_id='$violationId'";
            $result = $conn->query($query);

            if ($result) {
                echo "Violation updated successfully!";
            } else {
                echo "Error updating violation: " . $conn->error;
            }
        }

        // Handle Delete Violation
        elseif ($_POST['actionType'] == 'Delete') {
            $violationId = $_POST['vid'];

            $query = "DELETE FROM violations WHERE Violation_id='$violationId'";
            $result = $conn->query($query);

            if ($result) {
                echo "Violation deleted successfully!";
            } else {
                echo "Error deleting violation: " . $conn->error;
            }
        }
    }
}
?>
