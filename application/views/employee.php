<div class="content-wrapper"><!--Statistics cards Starts-->
<!-- Show & hide columns dynamically table -->
<section id="row-selection">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employee Report</h4>
                        <a href="<?php echo base_url()."employee/create" ?>">  
                        <button style="float: right" class="btn btn-primary mr-1"><i class="ft-file"></i>&nbsp; Create Report</button>
                    </a>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block">
                        <table class="display table table-striped table-bordered search-api dataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                    <th>Work Done</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($employee as $key => $value) { ?>
                                   <tr>
                                        <td><?php echo $value->report_id ?></td>
                                        <td><?php echo $value->employee_name ?></td>
                                        <td><?php echo $value->create_date ?></td>
                                        <td><?php echo $value->time_in ?></td>
                                        <td><?php echo $value->time_out ?></td>
                                        <td><?php echo $value->work_done ?></td>
                                    </tr>
                                <?php } ?>
                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
