<?php
// Include the database connection file
include './../dbconn.php';

// Function to fetch sports categories from the database
function fetchSportsCategories($conn) {
    $sql = "SELECT sport_name FROM sports"; // Query to get all sport names
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $options = '';
        while ($row = $result->fetch_assoc()) {
            $options .= '<option value="' . htmlspecialchars($row['sport_name']) . '">' . htmlspecialchars($row['sport_name']) . '</option>';
        }
        return $options;
    } else {
        return '<option>No sports available</option>';
    }
}
?>

<div class="container-fluid p-0 m-0" id="adds" style="display: none;">
    <div class="row">
        <!-- Approved Container (Left) -->
        <div class="col-md-6">
            <div class="card shadow-container mb-4">
                <div class="card-body">
                    <h5 class="card-title underline mb-3" style="border-bottom: 1px solid #000;">Approved</h5>
                    
                    <!-- Sport Category Dropdown -->
                    <div class="mb-3">
                        <label for="sportCategory" class="form-label"></label>
                        <select class="form-select" id="sportCategory" aria-label="Select Sport Category">
                            <option selected disabled>Choose sport</option>
                            <?php echo fetchSportsCategories($conn); // Fetch and display sports dynamically ?>
                        </select>
                    </div>

                    <!-- Placeholder for approved students (if required) -->
                    <ul style="list-style-type: none; padding-left: 0;">
                        <li>No approved students yet.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Student Account Container (Right) -->
        <div class="col-md-6">
            <div class="card shadow-container">
                <div class="card-body">
                    <h5 class="card-title underline mb-2" style="border-bottom: 1px solid #000;">Student Account</h5>

                    <!-- Student Account Form -->
                    <form id="coachForm">
                        <!-- Student No. Field (Added) -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="studentNo" class="form-label">Student No.</label>
                                <input type="text" class="form-control" id="studentNo" value="STU12345" required disabled> <!-- Example student number -->
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="coachFirstName" class="form-label">Email</label>
                                <input type="text" class="form-control" id="coachFirstName" required disabled>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="coachLastName" class="form-label">Password</label>
                                <input type="text" class="form-control" id="coachLastName" required disabled>
                            </div>
                        </div>

                        <!-- Add Student Button -->
                        <button type="submit" class="btn btn-outline-success" id="addStudentButton" disabled>Add Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
