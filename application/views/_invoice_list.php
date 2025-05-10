<? $totalComing = 0; ?>
<div class="content-wrapper">
<!-- Show & hide columns dynamically table -->
<section id="row-selection">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Invoice</h4>
                    <a style="float: right" class="btn btn-primary mr-1" href="<?php echo base_url()."invoice/saveInvoice"?>"><i class="ft-file"></i>
                        Create New Invoice
                      </a>
                      <br/><br/>
                      <? if($_GET["success"] == 1) { ?>
                        <div class="alert alert-info" role="alert">
                            <strong>Invoice saved successfully.</strong>
                        </div>
                        <? } elseif($_GET["success"] == 2) {  ?>
                            <strong>An error occued please try again.</strong>
                        <? } elseif($_GET["success"] == 3) {  ?>
                            <strong>Email sent successfully.</strong>
                        <? } elseif($_GET["success"] == 4) {  ?>
                            <strong>Invoice deleted successfully.</strong>
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
                                        $remaing = $value->totalAmount - $value->totalPaid;
                                        if(floatval($remaing) > 0) {
                                            
                                            $totalComing = floatval($totalComing) + floatval($remaing);
                                        } 
                                        
                                    ?>
                                   <tr <?php echo $value->isPaid != 1 ? "style='background-color:yellow;'" : "" ?>>
                                        <td><?php echo $value->invoiceNumber ?></td>
                                        <td><?php echo ($value->team_name != "") ? $value->team_name : $value->customerName ?></td>
                                        <td><?php echo ($value->isPaid != 1 || $remaing > 0) ? "Unpaid" : "Paid" ?></td>
                                        <td><?php echo number_format($value->totalAmount) ?></td>
                                        <td><?php echo number_format($value->totalPaid) ?></td>
                                        <td><?php echo number_format(($value->totalAmount - $value->totalPaid)) ?></td>
                                        <td><?php echo $value->invoiceDate; ?></td>
                                        <td><?php echo $value->invoiceDue; ?></td>
                                        <td>
                                        <div class="btn-group mr-1 mb-1">
                                            <button type="button" class="btn btn-raised btn-light btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select</button>
                                            <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo base_url()."invoice/saveInvoice/".$value->invoiceId ?>">Edit</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."invoice/deleteInvoice/".$value->invoiceId ?>">Delete</a>
                                                <a class="dropdown-item" target="_blank" href="<?php echo base_url()."invoice/pdfInvoice/".base64_encode(openssl_encrypt($value->invoiceId,"AES-128-ECB","Walkman550@")); ?>">Download PDF</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."invoice/sendInvoice/".$value->invoiceId ?>">Send Invoice</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."payment/addInvoicePayment/".$value->invoiceId ?>">Add Payment</a>
                                            </div>
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
