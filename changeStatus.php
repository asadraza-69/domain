<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $query = isset($_POST['query']) ? $_POST['query'] : '';
    if ($query !== '') {
        // Perform the database update    
        if (mysqli_query($conn, $query)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Query execution failed']);
        }

        mysqli_close($conn);
    } else {
        echo json_encode(['error' => 'Invalid query']);
    }
}
