<div class="content-wrapper"><!--Statistics cards Starts-->
<!-- Show & hide columns dynamically table -->
<section id="row-selection">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" style="float:left;">View Invitations</h4>
                    <a href="<?php echo base_url()."invitation/create" ?>">  
                        <button style="float: right" class="btn btn-secondary mr-1"><i class="ft-file"></i>&nbsp; Invite Team</button>
                    </a>
                    <a href="<?php echo base_url()."invitation/followup" ?>">  
                        <button style="float: right" class="btn btn-secondary mr-1"><i class="ft-file"></i>&nbsp; Send Followup Email</button>
                    </a>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block">
                        <table class="display table table-striped table-bordered search-api dataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Membership</th>
                                    <th>Status</th>
                                    <th>Last Followup</th>
                                    <th>Next Followup</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($invites as $key => $value) { ?>
                                   <tr>
                                        <td id="<?=$key?>" class="request_id_name"><?php echo $value->invitation_id ?></td>
                                        <td><?php echo $value->full_name ?></td>
                                        <td><?php echo $value->email_adress ?></td>
                                        <td><?php echo $value->contact_number ?></td>
                                        <td><?php echo $value->membership_type ?></td>
                                        <td>
                                            <?php 
                                            if ($value->is_accepted == 1)
                                                echo '<span class="badge badge-info">Accepted</span>';
                                            elseif ($value->is_accepted == 2)
                                                echo '<span class="badge badge-warning">Not Interested</span>';
                                            elseif ($value->is_accepted == 0)
                                                echo '<span class="badge badge-warning">Pending</span>';
                                            ?>
                                        </td>
                                        <td><?php echo date("Y-m-d", strtotime($value->followup->create_date)) ?></td>
                                        <td><?php echo $value->next_followup ?></td>
                                        <td><?php echo $value->followup->followup ?></td>
                                        <td>
                                        <div class="btn-group mr-1 mb-1">
                                            <button type="button" class="btn btn-raised btn-light btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo base_url()."invitation/create/".$value->invitation_id ?>">Update</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."invitation/delete/".$value->invitation_id ?>">Delete</a>
                                            </div>
                                    </div>
                                        </td>
                                    </tr>
                                    <!-- <tr id="followup_<?=$key?>">
                                    <td colspan="11">
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <table  class="display table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Create Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <?php foreach ($value->followups as $k => $v) { ?>
                                                    <tr>
                                                        <td><?=$v->create_date?></td>
                                                        <td><?=$v->followup?></td>
                                                    </tr>
                                                <? } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                    </tr> -->
                                <?php } ?>
                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
