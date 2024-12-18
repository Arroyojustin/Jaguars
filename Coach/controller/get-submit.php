<?php
include('../../dbconn.php'); // Include database connection

$result = $conn->query("SELECT * FROM requirements");

if ($result->num_rows > 0) {
    $requirements = [];
    while ($row = $result->fetch_assoc()) {
        $requirements[] = $row;
    }
    echo json_encode(['success' => true, 'requirements' => $requirements]);
} else {
    echo json_encode(['success' => false, 'message' => 'No requirements found.']);
}

$conn->close();
?>
