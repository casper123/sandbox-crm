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
                        <h4 class="card-title" id="from-actions-multiple">Jv <?php echo ucfirst($action); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'jv/'.$url ?>" >
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12">
                                        <div class="form-body">
                                            <h4 class="form-section">Category Info</h4>
                                        </div>
                                        <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput2">From Account</label>
                                                    <select required="required" name="from_account" id="from_account" class="form-control">
                                                        <option value="Cash" <?php echo ($record->from_account == "Cash") ? 'selected' : ''; ?>>Cash</option>
                                                        <option value="MCB" <?php echo ($record->from_account == "MCB") ? 'selected' : ''; ?>>MCB</option>
                                                        <option value="SCB" <?php echo ($record->from_account == "SCB") ? 'selected' : ''; ?>>SCB</option>
                                                        <option value="Foreign" <?php echo ($record->from_account == "Foreign") ? 'selected' : ''; ?>>Foreign</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput2">To Account</label>
                                                    <select required="required" name="to_account" id="to_account" class="form-control">
                                                        <option value="Cash" <?php echo ($record->to_account == "Cash") ? 'selected' : ''; ?>>Cash</option>
                                                        <option value="MCB" <?php echo ($record->to_account == "MCB") ? 'selected' : ''; ?>>MCB</option>
                                                        <option value="SCB" <?php echo ($record->to_account == "SCB") ? 'selected' : ''; ?>>SCB</option>
                                                        <option value="Foreign" <?php echo ($record->from_account == "Foreign") ? 'selected' : ''; ?>>Foreign</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput2">Amount</label>
                                                    <input value="<?php echo $record->amount; ?>" type="text" id="projectinput2" class="form-control" placeholder="Amount" name="amount">
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