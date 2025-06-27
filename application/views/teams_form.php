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
                        <h4 class="card-title" id="from-actions-multiple">Team <?php echo ucfirst($action); ?></h4>

                        <?php if(isset($success) && $success == true){ ?>
                        <br>
                        <div class="alert alert-info" role="alert">
                            <strong>Team Has Been Created Successfully.</strong>
                        </div>
                        <?php } if(isset($msg) && $msg != ""){ ?>
                        <br>
                             <div class="alert alert-error" role="alert">
                            <strong><?php echo $msg; ?>.</strong>
                        </div>
                        <?php }if(isset($updated) && $updated == true){ ?>
                        <br>
                        <div class="alert alert-info" role="alert">
                            <strong>Team Data Has Been Updated Successfully.</strong>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'teams/'.$url ?>" >
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12">
                                        <div class="form-body">
                                            <h4 class="form-section">Team Info</h4>
                                        </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput6">Status</label>
                                                    <select required="required" name="is_active" id="is_active" name="is_active" class="form-control">
                                                        <option value="1" <?php echo (intval($record->is_active) == 1) ? "selected" : ""; ?>>Active</option>
                                                        <option value="0" <?php echo (intval($record->is_active) == 0) ? "selected" : ""; ?>>In Active</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput1">Team Name</label>
                                                    <input value="<?php echo isset($record->team_name) ? $record->team_name : ""; ?>" required="required" type="text" id="projectinput1" class="form-control" placeholder="Team Name" name="team_name">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput2">Bussiness</label>
                                                    <input value="<?php echo isset($record->bussiness) ? $record->bussiness : ""; ?>" type="text" id="projectinput2" class="form-control" placeholder="Bussiness" name="bussiness">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput1">Team Owner</label>
                                                    <input value="<?php echo isset($record->team_owner) ? $record->team_owner : ""; ?>" required="required" type="text" id="projectinput1" class="form-control" placeholder="Team Owner" name="team_owner">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput2">Owner CNIC</label>
                                                    <input value="<?php echo isset($record->owner_cnic) ? $record->owner_cnic : ""; ?>" required="required" type="text" id="projectinput2" class="form-control" placeholder="Owner CNIC" name="owner_cnic">
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput6">Select Member Ship</label>
                                                    <select required="required" name="membership_type_id" id="membership_type_id" name="status" class="form-control">
                                                        <?php foreach ($membership_type as $key => $value) { ?>
                                                        <option value="<?php echo $value->id;?>" <?php echo ($record->membership_type_id == $value->id) ? "selected" : ""; ?>><?php echo $value->name; ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                                
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput4">Amount</label>
                                                    <input value="<?php echo isset($record->membership_amount) ? $record->membership_amount : ""; ?>" type="text" id="projectinput4" class="form-control" placeholder="Amount" name="membership_amount">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput3">E-mail</label>
                                                    <input value="<?php echo isset($record->owner_email) ? $record->owner_email : ""; ?>" type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="owner_email">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput4">Contact Number</label>
                                                    <input value="<?php echo isset($record->owner_contact) ? $record->owner_contact : ""; ?>" type="text" id="projectinput4" class="form-control" placeholder="Phone" name="owner_contact">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput3">MemberShip Start</label>
                                                    <input required="required" type="date" id="issueinput3" value="<?php echo isset($record->memebership_start_date) ? $record->memebership_start_date : ""; ?>" class="form-control" name="memebership_start_date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Opened">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput4">Notes</label>
                                                    <input type="text" id="projectinput4" class="form-control" value="<?php echo isset($record->skype_id) ? $record->skype_id : ""; ?>" placeholder="Notes" name="skype_id">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput4">Security Deposit</label>
                                                    <input type="number" id="security_deposite" class="form-control" value="<?php echo isset($record->security_deposite) ? $record->security_deposite : ""; ?>" placeholder="Security Deposite" name="security_deposite">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                   <label for="projectinput4">Total Members</label>
                                                    <input type="number" id="total_members" class="form-control" value="<?php echo isset($record->total_members) ? $record->total_members : ""; ?>" placeholder="Total Members" name="total_members">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput4">Emergency Person</label>
                                                    <input type="text" id="emergencyPerson" class="form-control" value="<?php echo isset($record->emergencyPerson) ? $record->emergencyPerson : ""; ?>" placeholder="Emergency Contact Person Name" name="emergencyPerson">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                   <label for="projectinput4">Emergency Contact</label>
                                                    <input type="text" id="emergencyContact" class="form-control" value="<?php echo isset($record->emergencyContact) ? $record->emergencyContact : ""; ?>" placeholder="Emergency Phone Number" name="emergencyContact">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput4">Introduction</label>
                                                    <textarea class="form-control" name="intro"><?php echo isset($record->intro) ? $record->intro : ""; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4 mb-2">
                                                    <label for="projectinput4">Website</label>
                                                    <input type="text" id="website" class="form-control" value="<?php echo isset($record->website) ? $record->website : ""; ?>" placeholder="website" name="website">
                                                </div>
                                                <div class="form-group col-md-4 mb-2">
                                                   <label for="projectinput4">Upwork Profile</label>
                                                    <input type="text" id="upwork" class="form-control" value="<?php echo isset($record->upwork) ? $record->upwork : ""; ?>" placeholder="upwork link" name="upwork">
                                                </div>
                                                <div class="form-group col-md-4 mb-2">
                                                   <label for="projectinput4">LinkedIn Profile</label>
                                                    <input type="text" id="linkedin" class="form-control" value="<?php echo isset($record->linkedin) ? $record->linkedin : ""; ?>" placeholder="linkedin link" name="linkedin">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput4">Display On Webiste</label>
                                                    <input type="text" id="display_on_site" class="form-control" value="<?php echo isset($record->display_on_site) ? $record->display_on_site : ""; ?>" placeholder="display_on_site" name="display_on_site">
                                                </div>
                                            </div>
                                            <h4 class="form-section"><i class="ft-file-text"></i> Requirements</h4>
                                            
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Owner CNIC Front</label>
                                                    <input type="file" name="owner_cnic_front" class="form-control-file" id="projectinput8">
                                                     <?php if(isset($record->owner_cnic_front) && $record->owner_cnic_front != ""){ ?>
                                                    <img src="<?php echo base_url()."uploads/".$record->owner_cnic_front; ?>" width="100" height="100">
                                                    <input type="hidden" name="owner_cnic_front" class="form-control-file" id="owner_cnic_front" value="<?php echo $record->owner_cnic_front; ?>">
                                                    <?php }  ?>
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Owner CNIC Back</label>
                                                    <input type="file" name="owner_cnic_back" class="form-control-file" id="projectinput8">
                                                    <?php if(isset($record->owner_cnic_back) && $record->owner_cnic_back != ""){ ?>
                                                    <img src="<?php echo base_url()."uploads/".$record->owner_cnic_back; ?>" width="100" height="100">
                                                    <input type="hidden" name="owner_cnic_back" class="form-control-file" id="owner_cnic_back" value="<?php echo $record->owner_cnic_back; ?>">
                                                    <?php }  ?>

                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="form-group col-md-6 mb-2">
                                                    <label>Agreement</label>
                                                    <input type="file" name="form_page_1" class="form-control-file" id="projectinput8">
                                                     <?php if(isset($record->form_page_1) && $record->form_page_1 != ""){ ?>
                                                    <img src="<?php echo base_url()."uploads/".$record->form_page_1; ?>" width="100" height="100">
                                                    <input type="hidden" name="form_page_1" class="form-control-file" id="form_page_1" value="<?php echo $record->form_page_1; ?>">
                                                    <?php }  ?>
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Picture</label>
                                                    <input type="file" name="form_page_2" class="form-control-file" id="projectinput8">
                                                    <?php if(isset($record->form_page_2) && $record->form_page_2 != ""){ ?>
                                                    <img src="<?php echo base_url()."uploads/".$record->form_page_2; ?>" width="100" height="100">
                                                    <input type="hidden" name="form_page_2" class="form-control-file" id="form_page_2" value="<?php echo $record->form_page_2; ?>">
                                                    <?php }  ?>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>NTN Front</label>
                                                    <input type="file" name="ntn_front" class="form-control-file" id="projectinput8">
                                                     <?php if(isset($record->ntn_front) && $record->ntn_front != ""){ ?>
                                                    <img src="<?php echo base_url()."uploads/".$record->ntn_front; ?>" width="100" height="100">
                                                    <input type="hidden" name="ntn_front" class="form-control-file" id="ntn_back" value="<?php echo $record->ntn_front; ?>">
                                                    <?php }  ?>
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>NTN Back</label>
                                                    <input type="file" name="ntn_back" class="form-control-file" id="projectinput8">
                                                    <?php if(isset($record->ntn_back) && $record->ntn_back != ""){ ?>
                                                    <img src="<?php echo base_url()."uploads/".$record->ntn_back; ?>" width="100" height="100">
                                                    <input type="hidden" name="ntn_back" class="form-control-file" id="ntn_back" value="<?php echo $record->ntn_back; ?>">
                                                    <?php }  ?>

                                                </div>
                                            </div>
											<div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Team Logo</label>
                                                    <input type="file" name="team_logo" class="form-control-file" id="projectinput8">
                                                     <?php if(isset($record->team_logo) && $record->team_logo != ""){ ?>
                                                    <img src="<?php echo base_url()."uploads/".$record->team_logo; ?>" width="100" height="100">
                                                    <input type="hidden" name="team_logo" class="form-control-file" id="ntn_back" value="<?php echo $record->team_logo; ?>">
                                                    <?php }  ?>
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    &nbsp;

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Locker Avail
                                                    <input <?php echo (isset($record->is_locker_avail) && $record->is_locker_avail == true) ? "checked" : ""; ?> type="checkbox" id="is_locker_avail" class="form-control" value="1" placeholder="Phone" name="is_locker_avail"></label>
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Parking Avail
                                                    <input <?php echo (isset($record->parking_avail) && $record->parking_avail == true) ? "checked" : ""; ?> type="checkbox" id="parking_avail" class="form-control" value="1" placeholder="Phone" name="parking_avail"></label>
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