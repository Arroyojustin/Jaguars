<div class="container-fluid p-0 m-0" id="check" style="display: none;">
    <table class="responsive-table" style="font-size: 24px;">
      <thead>
        <tr>
          <th class="left-align">Training</th>
          <th class="right-align">Status <i class='bx bx-sort'></i></th>
        </tr>
      </thead>
      <tbody id="training-tbody">
        <!-- Rows will be dynamically inserted here -->
      </tbody>
    </table>
    <div class="d-flex justify-content-left" style="position: fixed; bottom: 20px; width: 110%; ">
      <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#excuseModal" style="font-family: 'Petrona', sans-serif; width: 289px; height: 53px; font-size: 24px;">Excuse Letter</button>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="excuseModal" tabindex="-1" aria-labelledby="excuseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="excuseModalLabel">Excuse Letter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="reasonInput" class="form-label">Reason</label>
            <input type="text" class="form-control" id="reasonInput" placeholder="Type your reason here">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>

<!-- <script>
  document.addEventListener("DOMContentLoaded", function() {
    var tbody = document.getElementById('training-tbody');
    for (var i = 1; i <= 31; i++) {
      var row = document.createElement('tr');
      
      var trainingCell = document.createElement('td');
      trainingCell.textContent = 'Day ' + i;
      trainingCell.style.paddingRight = "20px";  // Add space between columns
      row.appendChild(trainingCell);
      
      var statusCell = document.createElement('td');
      row.appendChild(statusCell);
      
      tbody.appendChild(row);
    }
  });
</script> -->
