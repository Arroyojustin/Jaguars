<div class="container-fluid p-0 m-0" id="stud-profile" style="display: none;">
  <div class="row g-3">
    <!-- Left Section -->
    <div class="col-lg-4 col-md-5 bg-light d-flex flex-column align-items-center py-2 text-center border-end">
        <div class="circle-container bg-primary text-white mb-3 d-flex align-items-center justify-content-center"
             style="width: 120px; height: 120px; border-radius: 50%; font-size: 36px; font-weight: bold;">
            <span class="initials"><?php echo isset($student['firstname'][0], $student['lastname'][0]) ? $student['firstname'][0] . $student['lastname'][0] : ''; ?></span>
        </div>
        <h5 class="mb-1"><?php echo isset($student['email']) ? $student['email'] : ''; ?></h5>
        <ul class="list-unstyled mt-3">
            <li><a href="#" class="btn btn-link text-decoration-none" id="changePasswordBtn">Change Password</a></li>
    </div>

    <!-- Right Section -->
    <div class="col-lg-7 col-md-7 py-2">
        <h4 class="text-secondary">Personal Information</h4>
        <form id="profileForm" method="POST">
            <!-- Hidden Field for User ID -->
            <input type="hidden" name="id" value="<?php echo isset($student['id']) ? $student['id'] : ''; ?>">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="<?php echo isset($student['firstname']) ? $student['firstname'] : ''; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="<?php echo isset($student['lastname']) ? $student['lastname'] : ''; ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo isset($student['email']) ? $student['email'] : ''; ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                    value="<?php echo isset($student['phone_no']) ? $student['phone_no'] : ''; ?>" required>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4 gap-3">
                <button type="submit" class="btn btn-outline-success" id="saveChangesBtn">Save Changes</button>
                <a href="./varsity.php" class="btn btn-outline-secondary">Back</a>
            </div>
        </form>
    </div>
  </div>
</div>
