<?php
$url = (isset($id) && $id > 0) ? "edit/".$id : "create";
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Add / Edit Menu 
        </h1>
    </div>
 </div>
    <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Menu Form
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
                                <form method="post" action="<?php echo base_url().'menu/'.$url ?>" >
                                        <div class="form-group">
                                            <label>Menu Name</label>
                                            <input class="form-control" name="name" type="text" value="<?php echo isset($data->name) ? $data->name : "";  ?>">
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