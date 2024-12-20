<?php
include('../../dbconn.php'); // Include database connection

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['requirements_id'], $data['name'], $data['status'])) {
    $requirementsId = $data['requirements_id'];
    $name = $data['name'];
    $status = $data['status'];

    // Insert into `action` table
    $stmt = $conn->prepare("INSERT INTO action (requirements_id, name, status) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $requirementsId, $name, $status);

    if ($stmt->execute()) {
        // Just update the status in the database (no deletion)
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update status.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data.']);
}

$conn->close();
?>
