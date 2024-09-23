<table class="table-example1 table table-bordered table-striped">
    <thead>
        <tr>
            <th>Sr. No.</th>
            <th>Employee Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 1; ?>
        <?php 
        // echo "<pre>";print_r($employees);exit();
        if (!empty($employees)) { ?>
            <?php foreach ($employees as $data): ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td>
                        <?php echo $data->first_name . ' ' . $data->middle_name . ' ' . $data->last_name; ?>
                    </td>
                    <td>
                        <?php
                        // Check if the employee has punched in and punched out for the current date
                        $currentDate = date('Y-m-d');
                        $hasPunchedIn = !empty($data->punch_in) && date('Y-m-d', strtotime($data->punch_in)) === $currentDate;
                        $hasPunchedOut = !empty($data->punch_out) && date('Y-m-d', strtotime($data->punch_out)) === $currentDate;
                        ?>

                        <?php if ($hasPunchedIn && $hasPunchedOut): ?>
                            <!-- If both punch in and punch out are set, display a message -->
                            <p class="text-success">You are already present today.</p>
                        <?php else: ?>
                            <!-- Punch In Section -->
                            <div class="punch-in-section" id="punch-in-section-<?= $data->id; ?>" 
                                 style="<?= !empty($data->punch_in) ? 'display: none;' : ''; ?>">
                                <label for="start_time_<?= $data->id; ?>">Start Time:</label>
                                <input type="datetime-local" id="start_time_<?= $data->id; ?>" class="form-control start-time-input" data-emp-id="<?= $data->id; ?>">
                                <button class="btn btn-success punch-in-btn" data-emp-id="<?= $data->id; ?>">Punch In</button>
                            </div>

                            <!-- Punch Out Section -->
                            <div class="punch-out-section" id="punch-out-section-<?= $data->id; ?>" 
                                 style="<?= empty($data->punch_in) || !empty($data->punch_out) ? 'display: none;' : ''; ?>">
                                <label for="end_time_<?= $data->id; ?>">End Time:</label>
                                <input type="datetime-local" id="end_time_<?= $data->id; ?>" class="form-control end-time-input" data-emp-id="<?= $data->id; ?>">
                                <button class="btn btn-danger punch-out-btn" data-emp-id="<?= $data->id; ?>">Punch Out</button>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="3" class="text-center">No data available</td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<script>
   $(document).ready(function() {
    // Handle Punch In action
    $('.punch-in-btn').on('click', function() {
        var empId = $(this).data('emp-id');
        var startTime = $('#start_time_' + empId).val();

        if (!startTime) {
            alert('Please select a start time.');
            return;
        }

        $.ajax({
            url: '<?= base_url(); ?>punch_in',
            type: 'POST',
            data: { emp_id: empId, start_time: startTime },
            success: function(response) {
                if (response.success) {
                    alert('Punch In Successful!');
                    // Hide punch-in section and show punch-out section for this employee only
                    $('#punch-in-section-' + empId).hide();  
                    $('#punch-out-section-' + empId).show(); 
                } else {
                    alert('Error: ' + response.message);
                }
            }
        });
    });

    // Handle Punch Out action
    $('.punch-out-btn').on('click', function() {
        var empId = $(this).data('emp-id');
        var endTime = $('#end_time_' + empId).val();

        alert(empId);
        alert(endTime);

        if (!endTime) {
            alert('Please select an end time.');
            return;
        }

        $.ajax({
            url: '<?= base_url(); ?>punch_out',
            type: 'POST',
            data: { emp_id: empId, end_time: endTime },
            success: function(response) {
                if (response.success) {
                    alert('Punch Out Successful!');
                    // Optionally, update the UI after punch-out
                    $('#punch-out-section-' + empId).hide(); 
                    // Show the message indicating the user is already present today
                    $('<p class="text-success">You are already present today.</p>').insertAfter('#punch-in-section-' + empId);
                } else {
                    alert('Error: ' + response.message);
                }
            }
        });
    });
});

</script>
