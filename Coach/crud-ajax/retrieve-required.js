function fetchRequirements() {
    fetch('controller/get-submit.php')
    .then(response => response.json())
    .then(data => {
        const container = document.getElementById('requirementsContainer');
        container.innerHTML = ''; // Clear the container

        if (data.success) {
            // Create a vertical list container
            const listContainer = document.createElement('div');
            listContainer.className = 'd-flex flex-column'; // Vertical stack

            // Loop through the fetched requirements and display them as vertical buttons
            data.requirements.forEach(requirement => {
                const btn = document.createElement('button');
                btn.className = 'btn btn-outline-secondary w-100 mb-2'; // Full width and spacing
                btn.textContent = `${requirement.first_name} ${requirement.last_name}`;
                // Add an event listener for click
                btn.addEventListener('click', function() {
                    displayStudentDetails(requirement);
                });
                listContainer.appendChild(btn);
            });

            // Append the list container to the requirements container
            container.appendChild(listContainer);
        } else {
            container.textContent = 'No requirements found.';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to fetch requirements. Please try again.');
    });
}

// This function will display the student's details in the right-side container
function displayStudentDetails(requirement) {
    const detailsContainer = document.getElementById('studentDetails');
    const approveRejectButtons = document.getElementById('approveRejectButtons');
    const backButton = document.getElementById('backButton');
    const requiredSection = document.getElementById('required');

    // Create HTML content for the student details
    const detailsHTML = `
        <p><strong>Name:</strong> ${requirement.first_name} ${requirement.last_name}</p>
        <p><strong>Student ID:</strong> ${requirement.student_id}</p>
        <p><strong>Gender:</strong> ${requirement.gender}</p>
        <p><strong>Sport Category:</strong> ${requirement.sport_category}</p>
        <p><strong>Height:</strong> ${requirement.height} cm</p>
        <p><strong>Weight:</strong> ${requirement.weight} kg</p>
        <p><strong>BMI:</strong> ${requirement.bmi}</p>
        <p><strong>Phone Number:</strong> ${requirement.phone_number}</p>
        <p><strong>Health Protocol:</strong> ${requirement.health_protocol || 'N/A'}</p>

         <!-- Approve and Reject Buttons -->
        <button class="btn btn-outline-success" id="approveBtn">Approve</button>
        <button class="btn btn-outline-danger" id="rejectBtn">Reject</button>
    `;

    // Set the details in the container
    detailsContainer.innerHTML = detailsHTML;

    // Show the details section
    requiredSection.style.display = 'block';

    // Show the back button
    backButton.style.display = 'block';

    // Show the approve/reject buttons
    approveRejectButtons.style.display = 'block';

    // Add back button functionality
    backButton.addEventListener('click', function() {
        requiredSection.style.display = 'none';
    });

    // Handle Approve button click
    document.getElementById('approveBtn').addEventListener('click', function() {
        updateRequirementStatus(requirement.student_id, 'approved');
    });

    // Handle Reject button click
    document.getElementById('rejectBtn').addEventListener('click', function() {
        updateRequirementStatus(requirement.student_id, 'rejected');
    });
}

// Function to update the requirement status (approve/reject)
function updateRequirementStatus(studentId, status) {
    fetch('controller/update-requirement-status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            student_id: studentId,
            status: status
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`The student has been ${status}.`);
            fetchRequirements(); // Refresh the list
        } else {
            alert('Failed to update the status. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
}

// Call the function to fetch requirements on page load
document.addEventListener('DOMContentLoaded', fetchRequirements);
