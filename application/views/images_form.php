<?php
$url = (isset($id) && $id > 0) ? "edit/".$id : "create";
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Add / Edit Gallary 
        </h1>
    </div>
 </div>
    <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Gallary Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if(isset($msg) && $msg != ""){ ?>
                                    <div class="alert alert-danger">
                                        <strong>Error !</strong> Unkown Error.
                                    </div>
                                    <?php } ?>
                                    <?php if(isset($success) && $success != ""){ ?>
                                    <div class="alert alert-success">
                                        <strong>Success !</strong> Record updated successfully.
                                    </div>
                                    <?php } ?>
                                    <form method="post" role="form" action="<?php echo base_url().'images/'.$url ?>" enctype="multipart/form-data" >
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="path" >
                                            <?php if(isset($data->path)){ ?>
                                            <img src="<?php echo GALLARY_IMAGES.$data->path ?>" width='100' height='100' >
                                            <?php } ?>
                                        </div>

                                        <button type="submit" class="btn btn-default">Save</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>