<div class="content-wrapper"><!--Statistics cards Starts-->
<!-- Show & hide columns dynamically table -->
<section id="row-selection">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">View Change Log</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block">
                        <table class="display table table-striped table-bordered search-api dataTable">
                            <thead>
                                <tr>
                                    <th>Log ID</th>
                                    <th>Create Date</th>
                                    <th>Details</th>
                                    <th>SQL</th>
                                    <th>IP</th>
                                    <th>Geo Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($logs as $key => $value) { ?>
                                   <tr>
                                        <td><?php echo $value->logId ?></td>
                                        <td><?php echo $value->create_date ?></td>
                                        <td><?php echo $value->details ?></td>
                                        <td><?php echo $value->sql_query ?></td>
                                        <td><?php echo $value->ip_address ?></td>
                                        <td><?php echo $value->geolocation ?></td>
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
