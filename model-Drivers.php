<?php
include 'db_connection.php';

// Fetch all drivers from the database
function getAllDrivers() {
    global $conn;
    $query = "SELECT * FROM drivers";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Fetch a specific driver by ID
function getDriverById($driverId) {
    global $conn;
    $query = "SELECT * FROM drivers WHERE Drivers_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $driverId);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Add a new driver
function addDriver($driverName, $carBrand) {
    global $conn;
    $query = "INSERT INTO drivers (Drivers_name, Car_brand) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $driverName, $carBrand);
    return $stmt->execute();
}

// Update a driver
function updateDriver($driverId, $driverName, $carBrand) {
    global $conn;
    $query = "UPDATE drivers SET Drivers_name = ?, Car_brand = ? WHERE Drivers_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $driverName, $carBrand, $driverId);
    return $stmt->execute();
}

// Delete a driver
function deleteDriver($driverId) {
    global $conn;
    $query = "DELETE FROM drivers WHERE Drivers_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $driverId);
    return $stmt->execute();
}
?>
