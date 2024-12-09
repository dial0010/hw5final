<?php
// Include the database connection
include 'db_connection.php';

// Action handling based on POST variables (CRUD operations)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['actionType'])) {
        // Handle Add Driver
        if ($_POST['actionType'] == 'Add') {
            $driverName = $_POST['dName'];
            $carBrand = $_POST['dBrand'];
            
            $query = "INSERT INTO drivers (Drivers_name, Car_brand) VALUES ('$driverName', '$carBrand')";
            $result = $conn->query($query);
            
            if ($result) {
                echo "Driver added successfully!";
            } else {
                echo "Error adding driver: " . $conn->error;
            }
        }
        
        // Handle Edit Driver
        elseif ($_POST['actionType'] == 'Edit') {
            $driverId = $_POST['did'];
            $driverName = $_POST['dName'];
            $carBrand = $_POST['dBrand'];

            $query = "UPDATE drivers SET Drivers_name='$driverName', Car_brand='$carBrand' WHERE Drivers_id='$driverId'";
            $result = $conn->query($query);

            if ($result) {
                echo "Driver updated successfully!";
            } else {
                echo "Error updating driver: " . $conn->error;
            }
        }

        // Handle Delete Driver
        elseif ($_POST['actionType'] == 'Delete') {
            $driverId = $_POST['did'];

            $query = "DELETE FROM drivers WHERE Drivers_id='$driverId'";
            $result = $conn->query($query);

            if ($result) {
                echo "Driver deleted successfully!";
            } else {
                echo "Error deleting driver: " . $conn->error;
            }
        }
    }
}
?>
