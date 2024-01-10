<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $query = isset($_POST['query']) ? $_POST['query'] : '';
    if ($query !== '') {
        // Perform the database update
        $result = mysqli_query($conn, $query);
        $rows = array();
        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $rows[] = $row; // Add the current row to the array
            }
            echo json_encode(['success' => true, 'data' => $rows] );
        } else {
            echo json_encode(['error' => 'Query execution failed']);
        }

        mysqli_close($conn);
    } else {
        echo json_encode(['error' => 'Invalid query']);
    }
}
