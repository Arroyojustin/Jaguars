document.addEventListener('DOMContentLoaded', function () {
    const positionList = [];
    const positionListElement = document.getElementById('positionList');
    const positionInput = document.getElementById('position_input');
    const addPositionBtn = document.getElementById('addPositionBtn');

    // Add position to the list
    addPositionBtn.addEventListener('click', function () {
        const position = positionInput.value.trim();
        if (position && !positionList.includes(position)) {
            positionList.push(position);

            // Update UI
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.textContent = position;

            const removeBtn = document.createElement('button');
            removeBtn.className = 'btn btn-sm btn-danger';
            removeBtn.textContent = 'Remove';
            removeBtn.addEventListener('click', function () {
                positionList.splice(positionList.indexOf(position), 1);
                li.remove();
            });

            li.appendChild(removeBtn);
            positionListElement.appendChild(li);
            positionInput.value = '';
        }
    });

    // Submit form
    document.getElementById('addSportForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const sportName = document.getElementById('sport_name').value.trim();

        if (sportName) {
            fetch('controller/add-sportss.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ 
                    sport_name: sportName, 
                    positions: positionList.join(', ') // Send positions as a comma-separated string
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Sport and positions added successfully!');
                    // Clear modal inputs
                    positionList.length = 0; 
                    positionListElement.innerHTML = '';
                    document.getElementById('sport_name').value = '';
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => console.error('Error adding sport:', error));
        }
    });
});
