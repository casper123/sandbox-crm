<? $totalComing = 0; ?>
<div class="content-wrapper">
<!-- Show & hide columns dynamically table -->
<section id="row-selection">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Invoice</h4>
                    <a style="float: right" class="btn btn-primary mr-1" href="<?php echo base_url()."invoice/create"?>"><i class="ft-file"></i>
                        Create New Invoice
                      </a>
                      <br/><br/>
                      <? if($_GET["success"] == 1) { ?>
                        <div class="alert alert-info" role="alert">
                            <strong>Invoice saved successfully.</strong>
                        </div>
                        <? } elseif($_GET["success"] == 2) {  ?>
                            <strong>An error occued please try again.</strong>
                        <? } ?>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block">
                        <table class="display table table-striped table-bordered search-api dataTable">
                            <thead>
                                <tr>
                                    <th>Invoice No</th>
                                    <th>Customer Name</th>
                                    <th>Payment Status</th>
                                    <th>Billed Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Balance</th>
                                    <th>Issue Date</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($invoices as $key => $value) { ?>
                                    <? 
                                        if ($value->payment_status != "Paid") { 
                                            $remaining = $value->total - $value->amount_paid;
                                            $totalComing = $totalComing + $remaining;
                                        } 
                                    ?>
                                   <tr <?php echo $value->payment_status != "Paid" ? "style='background-color:yellow;'" : "" ?>>
                                        <td><?php echo $value->invoice_no ?></td>
                                        <td><?php echo $value->customer_name ?></td>
                                        <td><?=$value->payment_status?></td>
                                        <td><?php echo $value->total ?></td>
                                        <td><?php echo ($value->total - $value->amount_paid) ?></td>
                                        <td><?php echo $value->issue_date; ?></td>
                                        <td><?php echo $value->due_date; ?></td>
                                        <td>
                                          <?php if($value->inovoice_status != "cancelled"){ ?>
                                        <div class="btn-group mr-1 mb-1">
                                            <button type="button" class="btn btn-raised btn-light btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select</button>
                                            <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo base_url()."invoice/create/".$value->id ?>">Edit</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."invoice/cancel/".$value->id ?>">Delete</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."payment/create_invoice_payment/".$value->id ?>">Add Payment</a>
                                            </div>
                                          <?php  } ?>
                                        </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                             </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card gradient-indigo-dark-blue">
                                    <div class="card-body">
                                        <div class="card-block pt-2 pb-0">
                                            <div class="media">
                                                <div class="media-body white text-left" style="text-align: center !important;">
                                                    <h3 class="font-large-1 mb-0">
                                                        Rs.&nbsp;<?=number_format($totalComing)?>
                                                    </h3>
                                                    <span>Upcoming</span>
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
</div>
