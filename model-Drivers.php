<?php
include 'db_connection.php';  // Include the database connection file

// Fetch all drivers from the database
function getAllDrivers() {
    $conn = get_db_connection();  // Get the database connection
    if (!$conn) {
        return [];  // If connection fails, return an empty array
    }

    $query = "SELECT * FROM drivers";
    $result = $conn->query($query);
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];  // Return drivers as an array
}

// Fetch a specific driver by ID
function getDriverById($driverId) {
    $conn = get_db_connection();  // Get the database connection
    if (!$conn) {
        return null;  // If connection fails, return null
    }

    $query = "SELECT * FROM drivers WHERE Drivers_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $driverId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();  // Return a single driver's data
}

// Add a new driver
function addDriver($driverName, $carBrand) {
    $conn = get_db_connection();  // Get the database connection
    if (!$conn) {
        return false;  // If connection fails, return false
    }

    $query = "INSERT INTO drivers (Drivers_name, Car_brand) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $driverName, $carBrand);
    return $stmt->execute();  // Execute and return the result (true/false)
}

// Update a driver
function updateDriver($driverId, $driverName, $carBrand) {
    $conn = get_db_connection();  // Get the database connection
    if (!$conn) {
        return false;  // If connection fails, return false
    }

    $query = "UPDATE drivers SET Drivers_name = ?, Car_brand = ? WHERE Drivers_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $driverName, $carBrand, $driverId);
    return $stmt->execute();  // Execute and return the result (true/false)
}

// Delete a driver
function deleteDriver($driverId) {
    $conn = get_db_connection();  // Get the database connection
    if (!$conn) {
        return false;  // If connection fails, return false
    }

    $query = "DELETE FROM drivers WHERE Drivers_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $driverId);
    return $stmt->execute();  // Execute and return the result (true/false)
}
?>
