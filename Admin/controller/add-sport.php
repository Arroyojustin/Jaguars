<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sportName = trim($_POST['sport_name']);

    // Check if the sport already exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM sports WHERE sport_name = ?");
    $stmt->bind_param("s", $sportName);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo json_encode(["success" => false, "message" => "Sport already exists."]);
        exit;
    }

    // Insert new sport
    $stmt = $conn->prepare("INSERT INTO sports (sport_name) VALUES (?)");
    $stmt->bind_param("s", $sportName);
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Sport added successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to add sport."]);
    }
    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch sports from the database
    $result = $conn->query("SELECT sport_name FROM sports ORDER BY sport_name ASC");
    $sports = [];
    while ($row = $result->fetch_assoc()) {
        $sports[] = $row['sport_name'];
    }
    echo json_encode($sports);
}

$conn->close();
?>
