<?php
// Include the fetch_sports.php file to access the fetch_sports() function
include('controller/stud-cat.php');
?>

<div class="container-fluid p-0 m-0" id="list" style="display: none;">
    <!-- Header -->
    <div class="custom-card-header bg-light text-dark">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <!-- Left section (Page Length and Search) -->
            <div class="d-flex align-items-center">
                <!-- Page Length Selector -->
                <div class="d-flex align-items-center me-3 mb-2 mb-sm-0">
                    <label for="customPageLengthSelect" class="form-label mb-0 me-2">Show</label>
                    <select id="customPageLengthSelect" class="form-select form-select-sm custom-select" aria-label="Select number of entries per page">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <!-- Search Input -->
                <div class="ms-3 flex-shrink-1">
                <select id="categorySelect" class="form-select form-select-sm custom-select me-2" aria-label="Select category"> 
                   <option value="" disabled selected>Select a Category</option> 
                    <?php
                    // Call the fetch_sports function to populate the dropdown with sports
                    fetch_sports(); 
                    ?>
                </select>
                </div>
            </div>

            <!-- Right section (Action buttons) -->
            <div class="d-flex">
                <button class="btn btn-primary btn-sm me-2" aria-label="Edit selected users">Edit</button>
                <button class="btn btn-danger btn-sm" aria-label="Delete selected users">Delete</button>
            </div>
        </div>
    </div>
    
    <!-- Body -->
    <div class="custom-card-body bg-white">
        <!-- Table Placeholder -->
        <div class="table-responsive">
            <table id="customUsersTable" class="table table-hover text-center" style="width: 100%;">
                <thead class="table-light">
                    <tr>
                        <th>
                            <!-- Select All Checkbox -->
                            <input type="checkbox" id="customSelectAllCheckbox" aria-label="Select all users">
                        </th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Student ID</th>
                    </tr>
                </thead>
                <tbody id="customTdata">
                    <!-- Data will be loaded here via AJAX -->
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="custom-card-footer bg-light text-dark">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <span id="customTableInfo"></span>
            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul id="customPagination" class="pagination mb-0">
                    <!-- Pagination buttons will be generated here via AJAX -->
                </ul>
            </nav>
        </div>
    </div>
</div>
