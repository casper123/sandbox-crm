<div class="content-wrapper">
    <section id="row-selection">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <?=date("M", strtotime("now"))?> Stats</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block">
                        <? if($this->session->userdata("user_type") == 1) { ?>
                            <div class="row">

                                <? foreach($counts as $k => $v) { ?>
                                    <div class="col-md-3">
                                        <div class="card <? echo ($v['name'] == 'Profit') ? "gradient-red-ocean" : "gradient-indigo-dark-blue" ?>" style="padding:10px 0px;">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                Rs.&nbsp;<?=number_format($v['count'])?>
                                                            </h3>
                                                            <span><?=$v['name']?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <? } ?>
                            </div>
                        <? } ?>
                            <div class="row">
                              
                                <? foreach($member_counts as $k => $v) { ?>
                                    <div class="col-md-2">
                                        <div class="card gradient-cyan-dark-green">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                <?=number_format($v['count'])?>
                                                            </h3>
                                                            <span><?=$v['name']?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <? } ?>

                                <div class="col-md-2">
                                        <div class="card gradient-cyan-dark-green">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                <?=number_format($members_openspace)?>
                                                            </h3>
                                                            <span>Open Space Active</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <? foreach($teams["records"] as $k => $v) { ?>
                                    <div class="col-md-1">
                                        <div class="card gradient-cyan-dark-green">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0" style="padding:0px;">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                <?=number_format($v->sum_teams)?>
                                                            </h3>
                                                            <span style="font-size:9px;"><?=$v->name?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                            <? if($this->session->userdata("user_type") == 1) { ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card gradient-indigo-dark-blue">
                                        <div class="card-body">
                                            <div class="card-block pt-2 pb-0" style="padding:0px;">
                                                <div class="media">
                                                    <div class="media-body white text-left" style="text-align: center !important;">
                                                        <h3 class="font-large-1 mb-0">
                                                            <?=number_format($total_fmp_income)?>
                                                        </h3>
                                                        <span>Fix My Phone Income</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card gradient-red-ocean">
                                        <div class="card-body">
                                            <div class="card-block pt-2 pb-0" style="padding:0px;">
                                                <div class="media">
                                                    <div class="media-body white text-left" style="text-align: center !important;">
                                                        <h3 class="font-large-1 mb-0">
                                                            <?=number_format($total_fmp_expense)?>
                                                        </h3>
                                                        <span>Fix My Phone Expense</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <? if($this->session->userdata("user_type") == 1) { ?>
    <section id="row-selection" style="margin:20px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cash & Account Details</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card gradient-indigo-dark-blue">
                                        <div class="card-body">
                                            <div class="card-block pt-2 pb-0">
                                                <div class="media">
                                                    <div class="media-body white text-left" style="text-align: center !important;">
                                                        <h3 class="font-large-1 mb-0">
                                                            <?=number_format($money["cash"])?>
                                                        </h3>
                                                        <span>Cash</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card gradient-red-ocean">
                                        <div class="card-body">
                                            <div class="card-block pt-2 pb-0">
                                                <div class="media">
                                                    <div class="media-body white text-left" style="text-align: center !important;">
                                                        <h3 class="font-large-1 mb-0">
                                                            <?=number_format($money["mcb"])?>
                                                        </h3>
                                                        <span>MCB</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card gradient-indigo-dark-blue">
                                        <div class="card-body">
                                            <div class="card-block pt-2 pb-0">
                                                <div class="media">
                                                    <div class="media-body white text-left" style="text-align: center !important;">
                                                        <h3 class="font-large-1 mb-0">
                                                            <?=number_format($money["scb"])?>
                                                        </h3>
                                                        <span>SCB</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card gradient-indigo-dark-blue">
                                        <div class="card-body">
                                            <div class="card-block pt-2 pb-0">
                                                <div class="media">
                                                    <div class="media-body white text-left" style="text-align: center !important;">
                                                        <h3 class="font-large-1 mb-0">
                                                            <?=number_format($money["foreign"])?>
                                                        </h3>
                                                        <span>Foreign</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? } ?>


    <section id="row-selection" style="margin:20px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pendig Requests</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block">
                            <div class="row" style="height: 500px; overflow: scroll;">
                            <table class="display table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Interested In</th>
                                        <th>Status</th>
                                        <th>Invite Sent</th>
                                        <th>Note</th>
                                        <th>Next Followup</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pending_reqest as $key => $value) { ?>
                                    <tr>
                                            <td><?php echo $value->request_id; ?></td>
                                            <td><?php echo $value->full_name ?></td>
                                            <td><?php echo $value->email_address ?></td>
                                            <td><?php echo $value->contact_number ?></td>
                                            <td><?php echo $value->interested_in ?></td>
                                            <td><?php echo $value->current_status ?></td>
                                            <td><?php echo ($value->invite_sent == 1) ? '<span class="badge badge-info">Yes</span>' : '<span class="badge badge-warning">No</span>' ?></td>
                                            <td><?php echo $value->notes ?></td>
                                            <td><?php echo $value->next_followup ?></td>
                                            <td>
                                            <div class="btn-group mr-1 mb-1">
                                                <button type="button" class="btn btn-raised btn-light btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?php echo base_url()."request/edit/".$value->request_id ?>">Edit</a>
                                                    <a class="dropdown-item" href="<?php echo base_url()."request/delete/".$value->request_id ?>">Delete</a>
                                                    <a class="dropdown-item" href="<?php echo base_url()."request/send_invite/".$value->request_id ?>">Send Invite</a>
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
        </div>
    </seciton>

    <section id="row-selection" style="margin:20px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Today's Followup Requests</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block">
                            <div class="row">
                            <table class="display table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Interested In</th>
                                        <th>Status</th>
                                        <th>Invite Sent</th>
                                        <th>Note</th>
                                        <th>Next Followup</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($followup_reqest as $key => $value) { ?>
                                    <tr>
                                            <td><?php echo $value->request_id; ?></td>
                                            <td><?php echo $value->full_name ?></td>
                                            <td><?php echo $value->email_address ?></td>
                                            <td><?php echo $value->contact_number ?></td>
                                            <td><?php echo $value->interested_in ?></td>
                                            <td><?php echo $value->current_status ?></td>
                                            <td><?php echo ($value->invite_sent == 1) ? '<span class="badge badge-info">Yes</span>' : '<span class="badge badge-warning">No</span>' ?></td>
                                            <td><?php echo $value->notes ?></td>
                                            <td><?php echo $value->next_followup ?></td>
                                            <td>
                                            <div class="btn-group mr-1 mb-1">
                                                <button type="button" class="btn btn-raised btn-light btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?php echo base_url()."request/edit/".$value->request_id ?>">Edit</a>
                                                    <a class="dropdown-item" href="<?php echo base_url()."request/delete/".$value->request_id ?>">Delete</a>
                                                    <a class="dropdown-item" href="<?php echo base_url()."request/send_invite/".$value->request_id ?>">Send Invite</a>
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
        </div>
    </seciton>

    <section id="row-selection" style="margin:20px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pending Followup Requests</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block">
                            <div class="row" style="height: 500px; overflow: scroll;">
                            <table class="display table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Interested In</th>
                                        <th>Status</th>
                                        <th>Invite Sent</th>
                                        <th>Note</th>
                                        <th>Next Followup</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($followup_reqest_pending as $key => $value) { ?>
                                    <tr>
                                            <td><?php echo $value->request_id; ?></td>
                                            <td><?php echo $value->full_name ?></td>
                                            <td><?php echo $value->email_address ?></td>
                                            <td><?php echo $value->contact_number ?></td>
                                            <td><?php echo $value->interested_in ?></td>
                                            <td><?php echo $value->current_status ?></td>
                                            <td><?php echo ($value->invite_sent == 1) ? '<span class="badge badge-info">Yes</span>' : '<span class="badge badge-warning">No</span>' ?></td>
                                            <td><?php echo $value->notes ?></td>
                                            <td><?php echo $value->next_followup ?></td>
                                            <td>
                                            <div class="btn-group mr-1 mb-1">
                                                <button type="button" class="btn btn-raised btn-light btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?php echo base_url()."request/edit/".$value->request_id ?>">Edit</a>
                                                    <a class="dropdown-item" href="<?php echo base_url()."request/delete/".$value->request_id ?>">Delete</a>
                                                    <a class="dropdown-item" href="<?php echo base_url()."request/send_invite/".$value->request_id ?>">Send Invite</a>
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
        </div>
    </seciton>

    <section id="row-selection" style="margin:20px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Today's Followup Invitations</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block">
                            <div class="row">
                            <table class="display table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Membership</th>
                                        <th>Next Followup</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($followup_invitation as $key => $value) { ?>
                                    <tr>
                                            <td><?php echo $value->invitation_id ?></td>
                                            <td><?php echo $value->full_name ?></td>
                                            <td><?php echo $value->email_adress ?></td>
                                            <td><?php echo $value->contact_number ?></td>
                                            <td><?php echo $value->membership_type ?></td>
                                            <td><?php echo ($value->next_followup != "") ? date("Y-m-d", strtotime($value->next_followup)): "" ?></td>
                                            <td>
                                                <?php echo ($value->is_accepted == 1) ? '<span class="badge badge-info">Accepted</span>' : '<span class="badge badge-warning">Pending</span>';?>
                                            </td>
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
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </seciton>

    <section id="row-selection" style="margin:20px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pending Followup Invitations</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block">
                            <div class="row">
                            <table class="display table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Membership</th>
                                        <th>Next Followup</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($followup_invitation_pending as $key => $value) { ?>
                                    <tr>
                                            <td><?php echo $value->invitation_id ?></td>
                                            <td><?php echo $value->full_name ?></td>
                                            <td><?php echo $value->email_adress ?></td>
                                            <td><?php echo $value->contact_number ?></td>
                                            <td><?php echo $value->membership_type ?></td>
                                            <td><?php echo ($value->next_followup != "") ? date("Y-m-d", strtotime($value->next_followup)): "" ?></td>
                                            <td>
                                                <?php echo ($value->is_accepted == 1) ? '<span class="badge badge-info">Accepted</span>' : '<span class="badge badge-warning">Pending</span>';?>
                                            </td>
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
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </seciton>

    <? if($this->session->userdata("user_type") == 1) { ?>
    <section id="row-selection" style="margin:20px 0px;">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                <div class="card-body collapse show">
                <div class="card-block">
                <div class="row">
                <div class="col-md-12">
                <? $totalPaymentToday = 0 ?>
                <h4 style="padding:15px 0px;">Today's Income</h4>
                <table class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Team</th>
                            <th>Category</th>
                            <th>Account</th>
                            <th>Descrption</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments_today as $key => $value) { ?>
                           <tr>
                                <td><?php echo $value->team_name ?></td>
                                <td><?php echo $value->category_name ?></td>
                                <td><?php echo $value->payment_method ?></td>
                                <td><?php echo $value->description ?></td>
                                <td>Rs.&nbsp;<?php echo $value->amount ?></td>
                            </tr>
                            <? $totalPaymentToday = $totalPaymentToday + intval($value->amount) ?>
                        <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total Amount</strong></td>
                                <td><strong>Rs.<?=number_format($totalPaymentToday)?></strong></td>
                            </tr>
                     </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                <div class="card-body collapse show">
                <div class="card-block">
                <div class="row">
                <div class="col-md-12">
                <? $totalExpenseToday = 0 ?>
                <h4 style="padding:15px 0px;">Today's Expenses</h4>
                <table class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Descrption</th>
                            <th>Category</th>
                            <th>Account</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($expense_today as $key => $value) { ?>
                           <tr>
                                <td><?php echo $value->description ?></td>
                                <td><?php echo $value->category_name ?></td>
                                <td><?php echo $value->expense_method ?></td>
                                <td>Rs.<?php echo $value->amount ?></td>
                            </tr>
                            <? $totalExpenseToday = $totalExpenseToday + intval($value->amount) ?>
                        <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Total Amount</strong></td>
                                <td><strong>Rs.<?=number_format($totalExpenseToday)?></strong></td>
                            </tr>
                     </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <? } ?>
    <? if($this->session->userdata("user_type") == 1) { ?>
    <section id="row-selection">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body collapse show">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                <? $totalExpenseToday = 0 ?>
                                <h4 style="padding:15px 0px;">Recent Payments To Collect</h4>
                                <table class="display table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Team</th>
                                            <th>Representative</th>
                                            <th>Due Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($upcoming_payments as $key => $value) { ?>
                                           <tr>
                                                <td><?php echo $value->team_name ?></td>
                                                <td><?php echo $value->team_owner ?></td>
                                                <td><?php echo $value->memebership_start_date ?></td>
                                                <td>Rs.<?php echo $value->membership_amount ?></td>
                                            </tr>
                                        <?php } ?>
                                     </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? } ?>
    <? if($this->session->userdata("user_type") == 1) { ?>
    <section id="row-selection" style="margin:20px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Expense Limits</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block">
                            <div class="row">
                                <? $totalExpenseAmount = 0; $totalSpent = 0; ?>
                                <? foreach($expense as $key => $value) { ?>
                                    <div class="col-md-3">
                                        <div class="card gradient-indigo-dark-blue">
                                            <div class="card-body">
                                                <div class="card-block pt-2 pb-0">
                                                    <div class="media">
                                                        <div class="media-body white text-left" style="text-align: center !important;">
                                                            <h3 class="font-large-1 mb-0">
                                                                <?=number_format($value["amount"])?>/<?=number_format($value["spending_limit"])?>
                                                                <? $totalExpenseAmount = $totalExpenseAmount + $value["spending_limit"] ?>
                                                                <? $totalSpent = $totalSpent + $value["amount"] ?>
                                                            </h3>
                                                            <span><?=$value["category"]?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card gradient-red-ocean">
                                        <div class="card-body">
                                            <div class="card-block pt-2 pb-0">
                                                <div class="media">
                                                    <div class="media-body white text-left" style="text-align: center !important;">
                                                        <h3 class="font-large-1 mb-0">
                                                        <?=number_format($totalSpent)?>/<?=number_format($totalExpenseAmount)?>
                                                        </h3>
                                                        <span>Total Spent</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? } ?>
    <? if($this->session->userdata("user_type") == 1) { ?>
    <section id="row-selection">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body collapse show">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <canvas id="incomeChart" width="400" height="200"></canvas>
                                    <script>
                                        jQuery(document).ready(function() {

                                            var labels = [];
                                            var amount = [];
                                            var colors = [];
                                            <? foreach ($income as $key => $value) { ?>
                                                labels.push('<?=$value['category']?>');
                                                amount.push(<?=$value['amount']?>);
                                                colors.push('<?=$value['color']?>');
                                            <? } ?>

                                            var ctx = document.getElementById("incomeChart").getContext('2d');
                                            var myChart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: labels,
                                                    datasets: [{
                                                        label: '<?=date("M", strtotime("now"))?> Income Chart',
                                                        data: amount,
                                                        backgroundColor: colors
                                                    }]
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body collapse show">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <canvas id="expenseChart" width="400" height="200"></canvas>
                                    <script>
                                        jQuery(document).ready(function() {

                                            var labels = [];
                                            var amount = [];
                                            var colors = [];

                                            <? foreach ($expense as $key => $value) { ?>
                                                labels.push('<?=$value['category']?>');
                                                colors.push('<?=$value['color']?>');
                                                amount.push(<?=$value['amount']?>);
                                            <? } ?>

                                            var ctx = document.getElementById("expenseChart").getContext('2d');
                                            var myChart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: labels,
                                                    datasets: [{
                                                        label: '<?=date("M", strtotime("now"))?> Expense Chart',
                                                        data: amount,
                                                        backgroundColor: colors
                                                    }]
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <? } ?>
    <? if($this->session->userdata("user_type") == 1) { ?>
    <section id="row-selection">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Last 12 Months Financial Data</h4>
                        <label style="float:right; font-weight: bold;">Total Profit:&nbsp;&nbsp;Rs.<?=number_format($yearly_profit)?></label>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block">
                        <div class="row">
                                <div class="col-md-12">
                                    <canvas id="yearChart" width="400" height="200"></canvas>
                                    <script>
                                        jQuery(document).ready(function() {

                                            var labels = [];
                                            var incomeAmount = [];
                                            var expenseAmount = [];
                                            var profit = [];

                                            <? foreach ($yearly_income as $key => $value) { ?>
                                                labels.push('<?=$value['month']?>');
                                            <? } ?>

                                            <? foreach ($yearly_income as $key => $value) { ?>
                                                incomeAmount.push(<?=$value['amount']?>);
                                            <? } ?>

                                            <? foreach ($yearly_expense as $key => $value) { ?>
                                                expenseAmount.push(<?=$value['amount']?>);
                                            <? } ?>

                                            <? foreach ($yearly_income as $key => $value) { ?>
                                                <? $profit =  intval($value["amount"]) - intval($yearly_expense[$key]["amount"]) ?>
                                                var p = '<?=$profit?>';
                                                profit.push(p);
                                            <? } ?>

                                            var ctx = document.getElementById("yearChart").getContext('2d');
                                            var myChart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: labels,
                                                    datasets: [
                                                        {
                                                            label: 'Profit',
                                                            data: profit,
                                                            type: 'line',
                                                            borderColor: 'rgb(237, 115, 28)',
                                                            backgroundColor: 'rgb(237, 115, 28)',
                                                            borderWidth: 2,
                                                            fill: false,
                                                        },
                                                        {
                                                            label: 'Income',
                                                            type: 'bar',
                                                            data: incomeAmount,
                                                            backgroundColor: 'rgb(54, 162, 235)'
                                                        },
                                                        {
                                                            label: 'Expense',
                                                            data: expenseAmount,
                                                            type: 'bar',
                                                            backgroundColor: 'rgb(255, 99, 132)',
                                                            borderWidth: 2,
                                                            fill: false,
                                                        }
                                                    ]
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? } ?>
    <? if($this->session->userdata("user_type") == 1) { ?>
    <section id="row-selection">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Last 12 Months Income Break Down</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block">
                        <div class="row">
                                <div class="col-md-12">
                                    <canvas id="yearincomeChart" width="400" height="200"></canvas>
                                    <script>
                                        jQuery(document).ready(function() {

                                            var labels = [];
                                            var datasets = [];

                                            <? foreach ($income_categories["months"] as $key => $value) { ?>
                                                labels.push('<?=$value["title"]?>');
                                            <? } ?>

                                            <? foreach ($income_categories["data"] as $key => $value) { ?>
                                                
                                                var obj = {};
                                                obj.label = '<?=$value["category_name"]?>';
                                                obj.backgroundColor = '<?=$value["color"]?>';
                                                obj.data = [];

                                                <? foreach ($value["data_set"] as $k => $v) { ?>
                                                    obj.data.push(<?=$v["amount"]?>);
                                                <? } ?>

                                                datasets.push(obj);

                                            <? } ?>


                                            var ctx = document.getElementById("yearincomeChart").getContext('2d');
                                            var myChart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: labels,
                                                    datasets: datasets
                                                },
                                                options: {
                                                    tooltips: {
                                                        mode: 'index',
                                                        intersect: false
                                                    },
                                                    responsive: true,
                                                    scales: {
                                                        xAxes: [{
                                                            stacked: true,
                                                        }],
                                                        yAxes: [{
                                                            stacked: true
                                                        }]
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? } ?>
    <? if($this->session->userdata("user_type") == 1) { ?>
    <section id="row-selection">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Last 12 Months Expense Break Down</h4>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block">
                        <div class="row">
                                <div class="col-md-12">
                                    <canvas id="yearexpenseChart" width="400" height="200"></canvas>
                                    <script>
                                        jQuery(document).ready(function() {

                                            var labels = [];
                                            var datasets = [];

                                            <? foreach ($expense_categories["months"] as $key => $value) { ?>
                                                labels.push('<?=$value["title"]?>');
                                            <? } ?>

                                            <? foreach ($expense_categories["data"] as $key => $value) { ?>
                                                
                                                var obj = {};
                                                obj.label = '<?=$value["category_name"]?>';
                                                obj.backgroundColor = '<?=$value["color"]?>';
                                                obj.data = [];

                                                <? foreach ($value["data_set"] as $k => $v) { ?>
                                                    obj.data.push(<?=$v["amount"]?>);
                                                <? } ?>

                                                datasets.push(obj);

                                            <? } ?>


                                            var ctx = document.getElementById("yearexpenseChart").getContext('2d');
                                            var myChart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: labels,
                                                    datasets: datasets
                                                },
                                                options: {
                                                    tooltips: {
                                                        mode: 'index',
                                                        intersect: false
                                                    },
                                                    responsive: true,
                                                    scales: {
                                                        xAxes: [{
                                                            stacked: true,
                                                        }],
                                                        yAxes: [{
                                                            stacked: true
                                                        }]
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? } ?>
</div>