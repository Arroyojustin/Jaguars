<?php
include('controller/sport-cat.php'); // Include the functions file
include('./../dbconn.php'); // Include the database connection

// Fetch approved students' names from the action table
$sql = "SELECT name FROM action WHERE status = 'approve'";
$result = $conn->query($sql);
$approvedStudents = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $approvedStudents[] = $row['name'];
    }
}
?>

<div class="container-fluid p-0 m-0" id="sports" style="display: none;">
    <div class="container mt-1">
        <div class="row mb-3"></div>
        <div class="row">
            <!-- Left Section: Coaches -->
            <div class="col-md-4">
                <div class="card shadow-container mb-4">
                    <div class="card-body">
                        <h5 class="card-title underline mb-3" style="border-bottom: 1px solid #000;">Approved</h5>
                        <ul style="list-style-type: none; padding-left: 0;">
                            <?php
                            // Display approved student names as buttons in the actions container
                            if (!empty($approvedStudents)) {
                                foreach ($approvedStudents as $student) {
                                    echo "<li><button class='btn btn-outline-success w-100 mb-2'>$student</button></li>";
                                }
                            } else {
                                echo "<li>No approved students yet.</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="card shadow-container">
                    <div class="card-body">
                        <h5 class="card-title underline mb-2" style="border-bottom: 1px solid #000;">Student Account</h5>

                        <!-- Student Account Form -->
                        <form id="coachForm">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="coachFirstName" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="coachFirstName" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="coachLastName" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="coachLastName" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-success" id="addStudentButton">Add Student</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Section: Students -->
            <div class="col-md-8">
                <div class="card shadow-container">
                    <div class="card-body">
                        <h5 class="card-title underline mb-3" style="border-bottom: 1px solid #000;">Student Requirements</h5>
                        
                        <!-- stud-add.php Form -->
                        <form id="studAddForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="studentID" class="form-label">Student ID</label>
                                    <input type="text" class="form-control" id="studentID" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="sportCategory" class="form-label">Sport Category</label>
                                    <select class="form-select" id="sportCategory" required>
                                        <option value="" disabled selected>Select a Category</option>
                                        <?php getSports(); ?> <!-- Dynamically populate the sport options -->
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="height" class="form-label">Height (cm)</label>
                                    <input type="number" class="form-control" id="height" min="0" step="0.01" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="weight" class="form-label">Weight (kg)</label>
                                    <input type="number" class="form-control" id="weight" min="0" step="0.01" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="bmi" class="form-label">BMI</label>
                                    <input type="number" class="form-control" id="bmi" min="0" step="0.01" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" pattern="[0-9]{10,15}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="healthProtocol" class="form-label">Health Protocol</label>
                                    <textarea class="form-control" id="healthProtocol" rows="3" placeholder="Enter any health protocol information"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary" id="submitStudentButton">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Function to calculate BMI
function calculateBMI() {
    const height = parseFloat(document.getElementById('height').value);
    const weight = parseFloat(document.getElementById('weight').value);
    const bmiInput = document.getElementById('bmi');

    if (height > 0 && weight > 0) {
        const heightInMeters = height / 100;
        const bmi = weight / (heightInMeters * heightInMeters);
        bmiInput.value = bmi.toFixed(2);
    } else {
        bmiInput.value = '';
    }
}

document.getElementById('height').addEventListener('input', calculateBMI);
document.getElementById('weight').addEventListener('input', calculateBMI);
</script>
