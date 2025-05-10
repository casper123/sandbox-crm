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
                        <h4 class="card-title" id="from-actions-multiple"><?php echo ucfirst($action); ?> Payment</h4>

                        <?php if(isset($success) && $success == true){ ?>
                        <br>
                        <div class="alert alert-info" role="alert">
                            <strong>Payment Saved Successfully.</strong>
                        </div>
                        <?php } if(isset($msg) && $msg != ""){ ?>
                        <br>
                             <div class="alert alert-error" role="alert">
                            <strong><?php echo $msg; ?>.</strong>
                        </div>
                        <?php }if(isset($updated) && $updated == true){ ?>
                        <br>
                        <div class="alert alert-info" role="alert">
                            <strong>Payment Been Updated Successfully.</strong>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'payment/'.$url ?>" >
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12">
                                        <div class="form-body">
                                            <h4 class="form-section">Payment Info</h4>
                                        </div>
                                            <div class="row">
                                                <div class="form-group col-md-4 mb-2">
                                                    <label for="projectinput6">Select Team</label>
                                                    <select required="required" name="team_id" id="team_id" name="status" class="form-control">
                                                        <?php foreach ($teams as $key => $value) { ?>
                                                        <option value="<?php echo $value->id;?>" <?php echo (isset($record->team_id) && $record->team_id == $value->id) ? "selected" : ""; ?>><?php echo $value->team_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                               <div class="form-group col-md-4 mb-2">
                                                    <label for="projectinput6">Select Category</label>
                                                    <select required="required" name="category_id" id="category_id" name="status" class="form-control">
                                                        <?php foreach ($category as $key => $value) { ?>
                                                        <option value="<?php echo $value->id;?>" <?php echo (isset($record->category_id) && $record->category_id == $value->id) ? "selected" : ""; ?>><?php echo $value->name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4 mb-2">
                                                    <label for="projectinput3">Payment Method</label>
                                                    <select required="required" name="payment_method" id="payment_method" name="payment_method" class="form-control">
                                                            <option <?php echo (isset($record->payment_method) && $record->payment_method == "Cash") ? "selected" : ""; ?> value="Cash">Cash</option>
                                                            <option <?php echo (isset($record->payment_method) && $record->payment_method == "MCB") ? "selected" : ""; ?> value="MCB">MCB Online Transfer</option>
                                                            <option <?php echo (isset($record->payment_method) && $record->payment_method == "SCB") ? "selected" : ""; ?> value="SCB">SCB Online Transfer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput3">Payment Type</label>
                                                    <select required="required" name="payment_type" id="payment_type" name="payment_type" class="form-control">
                                                            <option <?php echo (isset($record->payment_type) && $record->payment_type == "MONTHLY") ? "selected" : ""; ?> value="MONTHLY">Monthly</option>
                                                            <option <?php echo (isset($record->payment_type) && $record->payment_type == "ACCOUNTS_PAYABLE") ? "selected" : ""; ?> value="ACCOUNTS_PAYABLE">Accounts Payable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput4">Description</label>
                                                    <textarea class="form-control" name="description"><?php echo isset($record->description) ? $record->description : ""; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput3">Payment Date (YYYY-MM-DD)</label>
                                                    <input type="text" id="issueinput3" value="<?php echo isset($record->create_date) ? $record->create_date : ""; ?>" class="form-control" name="create_date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Opened">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput2">Amount</label>
                                                    <input value="<?php echo isset($record->amount) ? $record->amount : ""; ?>" type="text" id="projectinput2" class="form-control" placeholder="amount" name="amount">
                                                    <input type="hidden" value="<?=$invoice_id?>" name="invoice_id" />
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                   &nbsp;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions clearfix">
                                    <div class="buttons-group float-right">
                                       <a href="<?php echo base_url().'payment/'; ?>"><button type="button" class="btn btn-raised btn-warning mr-1">
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