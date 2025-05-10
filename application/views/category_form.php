<?php
    if(isset($id) && $id > 0){
        $url =  "edit/".$id;
        $action = "edit";
    }else{
       $action = $url =  "create";
    }
    
    ?>
<div class="content-wrapper">
    <!--Statistics cards Starts-->
    <section id="form-action-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="from-actions-multiple">Category <?php echo ucfirst($action); ?></h4>

                        <?php if(isset($success) && $success == true){ ?>
                        <br>
                        <div class="alert alert-info" role="alert">
                            <strong>Category Saved Successfully.</strong>
                        </div>
                        <?php } if(isset($msg) && $msg != ""){ ?>
                        <br>
                             <div class="alert alert-error" role="alert">
                            <strong><?php echo $msg; ?>.</strong>
                        </div>
                        <?php }if(isset($updated) && $updated == true){ ?>
                        <br>
                        <div class="alert alert-info" role="alert">
                            <strong>Category Been Updated Successfully.</strong>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'category/'.$url ?>" >
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12">
                                        <div class="form-body">
                                            <h4 class="form-section">Category Info</h4>
                                        </div>
                                        <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput2">Category Type</label>
                                                    <select required="required" name="category_type" id="category_type" class="form-control">
                                                        <option value="1" <?php echo ($record->category_type == 1) ? 'selected' : ''; ?>>Expense</option>
                                                        <option value="2" <?php echo ($record->category_type == 2) ? 'selected' : ''; ?>>Income</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput2">Name</label>
                                                    <input value="<?php echo isset($record->name) ? $record->name : ""; ?>" type="text" id="projectinput2" class="form-control" placeholder="name" name="name">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput4">Description</label>
                                                    <textarea class="form-control" name="description"><?php echo isset($record->description) ? $record->description : ""; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput4">Spending Limit</label>
                                                    <input value="<?php echo isset($record->spending_limit) ? $record->spending_limit : ""; ?>" type="text" id="projectinput2" class="form-control" placeholder="spending_limit" name="spending_limit">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions clearfix">
                                    <div class="buttons-group float-right">
                                       <button type="button" class="btn btn-raised btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-raised btn-primary mr-1">
                                        <i class="fa fa-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Form actions layout section end -->
</div>