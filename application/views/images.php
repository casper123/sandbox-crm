                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Images 
                        </h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Kfoods Images
                        </div>
                        <div style="text-align: right;" class="panel-heading">
                               <a href="<?php echo base_url()."images/create" ?>" class="btn btn-primary" role="button">+ Add</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($images as $key => $value) {  ?>
                                            <tr class="odd gradeX">
                                            <td><?php echo $value->path ?></td>
                                            <td><img width="100" height="100" src="<?php echo GALLARY_IMAGES."/".$value->path ?>" alt=""> </td>

                                            <td><!-- <a href="<?php echo base_url()."images/edit/".$value->id ?>">Edit</a> | --> <a href="<?php echo base_url()."images/delete/".$value->id ?>">Delete</a></td>
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