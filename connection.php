<?php
    
    $servername = "localhost";  // Your MySQL server's hostname or IP address
    $username = "root";         // Your MySQL username
    $password = "";             // Your MySQL password (leave it empty if no password is set)
    $database = "domain_db"; // The name of the database you want to connect to
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>