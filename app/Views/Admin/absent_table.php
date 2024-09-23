<table class="table-example1 table table-bordered table-striped">
    <thead>
        <tr>
            <th>Sr. No.</th>
            <th>Employee Name</th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 1; ?>
        <?php if (!empty($absent_list)) { ?>
            <?php foreach ($absent_list as $data): ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $data->first_name; echo $data->middle_name; echo $data->last_name;  ?></td>
                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="2" class="text-center">No data available</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
