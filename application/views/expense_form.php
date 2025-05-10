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
                        <h4 class="card-title" id="from-actions-multiple">Expense <?php echo ucfirst($action); ?></h4>

                        <?php if(isset($success) && $success == true){ ?>
                        <br>
                        <div class="alert alert-info" role="alert">
                            <strong>Expense Saved Successfully.</strong>
                        </div>
                        <?php } if(isset($msg) && $msg != ""){ ?>
                        <br>
                             <div class="alert alert-error" role="alert">
                            <strong><?php echo $msg; ?>.</strong>
                        </div>
                        <?php }if(isset($updated) && $updated == true){ ?>
                        <br>
                        <div class="alert alert-info" role="alert">
                            <strong>Expense Been Updated Successfully.</strong>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'expense/'.$url ?>" >
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12">
                                        <div class="form-body">
                                            <h4 class="form-section">Expense Info</h4>
                                        </div>
                                            <div class="row">
                                               <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput6">Select Category</label>
                                                    <select required="required" name="category_id" id="category_id" name="status" class="form-control">
                                                        <?php foreach ($category as $key => $value) { ?>
                                                        <option value="<?php echo $value->id;?>" <?php echo (isset($record->category_id) && $record->category_id == $value->id) ? "selected" : ""; ?>><?php echo $value->name; ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput2">Amount</label>
                                                    <input value="<?php echo isset($record->amount) ? $record->amount : ""; ?>" type="text" id="projectinput2" class="form-control" placeholder="amount" name="amount">
                                                </div>
                                            </div>
                                            <div class="row">
                                                 <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput3">Expense Date (YYYY-MM-DD)</label>
                                                    <input type="text" id="issueinput3" value="<?php echo isset($record->create_date) ? $record->create_date : ""; ?>" class="form-control" name="create_date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Opened">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput3">Expense Method</label>
                                                    <select required="required" name="expense_method" id="expense_method" name="expense_method" class="form-control">
                                                            <option <?php echo (isset($record->expense_method) && $record->expense_method == "Cash") ? "selected" : ""; ?> value="Cash">Cash</option>
                                                            <option <?php echo (isset($record->expense_method) && $record->expense_method == "MCB") ? "selected" : ""; ?> value="MCB">MCB</option>
                                                            <option <?php echo (isset($record->expense_method) && $record->expense_method == "SCB") ? "selected" : ""; ?> value="SCB">SCB</option>
                                                            <option <?php echo (isset($record->expense_method) && $record->expense_method == "Foreign") ? "selected" : ""; ?> value="Foreign">Foreign</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput3">Expense Type</label>
                                                    <select required="required" name="expense_type" id="expense_type" name="expense_type" class="form-control">
                                                            <option <?php echo (isset($record->expense_type) && $record->expense_type == "MONTHLY") ? "selected" : ""; ?> value="MONTHLY">Monthly</option>
                                                            <option <?php echo (isset($record->expense_type) && $record->expense_type == "ACCOUNTS_RECEIVABLE") ? "selected" : ""; ?> value="ACCOUNTS_RECEIVABLE">Accounts Receivable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput4">Description</label>
                                                    <textarea class="form-control" name="description"><?php echo isset($record->description) ? $record->description : ""; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions clearfix">
                                    <div class="buttons-group float-right">
                                       <a href="<?php echo base_url().'expense/'; ?>"><button type="button" class="btn btn-raised btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                        </button></a>
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