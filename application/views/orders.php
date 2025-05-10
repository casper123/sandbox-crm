                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Orders 
                        </h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Kfoods Orders
                        </div>
                        <div style="text-align: right;" class="panel-heading">
<!--                                <a href="<?php //echo base_url()."orders/create" ?>" class="btn btn-primary" role="button">+ Add</a> -->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Address</th>
                                            <th>Phone NO</th>
                                            <th>Email</th>
                                            <th>Details</th>
                                            <th>Total Amount</th>
<!--                                             <th>Status</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orders as $key => $value) {  ?>
                                            <tr class="odd gradeX">
                                            <td><?php echo $value->name ?></td>
                                            <td><?php echo $value->address ?></td>
                                            <td><?php echo $value->c_address ?></td>
                                            <td><?php echo $value->phone ?></td>
                                            <td><?php echo $value->email ?></td>
                                            <td><?php 

                                                    if(isset($value->order_details)){
                                                        $temp_obj = json_decode($value->order_details);
                                                        if(count_($temp_obj) > 0){
                                                            foreach ($temp_obj as $key => $v2) {

                                                                echo (isset($v2->name) && $v2->name != "") ? "<strong> Item Name : </strong> <span>".$v2->name."</span><br>" : "";

                                                                echo (isset($v2->quantity) && $v2->quantity != "") ? "<strong> Quantity : </strong> <span>".$v2->quantity."</span><br>" : "";
                                                                echo "<hr>";
                                                            }
                                                        }
                                                        
                                                    }
                                             ?></td>
                                            <td><?php echo $value->total_amount ?> / PKR</td>
<!--                                             <td><?php // echo $value->status ?></td> -->
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->