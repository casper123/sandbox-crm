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
                        <h4 class="card-title" id="from-actions-multiple">Team Invitation</h4>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" enctype="multipart/form-data" method="post" action="<?php echo base_url()?>invitation/create">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12">
                                        <div class="form-body">
                                            <h4 class="form-section">Team Info</h4>
                                        </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <input type="hidden" name="invitation_id" value="<?=$invitation->invitation_id?>" />
                                                    <label for="projectinput1">Owner Name</label>
                                                    <input required="required" type="text" id="projectinput1" class="form-control" value="<?=$invitation->full_name?>" placeholder="Person Name" name="name">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput1">Contact Number</label>
                                                    <input required="required" type="text" id="projectinput1" class="form-control" value="<?=$invitation->contact_number?>" placeholder="Mobile Number" name="phone">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput1">Team Email</label>
                                                    <input required="required" type="email" id="projectinput1" class="form-control" value="<?=$invitation->email_adress?>" placeholder="Owner Email" name="email">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput6">Select Member Ship</label>
                                                    <select required="required" name="membership_type_id" id="membership_type_id" name="status" class="form-control">
                                                        <?php foreach ($membership_type as $key => $value) { ?>
                                                        <option value="<?php echo $value->id;?>" <?php echo ($invitation->membership_type == $value->id) ? "selected" : ""; ?>><?php echo $value->name; ?></option>
                                                        <?php } ?>
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
                                                    <input type="date" id="projectinput1" class="form-control" value="<?=$invitation->next_followup?>" placeholder="Next Followup" name="next_followup">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <input type="checkbox" name="notInterested" value="2"> Not Interested
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