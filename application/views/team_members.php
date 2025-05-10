<div class="content-wrapper">
<!-- Show & hide columns dynamically table -->
<section id="row-selection">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Team Member List</h4>
                        <a href="<?php echo base_url()."teammembers/create" ?>">  
                        <button style="float: right" class="btn btn-primary mr-1"><i class="ft-file"></i>&nbsp; Create Member</button>
                    </a>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block">
                        <table class="display table table-striped table-bordered teamMembersTable dataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Team Name</th>
                                    <th>Member</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($members as $key => $value) { ?>
                                   <tr>
                                        <td><?php echo $value->id ?></td>
                                        <td><?php echo $value->team_name ?></td>
                                        <td><?php echo $value->name ?></td>
                                        <td><?php echo $value->contact_no ?></td>
                                        <td><?php echo ($value->is_active == 1) ? 'Active' : 'Inactive' ?></td>
                                        <td>
                                        <div class="btn-group mr-1 mb-1">
                                            <button type="button" class="btn btn-raised btn-light btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo base_url()."teammembers/edit/".$value->id ?>">Edit</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."teammembers/change_status/".$value->id ?>"><?php echo ($value->is_active == 1) ? "In-Active" : "Acitve" ?></a>
                                                <a class="dropdown-item" href="<?php echo base_url()."teammembers/delete/".$value->id ?>">Delete</a>
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
