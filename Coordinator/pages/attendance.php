<?php
include('./../dbconn.php'); // Include the database connection
include('controller/attend-cat.php'); // Include the fetchSports.php file

// Call the function to get sports options
$sportOptions = getSportsOptions($conn);
?>

<div class="container-fluid p-0 m-0" id="attendance" style="display: none;">
  <!-- Left Section with Attendance Card -->
  <div class="row">
    <div class="col-md-4">
      <div class="card shadow-sm p-3" style="width: 780px;"> <!-- Added width -->
        <h1 class="card-title" style="font-size: 20px; margin-bottom: 10px;">Attendance</h1>
        <form>
          <div class="mb-2 row">
            <div class="col-md-5">
              <input type="text" class="form-control" id="surname" placeholder="Surname">
            </div>
            <div class="col-md-5">
              <div class="input-group">
                <select id="categorySelect" class="form-select form-select-sm custom-select me-2" aria-label="Select category"> 
                  <option value="" disabled selected>Select a Category</option>
                    <?php echo $sportOptions; // Populate the dropdown with sports ?>
                </select>
              </div>
            </div>
          </div>
        </form>
        <div class="table-responsive mt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Position</th>
                <th>Status</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>

    <!-- Right Section with Calendar -->
    <div class="col-md-8">
      <div class="my-custom-calendar">
        <!-- Calendar Header (Month) -->
        <div class="my-calendar-header">
          <span>December 2024</span>
        </div>
        
        <!-- Calendar Days -->
        <div class="my-calendar-days">
          <div class="my-calendar-day"><strong>Sun</strong></div>
          <div class="my-calendar-day"><strong>Mon</strong></div>
          <div class="my-calendar-day"><strong>Tue</strong></div>
          <div class="my-calendar-day"><strong>Wed</strong></div>
          <div class="my-calendar-day"><strong>Thu</strong></div>
          <div class="my-calendar-day"><strong>Fri</strong></div>
          <div class="my-calendar-day"><strong>Sat</strong></div>

          <!-- Days of the Month -->
          <div class="my-calendar-day"></div> <!-- Empty space for starting day -->
          <div class="my-calendar-day">1</div>
          <div class="my-calendar-day">2</div>
          <div class="my-calendar-day">3</div>
          <div class="my-calendar-day">4</div>
          <div class="my-calendar-day">5</div>
          <div class="my-calendar-day">6</div>

          <div class="my-calendar-day">7</div>
          <div class="my-calendar-day">8</div>
          <div class="my-calendar-day">9</div>
          <div class="my-calendar-day">10</div>
          <div class="my-calendar-day">11</div>
          <div class="my-calendar-day">12</div>
          <div class="my-calendar-day">13</div>

          <div class="my-calendar-day">14</div>
          <div class="my-calendar-day">15</div>
          <div class="my-calendar-day">16</div>
          <div class="my-calendar-day">17</div>
          <div class="my-calendar-day">18</div>
          <div class="my-calendar-day">19</div>
          <div class="my-calendar-day">20</div>

          <div class="my-calendar-day">21</div>
          <div class="my-calendar-day">22</div>
          <div class="my-calendar-day">23</div>
          <div class="my-calendar-day">24</div>
          <div class="my-calendar-day">25</div>
          <div class="my-calendar-day">26</div>
          <div class="my-calendar-day">27</div>

          <div class="my-calendar-day">28</div>
          <div class="my-calendar-day">29</div>
          <div class="my-calendar-day">30</div>
          <div class="my-calendar-day">31</div>
          <div class="my-calendar-day"></div> <!-- Empty space for ending day -->
        </div>
      </div>
      
      <!-- Add this at the bottom of the right section -->
      <div class="row mt-3 new-card-container">
        <div class="col-md-4">
          <div class="new-card text-white bg-success mb-3">
            <div class="new-card-body">
              <h5 class="new-card-title">Present</h5>
              <p class="new-card-text">0</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="new-card text-white bg-danger mb-3">
            <div class="new-card-body">
              <h5 class="new-card-title">Absent</h5>
              <p class="new-card-text">0</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="new-card new-card-total mb-3">
            <div class="new-card-body">
              <h5 class="new-card-title">Total Students</h5>
              <p class="new-card-text">0</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
