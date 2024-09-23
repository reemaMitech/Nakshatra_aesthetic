<table id="example1"  class="table-example1  table table-bordered table-striped">
    <thead>
        <tr>
            <th>Sr. No.</th>
            <th>Employee Name</th>
            <th>Punch In</th>
            <th>Time Out</th>
            <th>Punch Out</th>
            <th>Total Time</th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 1; ?>
        <?php
        // echo "<pre>";print_r($attendance_list);exit();
        if (!empty($attendance_list)) { ?>
            <?php foreach ($attendance_list as $data): ?>
                <?php
                $adminModel = new \App\Models\AdminModel();
                $wherecond = array('Emp_id'=> $data->emp_id, 'Date' => date('Y-m-d'));
                $empdata = $adminModel->getsinglerow('tbl_timeout', $wherecond);
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $data->first_name; echo $data->middle_name; echo $data->last_name;  ?></td>
                    <td>
                        <?php 
                        if (!empty($data->start_time)) { 
                            echo date("H:i", strtotime($data->start_time)); 
                        }
                        ?>
                    </td>
                    <td>
                        <?php 
                        if (!empty($empdata)) { 
                            echo $empdata->from_time . " - " . $empdata->to_time; 
                            $from_time = strtotime($empdata->from_time);
                            $to_time = strtotime($empdata->to_time);
                            if ($from_time !== false && $to_time !== false && $to_time > $from_time) {
                                $total_seconds = $to_time - $from_time;
                                $hours = floor($total_seconds / 3600);
                                $minutes = floor(($total_seconds % 3600) / 60);
                                echo " (" . $hours . "h " . $minutes . "m)";
                            } else {
                                echo " (Invalid time)";
                            }
                        }
                        ?>
                    </td>                                    
                    <td>
                        <?php 
                        if (!empty($data->end_time)) { 
                            echo date("H:i", strtotime($data->end_time)); 
                        }
                        ?>
                    </td>
                    <td>
                        <?php 
                        if (!empty($data->start_time) && !empty($data->end_time)) { 
                            $start_time = strtotime($data->start_time);
                            $end_time = strtotime($data->end_time);
                            $total_seconds = $end_time - $start_time;
                            $hours = floor($total_seconds / 3600);
                            $minutes = floor(($total_seconds % 3600) / 60);
                            echo $hours . "h " . $minutes . "m";
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="6" class="text-center">No data available</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
