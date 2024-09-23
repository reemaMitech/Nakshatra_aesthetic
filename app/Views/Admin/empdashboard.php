<?php include __DIR__.'/../Admin/header.php'; ?>

<style>
    .signUp{
        background-color: #104d52 !important;

    }
    .currentTimeOut{
        background-color: #2d8386 !important; 
    }
    .timeoutbtn{
        background-color: #2ab462 !important;
        border-color: #2ab462 !important;
        color: #fff !important;
    }
    .dailyimg{
    margin: 17px 0px !important;
    }
    .card .card-header
    {
        padding: 10px !important;
    color: #fff !important;
}
    
</style>

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-md-12 col-xl-6">
            <div class="card" data-aos="fade-up" data-aos-delay="900">
            <?php
                // Determine the status of the punch-in/out for the current day
                $punchInDone = false;
                $punchOutDone = false;

                if (!empty($employeeTiming)) {
                    if (!empty($employeeTiming[0]['start_time'])) {
                        $punchInDone = true;
                    }
                    if (!empty($employeeTiming[0]['end_time'])) {
                        $punchOutDone = true;
                    }
                }

                // Enable Time Out button only if punchIn is done and punchOut is not done
                $enableTimeOutButton = $punchInDone && !$punchOutDone;
                ?>
              
                <div class="card-body">
                    <div class="card-header signUp">
                        <p class="card-title date-text" id="currentDate"><?= date('Y-m-d') ?></p>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title"> Note: Click on the button to start work.<br><br></h6>
                        <div class="text-center">
                            <button id="punchButton" type="button" class="btn mt-3">Loading...</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-6">
            <div class="card" data-aos="fade-up" data-aos-delay="1000">
              
                <div class="card-body">
                    <div class="card-header currentTimeOut">
                        <p class="card-title date-text" id="currentTimeOut"><?= date('Y-m-d') ?></p>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title"> Note: For urgent office exits, click "Time Out" to provide necessary details. </h6>
                        <div class="text-center">
                            <button type="button" id="timeoutButton" class="btn btn-default mt-3 timeoutbtn" data-toggle="modal"
                                data-target="#modal-default" <?= $enableTimeOutButton ? '' : 'disabled' ?>>
                                Time Out
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/../Admin/footer.php'; ?>

<script>
   // Get current date
   var today = new Date();
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        var currentDate = today.toLocaleDateString('en-US', options);

        // Update the date-text element with today's date
        document.getElementById("currentDate").innerText = currentDate;
        document.getElementById("currentTimeOut").innerText = currentDate;
        $(document).ready(function() {
    // Fetch current punch status
    $.ajax({
        url: '<?= base_url('getPunchStatus'); ?>',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            var punchButton = $('#punchButton');
            var timeoutButton = $('#timeoutButton');

            // Determine if there is an active punch in (start_time exists and end_time is null)
            var hasActivePunchIn = data.timingData.some(function(entry) {
                return entry.action === 'punchIn' && entry.end_time === null;
            });

            if (data.allowPunchIn && !hasActivePunchIn) {
                punchButton.text('Punch In');
                punchButton.attr('data-action', 'punchIn');
                punchButton.css({
                    'background-color': '#28a745', // Success color
                    'border-color': '#28a745',
                    'color': '#fff'
                });
                timeoutButton.prop('disabled', true);
            } else if (hasActivePunchIn) {
                punchButton.text('Punch Out');
                punchButton.attr('data-action', 'punchOut');
                punchButton.css({
                    'color': '#ffffff',
                    'background-color': '#f64c4c',
                    'border-color': '#f64c4c'
                });
                timeoutButton.prop('disabled', false); // Enable Time Out button
            } else {
                // Disable the punch button if no punch action is allowed or if punching is complete
                punchButton.text('Punch In Complete for Today');
                punchButton.prop('disabled', true);
                punchButton.css({
                    'color': '#cccccc', // Disabled color
                    'background-color': '#011110', // Disabled background color
                    'border-color': '#011110'
                });
                timeoutButton.prop('disabled', true);
            }
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });

    // Handle punch button click
$('#punchButton').on('click', function() {
    var action = $(this).attr('data-action');
    var timeoutButton = $('#timeoutButton');

    // Check current time
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();

    // Check if it's before 6:30 PM
    if (action === 'punchOut' && (hours < 18 || (hours === 18 && minutes < 30))) {
        // Show confirmation box
        var confirmPunchOut = confirm("It is before 6:30 PM. Are you sure you want to punch out?");
        if (!confirmPunchOut) {
            return; // Stop the execution if the employee does not confirm
        }
    }

    $.ajax({
        url: '<?= base_url('punchAction'); ?>',
        method: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify({ action: action }),
        success: function(data) {
            if (data.status === 'success') {
                if (action === 'punchIn') {
                    $('#punchButton').text('Punch Out')
                        .attr('data-action', 'punchOut')
                        .css({
                            'color': '#ffffff !important',
                            'background-color': '#f64c4c !important',
                            'border-color': '#f64c4c !important'
                        });
                    $('#statusText').text('You are punched in');
                    timeoutButton.prop('disabled', false); // Enable Time Out button
                } else if (action === 'punchOut') {
                    $('#punchButton').text('Punch In Complete for Today')
                        .prop('disabled', true)
                        .css({
                            'color': '#cccccc !important',
                            'background-color': '#011110 !important',
                            'border-color': '#011110 !important'
                        });
                    $('#statusText').text('You are punched out');
                    timeoutButton.prop('disabled', true); // Disable Time Out button
                }
            }
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
});

});




    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("TimeOut-form").addEventListener("submit", function(event) {
            var date = document.getElementById("date").value;
            var from = document.getElementById("from").value;
            var to = document.getElementById("to").value;
            var reason = document.getElementById("reason").value;

            if (date.trim() === "" || from.trim() === "" || to.trim() === "" || reason.trim() === "") {
                alert("Please fill in all fields.");
                event.preventDefault();
            }
        });
    });



</script>

