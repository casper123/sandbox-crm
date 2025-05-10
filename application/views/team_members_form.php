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
                        <h4 class="card-title" id="from-actions-multiple">Member <?php echo ucfirst($action); ?></h4>

                        <?php if(isset($success) && $success == true){ ?>
                        <br>
                        <div class="alert alert-info" role="alert">
                            <strong>Member Has Been Created Successfully.</strong>
                        </div>
                        <?php } if(isset($msg) && $msg != ""){ ?>
                        <br>
                             <div class="alert alert-error" role="alert">
                            <strong><?php echo $msg; ?>.</strong>
                        </div>
                        <?php }if(isset($updated) && $updated == true){ ?>
                        <br>
                        <div class="alert alert-info" role="alert">
                            <strong>Member Data Has Been Updated Successfully.</strong>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'teammembers/'.$url ?>" >
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12">
                                        <div class="form-body">
                                            <h4 class="form-section">Member Info</h4>
                                        </div>
                                        <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput1">Select Team</label>
                                                    <select required="required" name="team_id" id="team_id" name="status" class="form-control">
                                                        <?php foreach ($teamslist as $key => $value) { ?>
                                                        <option value="<?php echo $value->id;?>" <?php echo ($record->team_id == $value->id) ? 'selected' : ''; ?> ><?php echo $value->team_name; ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput1">Name</label>
                                                    <input value="<?php echo isset($record->name) ? $record->name : ""; ?>" required="required" type="text" id="projectinput1" class="form-control" placeholder="Team Name" name="name">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput2">Father Name</label>
                                                    <input value="<?php echo isset($record->father_name) ? $record->father_name : ""; ?>" type="text" id="projectinput2" class="form-control" placeholder="Father" name="father_name">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput1">Email</label>
                                                    <input value="<?php echo isset($record->email) ? $record->email : ""; ?>" type="text" id="projectinput1" class="form-control" placeholder="email" name="email">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput2">CNIC</label>
                                                    <input value="<?php echo isset($record->cnic_no) ? $record->cnic_no : ""; ?>" required="required" type="text" id="projectinput2" class="form-control" placeholder="Owner CNIC" name="cnic_no">
                                                </div>
                                            </div>
                                            <div class="row">
                                                 <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput4">Qualification</label>
                                                    <input type="text" id="projectinput4" class="form-control" value="<?php echo isset($record->qualification) ? $record->qualification : ""; ?>" placeholder="qualification" name="qualification">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label  required="required" for="projectinput4">Contact Number</label>
                                                    <input value="<?php echo isset($record->contact_no) ? $record->contact_no : ""; ?>" type="text" id="projectinput4" class="form-control" placeholder="Phone" name="contact_no">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput4">Address</label>
                                                    <textarea type="number" id="address" class="form-control" placeholder="address" name="address"><?php echo isset($record->address) ? $record->address : ""; ?></textarea>
                                                </div>
                                            </div>
                                            <h4 class="form-section"><i class="ft-file-text"></i> Requirements</h4>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>Cnic Front</label>
                                                    <input type="file" name="cnic_front" class="form-control-file" id="projectinput8">
                                                     <?php if(isset($record->cnic_front) && $record->cnic_front != ""){ ?>
                                                    <img src="<?php echo TEAMS_IMAGES_PATH.$record->cnic_front; ?>" width="100" height="100">
                                                    <input type="hidden" name="cnic_front" class="form-control-file" id="cnic_front" value="<?php echo $record->cnic_front; ?>">
                                                    <?php }  ?>
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label>CNIC Back</label>
                                                    <input type="file" name="cnic_back" class="form-control-file" id="projectinput8">
                                                    <?php if(isset($record->cnic_back) && $record->cnic_back != ""){ ?>
                                                    <img src="<?php echo TEAMS_IMAGES_PATH.$record->cnic_back; ?>" width="100" height="100">
                                                    <input type="hidden" name="cnic_back" class="form-control-file" id="cnic_back" value="<?php echo $record->cnic_back; ?>">
                                                    <?php }  ?>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label>Member Photo</label>
                                                    <input type="file" name="member_image" class="form-control-file" id="projectinput8">
                                                     <?php if(isset($record->member_image) && $record->member_image != ""){ ?>
                                                    <img src="<?php echo TEAMS_IMAGES_PATH.$record->member_image; ?>" width="100" height="100">
                                                    <input type="hidden" name="member_image" class="form-control-file" id="member_image" value="<?php echo $record->member_image; ?>">
                                                    <?php }  ?>
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