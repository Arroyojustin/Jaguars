document.addEventListener('DOMContentLoaded', function () {
    // Function to fetch sports and populate the dropdown and container
    function fetchSports() {
        fetch('controller/add-sport.php', { method: 'GET' })
            .then(response => response.json())
            .then(data => {
                const sportCategory = document.getElementById('sportCategory');
                const sportsContainer = document.getElementById('sportsContainer'); // Sports container
                sportCategory.innerHTML = '<option value="" disabled selected>Select a Category</option>';
                sportsContainer.innerHTML = ''; // Clear container before adding new items
                
                data.forEach(sport => {
                    // Add to dropdown
                    const option = document.createElement('option');
                    option.value = sport.toLowerCase();
                    option.textContent = sport;
                    sportCategory.appendChild(option);
                    
                    // Add to sports container (as clickable button)
                    const sportButton = document.createElement('button');
                    sportButton.className = 'btn btn-outline-secondary m-2';  // Secondary outline button style
                    sportButton.textContent = sport;
                    sportButton.type = 'button'; // Set the button type to prevent form submission

                    // Add click event to the sport button
                    sportButton.addEventListener('click', function () {
                        alert(`You clicked on ${sport}!`);
                    });

                    sportsContainer.appendChild(sportButton);
                });
            })
            .catch(error => console.error('Error fetching sports:', error));
    }

    // Call fetchSports on page load
    fetchSports();

    // Add new sport
    document.getElementById('addSportForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const sportName = document.getElementById('sport_name').value;

        fetch('controller/add-sport.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ sport_name: sportName })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // SweetAlert success notification
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Sport added successfully',
                        timer: 2000,
                        background: '#ab9f6ca',
                        iconColor: '#a2e7d32',
                        color: '#a155724',
                        showConfirmButton: false // Message returned from the server
                    }).then(() => {
                        document.getElementById('sport_name').value = ''; // Clear input
                        fetchSports(); // Refresh the sports dropdown and container
                        
                        // Close the modal if it's being used (optional)
                        const modal = document.getElementById('addSportModal');
                        if (modal) {
                            const modalInstance = bootstrap.Modal.getInstance(modal);
                            modalInstance.hide(); // Close the modal using Bootstrap Modal API
                        }
                    });
                } else {
                    // SweetAlert error notification
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message,  // Message returned from the server
                    });
                }
            })
            .catch(error => console.error('Error adding sport:', error));
    });
});
