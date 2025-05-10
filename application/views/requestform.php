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
                        <h4 class="card-title" id="from-actions-multiple">Request <?php echo ucfirst($action); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'request/'.$url ?>" >
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12">
                                        <div class="form-body">
                                            <h4 class="form-section">Request</h4>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="projectinput2">Name</label>
                                                <input value="<?php echo $record->full_name; ?>" type="text" id="projectinput2" class="form-control" placeholder="Name" name="full_name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="projectinput2">Email</label>
                                                <input value="<?php echo $record->email_address; ?>" type="text" id="projectinput2" class="form-control" placeholder="Name" name="email_address">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="projectinput2">Phone</label>
                                                <input value="<?php echo $record->contact_number; ?>" type="text" id="projectinput2" class="form-control" placeholder="Name" name="contact_number">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="projectinput2">Status</label>
                                                <input value="<?php echo $record->current_status; ?>" type="hidden" id="projectinput2" class="form-control" placeholder="Name" name="current_status_old">
                                                <select required="required" name="current_status" id="current_status" class="form-control">
                                                    <option value="PENDING" <?php echo ($record->current_status == "PENDING") ? 'selected' : ''; ?>>PENDING</option>
                                                    <option value="VISIT TODAY" <?php echo ($record->current_status == "VISIT TODAY") ? 'selected' : ''; ?>>VISIT TODAY</option>
                                                    <option value="VISIT TOMORROW" <?php echo ($record->current_status == "VISIT TOMORROW") ? 'selected' : ''; ?>>VISIT TOMORROW</option>
                                                    <option value="VISIT LATER" <?php echo ($record->current_status == "VISIT LATER") ? 'selected' : ''; ?>>VISIT LATER</option>
                                                    <option value="VISIT DONE" <?php echo ($record->current_status == "VISIT DONE") ? 'selected' : ''; ?>>VISIT DONE</option>
                                                    <option value="NOT PICKUP" <?php echo ($record->current_status == "NOT PICKUP") ? 'selected' : ''; ?>>NOT PICKUP</option>
                                                    <option value="NOT INTERESTED" <?php echo ($record->current_status == "NOT INTERESTED") ? 'selected' : ''; ?>>NOT INTERESTED</option>
                                                    <option value="CONFIRMED" <?php echo ($record->current_status == "CONFIRMED") ? 'selected' : ''; ?>>CONFIRMED</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="projectinput2">Interested In</label>
                                                <select required="required" name="interested_in" id="interested_in" class="form-control">
                                                    <option value="Flex Desk" <?php echo ($record->interested_in == "Flex Desk") ? 'selected' : ''; ?>>Flex Desk</option>
                                                    <option value="Private Room" <?php echo ($record->interested_in == "Private Room") ? 'selected' : ''; ?>>Private Room</option>
                                                    <option value="Meeting Room" <?php echo ($record->interested_in == "Meeting Room") ? 'selected' : ''; ?>>Meeting Room</option>
                                                    <option value="Event Space" <?php echo ($record->interested_in == "Event Space") ? 'selected' : ''; ?>>Event Space</option>
                                                    <option value="Virtual Office" <?php echo ($record->interested_in == "Virtual Office") ? 'selected' : ''; ?>>Virtual Office</option>
                                                    <option value="Other" <?php echo ($record->interested_in == "Other") ? 'selected' : ''; ?>>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr/>
                                        <legend>Followup</legend>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <table  class="display table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Create Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <?php foreach ($followup as $key => $value) { ?>
                                                    <tr>
                                                        <td><?=$value->create_date?></td>
                                                        <td><?=$value->followup?></td>
                                                    </tr>
                                                <? } ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="projectinput4">Followup Details</label>
                                                <textarea class="form-control" name="followup"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 mb-2">
                                                <label for="projectinput1">Next Followup</label>
                                                <input type="date" id="projectinput1" class="form-control" value="<?=$record->next_followup?>" placeholder="Next Followup" name="next_followup">
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="projectinput2">Notes</label>
                                                <input value="<?php echo $record->notes; ?>" type="text" id="projectinput2" class="form-control" placeholder="notes" name="notes">
                                            </div>
                                        </div> -->
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