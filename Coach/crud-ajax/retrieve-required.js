// Fetch the list of requirements
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

                // Loop through fetched requirements and display them
                data.requirements.forEach(requirement => {
                    const btn = document.createElement('button');
                    btn.className = 'btn btn-outline-secondary w-100 mb-2'; // Full width and spacing
                    btn.textContent = `${requirement.first_name} ${requirement.last_name}`;
                    btn.setAttribute('data-requirements-id', requirement.id); // Add data-id attribute
                    btn.addEventListener('click', function () {
                        displayStudentDetails(requirement);
                    });
                    listContainer.appendChild(btn);
                });

                container.appendChild(listContainer);
            } else {
                container.textContent = 'No requirements found.';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Failed to fetch requirements. Please try again.'
            });
        });
}

// Display student details in the right-side container
function displayStudentDetails(requirement) {
    const detailsContainer = document.getElementById('studentDetails');

    // HTML for student details and action buttons
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
        <button class="btn btn-outline-success" id="approveBtn">Approve</button>
        <button class="btn btn-outline-danger" id="rejectBtn">Reject</button>
    `;

    detailsContainer.innerHTML = detailsHTML;

    // Handle Approve button click
    document.getElementById('approveBtn').addEventListener('click', function () {
        updateRequirementStatus(requirement.id, requirement.first_name + ' ' + requirement.last_name, 'approve');
    });

    // Reject button functionality
    document.getElementById('rejectBtn').addEventListener('click', function () {
        updateRequirementStatus(requirement.id, requirement.first_name + ' ' + requirement.last_name, 'reject');
    });
}

// Update requirement status
function updateRequirementStatus(requirementsId, name, status) {
    fetch('controller/update-requirement-status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            requirements_id: requirementsId,
            name: name,
            status: status
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Approved Successfully',
                    timer: 2000,
                    background: '#ab9f6ca',
                    iconColor: '#a2e7d32',
                    color: '#a155724',
                    showConfirmButton: false
                });

                // Remove the approved student from the requirements container (DOM)
                const container = document.getElementById('requirementsContainer');
                const requirementButton = container.querySelector(`[data-requirements-id="${requirementsId}"]`);
                if (requirementButton) {
                    requirementButton.remove(); // Remove the button from the DOM
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to update the status. Please try again.'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'An error occurred. Please try again.'
            });
        });
}

// Fetch requirements on page load
document.addEventListener('DOMContentLoaded', fetchRequirements);
