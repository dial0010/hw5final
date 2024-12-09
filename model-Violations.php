<?php
include 'db_connection.php';  // Include the database connection file

// Fetch all violations for a specific driver
function getViolationsByDriver($driverId) {
    $conn = get_db_connection();  // Get the database connection
    if (!$conn) {
        return [];  // If connection fails, return an empty array
    }

    $query = "SELECT * FROM violations WHERE Driver_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $driverId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];  // Return violations as an array
}

// Add a new violation
function addViolation($driverId, $violationNumber, $violationReason) {
    $conn = get_db_connection();  // Get the database connection
    if (!$conn) {
        return false;  // If connection fails, return false
    }

    $query = "INSERT INTO violations (Driver_id, Violation_number, Violation_reason) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iss", $driverId, $violationNumber, $violationReason);
    return $stmt->execute();  // Execute and return the result (true/false)
}

// Update a violation
function updateViolation($violationId, $driverId, $violationNumber, $violationReason) {
    $conn = get_db_connection();  // Get the database connection
    if (!$conn) {
        return false;  // If connection fails, return false
    }

    $query = "UPDATE violations SET Violation_number = ?, Violation_reason = ?, Driver_id = ? WHERE Violation_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssii", $violationNumber, $violationReason, $driverId, $violationId);
    return $stmt->execute();  // Execute and return the result (true/false)
}

// Delete a violation
function deleteViolation($violationId) {
    $conn = get_db_connection();  // Get the database connection
    if (!$conn) {
        return false;  // If connection fails, return false
    }

    $query = "DELETE FROM violations WHERE Violation_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $violationId);
    return $stmt->execute();  // Execute and return the result (true/false)
}
?>
