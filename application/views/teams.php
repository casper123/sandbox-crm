<div class="content-wrapper"><!--Statistics cards Starts-->
<!-- Show & hide columns dynamically table -->
<section id="row-selection">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" style="float:left;">View Teams</h4>
                    <a href="<?php echo base_url()."teams/create" ?>">  
                        <button style="float: right" class="btn btn-primary mr-1"><i class="ft-file"></i>&nbsp; Create Team</button>
                    </a>
                    <a href="<?php echo base_url()."teams/invite" ?>">  
                        <button style="float: right" class="btn btn-secondary mr-1"><i class="ft-file"></i>&nbsp; Invite Team</button>
                    </a>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block">
                        <table class="display table table-striped table-bordered teamTable dataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Owner</th>
                                    <th>Contact</th>
                                    <th>Membership</th>
                                    <th>Start Date</th>
                                    <th>Rent</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($teams as $key => $value) { ?>
                                   <tr>
                                        <td><?php echo $value->id ?></td>
                                        <td><?php echo $value->team_name ?></td>
                                        <td><?php echo $value->team_owner ?></td>
                                        <td><?php echo $value->owner_contact ?></td>
                                        <td><?php echo $value->membership_type ?></td>
                                        <td><?php echo $value->memebership_start_date ?></td>
                                        <td>Rs.&nbsp;<?php echo number_format($value->membership_amount) ?></td>
                                        <td><?php echo ($value->is_active == 1) ? '<span class="badge badge-info">Active</span>' : '<span class="badge badge-warning ">In-Active</span>';?>
                                        </td>
                                        <td><?=$value->skype_id?></td>
                                        <td>
                                        <div class="btn-group mr-1 mb-1">
                                            <button type="button" class="btn btn-raised btn-light btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo base_url()."teams/edit/".$value->id ?>">Edit</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."teams/delete/".$value->id ?>">Delete</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."teams/change_status/".$value->id ?>"><?php echo ($value->is_active == 1) ? "In-Active" : "Acitve" ?></a>
                                                 <a class="dropdown-item" href="<?php echo base_url()."invoice/saveInvoice/"?>">Send Invoice</a>
                                            </div>
                                    </div>
                                        </td>
                                    </tr>
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
