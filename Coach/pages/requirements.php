<?php
// Include DB connection
include './../dbconn.php';

// Query to fetch the submitted requirements and related student info (only names for now)
$sql = "
    SELECT s.requirements_id, r.first_name, r.middle_initial, r.last_name
    FROM submitted s
    JOIN requirements r ON s.requirements_id = r.id
";

$result = $conn->query($sql);
?>

<div class="container-fluid p-0 m-0" id="required" style="display: block;">
    <div class="container mt-1">
        <div class="row">
            <!-- Left Side: Requirements Form -->
            <div class="col-md-6">
                <div class="card shadow-container">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="border-bottom: 1px solid #000;">Requirements</h5>
                        <div class="text-center">
                            <?php while($row = $result->fetch_assoc()) { ?>
                                <button class="btn btn-outline-secondary mb-2 w-100" 
                                    onclick="viewStudent(<?php echo $row['requirements_id']; ?>)">
                                    <?php echo $row['first_name'] . ' ' . $row['middle_initial'] . '. ' . $row['last_name']; ?>
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Student Details -->
            <div class="col-md-6">
                <div class="card shadow-container">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="border-bottom: 1px solid #000;">Information</h5>
                        <div id="student-info">
                            <p>Select a requirement to view student details.</p>
                        </div>
                        <!-- Buttons for Approve and Reject -->
                        <div class="mt-4">
                            <button class="btn btn-outline-success w-100 mb-2">Approve</button>
                            <button class="btn btn-outline-danger w-100">Reject</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $conn->close(); ?>

<script>
    function viewStudent(requirements_id) {
        // Display loading message
        document.getElementById('student-info').innerHTML = '<p>Loading student details...</p>';

        // Use AJAX to fetch the student details
        $.ajax({
            url: 'controller/getStudentName.php',
            method: 'POST',
            data: { requirements_id: requirements_id },
            success: function(response) {
                try {
                    var student = JSON.parse(response);
                    if (student.error) {
                        document.getElementById('student-info').innerHTML = '<p>' + student.error + '</p>';
                    } else {
                        var infoHtml = `
                            <p><strong>Name:</strong> ${student.first_name} ${student.middle_initial || ''} ${student.last_name}</p>
                            <p><strong>Gender:</strong> ${student.gender}</p>
                            <p><strong>Height:</strong> ${student.height}</p>
                            <p><strong>Weight:</strong> ${student.weight}</p>
                            <p><strong>BMI:</strong> ${student.bmi}</p>
                            <p><strong>Phone Number:</strong> ${student.phone_number}</p>
                            <p><strong>Health Protocol:</strong> ${student.health_protocol || 'Not provided'}</p>
                        `;
                        document.getElementById('student-info').innerHTML = infoHtml;
                    }
                } catch (e) {
                    document.getElementById('student-info').innerHTML = '<p>Error processing data.</p>';
                }
            },
            error: function() {
                document.getElementById('student-info').innerHTML = '<p>Failed to fetch student details. Please try again.</p>';
            }
        });
    }
</script>
