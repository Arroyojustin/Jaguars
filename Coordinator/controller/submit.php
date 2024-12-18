<?php
include('../../dbconn.php'); // Include database connection

// Read JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Validate required fields
if (
    empty($data['firstName']) || empty($data['lastName']) ||
    empty($data['studentID']) || empty($data['gender']) ||
    empty($data['sportCategory']) || empty($data['height']) ||
    empty($data['weight']) || empty($data['bmi']) ||
    empty($data['phoneNumber'])
) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO requirements 
    (first_name, last_name, student_id, gender, sport_category, height, weight, bmi, phone_number, health_protocol) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param(
    "ssssssssss",
    $data['firstName'], $data['lastName'], $data['studentID'], $data['gender'],
    $data['sportCategory'], $data['height'], $data['weight'], $data['bmi'],
    $data['phoneNumber'], $data['healthProtocol']
);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to insert data.']);
}

$stmt->close();
$conn->close();
?>
