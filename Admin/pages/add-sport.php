<div class="container-fluid p-0 m-0" id="add-sport" style="display: none;">
    <div class="container mt-1">
        <div class="row mb-3"></div>
        <div class="row">
            <div class="col-md-4">
                <!-- Add Sport Button -->
                <button id="addSportButton" class="btn btn-outline-success mb-3 top-corner" data-bs-toggle="modal" data-bs-target="#addSportModal">Add Sport</button>

                <!-- Sports List Container -->
                <div class="card shadow-container">
                    <div class="card-body">
                        <h5 class="card-title underline mb-3">Sports</h5>
                        <div id="sportsContainer" class="d-flex justify-content-center flex-wrap">
                            <!-- List of sports will be displayed here -->
                        </div>
                    </div>
                </div>

                <!-- Role List Container -->
                <div class="card shadow-container mt-4">
                    <div class="card-body">
                        <h5 class="card-title underline mb-3">Roles</h5>
                        <div id="rolesContainer" class="d-flex justify-content-center flex-wrap">
                            <!-- List of roles will be displayed here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow-container">
                    <div class="card-body">
                        <h5 class="card-title underline mb-3">Coach Information</h5>
                        <form id="addCoachForm">
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
                                    <label for="middleInitial" class="form-label">Middle Initial</label>
                                    <input type="text" class="form-control" id="middleInitial" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="gender" class="form-label">Gender</label>
                                    <input type="text" class="form-control" id="gender" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="phoneNumber" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="phoneNumber" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="sportCategory" class="form-label">Sport Category</label>
                                    <select name="sportCategory" class="form-control" id="sportCategory" required>
                                        <?php
                                        // Fetch sports from the sports table
                                        $sportQuery = "SELECT sport_name FROM sports";
                                        $result = $conn->query($sportQuery);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['sport_name'] . "'>" . $row['sport_name'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No sports available</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submitCoachButton">Add</button>
                            <button class="btn btn-secondary" onclick="showSection(event, 'adding')">Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Sport Modal -->
<div class="modal fade" id="addSportModal" tabindex="-1" aria-labelledby="addSportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSportModalLabel">Add Sport</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSportForm">
                    <div class="mb-3">
                        <label for="sport_name" class="form-label">Sport Name</label>
                        <input type="text" class="form-control" id="sport_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="position_input" class="form-label">Add Position</label>
                        <input type="text" class="form-control" id="position_input">
                        <button type="button" class="btn btn-primary mt-2" id="addPositionBtn">Add Position</button>
                    </div>
                    <div class="mt-3">
                        <h5>Positions</h5>
                        <ul id="positionList" class="list-group">
                            <!-- Dynamically added positions will appear here -->
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Add Sport</button>
                </form>
            </div>
        </div>
    </div>
</div>




