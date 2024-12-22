<?php
include('./../dbconn.php'); // Include the database connection
include('controller/attend-cat.php'); // Include the fetchSports.php file

// Call the function to get sports options
$sportOptions = getSportsOptions($conn);
?>

<div class="container-fluid p-0 m-0" id="attendance" style="display: none;">
  <!-- Attendance Section -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5>Attendance</h5>
    <div class="calendar-info d-flex align-items-center">
      <i class="bi bi-chevron-left" style="font-size: 1.5rem; margin-right: 10px; cursor: pointer;"></i> <!-- Previous arrow icon -->
      <i class="bi bi-calendar" style="font-size: 1.5rem; margin-right: 10px;"></i> <!-- Calendar icon -->
      <span>Today 22 Dec 2024</span>
      <i class="bi bi-chevron-right" style="font-size: 1.5rem; margin-left: 10px; cursor: pointer;"></i> <!-- Next arrow icon -->
    </div>
  </div>
  <!-- Form Section -->
  <div class="row mb-2">
    <div class="col-sm-6">
      <select id="categorySelect" class="form-select form-select-sm custom-select" aria-label="Select category">
        <option value="" disabled selected>Select a Category</option>
        <?php echo $sportOptions; // Populate the dropdown with sports ?>
      </select>
    </div>
    <div class="col-sm-6">
      <select id="statusSelect" class="form-select form-select-sm custom-select" aria-label="Select status">
        <option value="" disabled selected>Select Status</option>
        <option value="present">Present</option>
        <option value="absent">Absent</option>
        <option value="late">Late</option>
      </select>
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-sm-12">
      <input type="text" class="form-control" id="studentName" placeholder="Name of Student">
    </div>
  </div>
  <!-- Attendance Status Section -->
  <div class="table-responsive mt-3">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Attendance Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Doe</td>
          <td>
            <span class="badge bg-success">P</span>
            <span class="badge bg-danger">A</span>
            <span class="badge bg-warning">L</span>
          </td>
        </tr>
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>
</div>
