                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Reservation 
                        </h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Kfoods Reservation
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <?php if($selectedTab == "event_reservation") { ?>
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Date of event</th>
                                                <th>Total Guest</th>
                                                <th>Event Type</th>
                                                <th>Deal</th>
                                                <th>Total Amount</th>
                                                <th>Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($resrevation as $key => $value) {  ?>
                                                <tr class="odd gradeX">
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $value->email; ?></td>
                                                <td><?php echo $value->contact; ?></td>
                                                <td><?php echo $value->start_time; ?></td>
                                                <td><?php echo $value->end_time; ?></td>
                                                <td><?php echo $value->date_of_event; ?></td>
                                                <td><?php echo $value->total_guest; ?></td>
                                                <td><?php echo $value->event_type; ?></td>
                                                <td><?php echo $value->deal_name; ?></td>
                                                <td><?php echo $value->total_amount; ?></td>
                                                <td><?php echo $value->special_notes; ?></td>
                                                </tr>
                                        <?php } ?>
                                    </tbody>
                                    <?php } ?>
                                    
                                    <?php if($selectedTab == "table_reservation") { ?>
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>floor</th>
                                                <th>Time</th>   
                                                <th>Date Of Reservation</th>
                                                <th>Total Guest</th>
                                                <th>Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($resrevation as $key => $value) {  ?>
                                                <tr class="odd gradeX">
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $value->email; ?></td>
                                                <td><?php echo $value->contact; ?></td>
                                                <td><?php echo $value->floor; ?></td>
                                                <td><?php echo $value->time; ?></td>
                                                <td><?php echo $value->date_of_reservation; ?></td>
                                                <td><?php echo $value->total_guest; ?></td>
                                                <td><?php echo $value->special_notes; ?></td>
                                                </tr>
                                        <?php } ?>
                                    </tbody>
                                    <?php } ?>

                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->