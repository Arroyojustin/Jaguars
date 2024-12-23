<div class="container-fluid p-0 m-0" id="strong" style="display: none;">
    <div class="schedule-container">
        <div class="schedule-header">
            <h1>Training Schedule</h1>
        </div>
        <form id="schedule-form">
            <div class="schedule-form-group">
                <label for="training-date">Training Date</label>
                <input type="date" id="training-date" name="training-date" required>
            </div>
            <div class="schedule-form-group">
                <button type="submit">Add Training Date</button>
            </div>
        </form>
        <div id="calendar"></div>
    </div> 
</div>

<script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: false,
                events: []
            });

            $('#schedule-form').on('submit', function(event) {
                event.preventDefault();
                var trainingDate = $('#training-date').val();
                if (trainingDate) {
                    $('#calendar').fullCalendar('renderEvent', {
                        title: 'Training',
                        start: trainingDate,
                        allDay: true
                    }, true); // stick the event
                }
            });
        });
    </script>
