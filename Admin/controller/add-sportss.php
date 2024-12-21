<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sportName = trim($_POST['sport_name']);
    $positions = trim($_POST['positions']); // Comma-separated positions

    if (empty($sportName)) {
        echo json_encode(["success" => false, "message" => "Sport name is required."]);
        exit;
    }

    if (empty($positions)) {
        echo json_encode(["success" => false, "message" => "At least one position is required."]);
        exit;
    }

    // Insert into sports table
    $stmt = $conn->prepare("INSERT INTO sports (sport_name, positions) VALUES (?, ?)");
    $stmt->bind_param("ss", $sportName, $positions);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Sport and positions added successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to add sport."]);
    }

    $stmt->close();
}
?>
