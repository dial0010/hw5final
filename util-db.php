<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('138.197.17.168', 'dialoucr_dial0010', 'Facile2025#.', 'dialoucr_hw3');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
