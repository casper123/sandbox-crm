                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Menu 
                        </h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Kfoods Menu
                        </div>
                        <div style="text-align: right;" class="panel-heading">
                               <a href="<?php echo base_url()."menu/create" ?>" class="btn btn-primary" role="button">+ Add</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($menu as $key => $value) {  ?>
                                            <tr class="odd gradeX">
                                            <td><?php echo $value->name ?></td>
                                            <td><a href="<?php echo base_url()."menu/edit/".$value->id ?>">Edit</a> | <a href="<?php echo base_url()."menu/delete/".$value->id ?>">Delete</a></td>
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