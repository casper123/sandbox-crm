<div class="content-wrapper"><!--Statistics cards Starts-->
<!-- Show & hide columns dynamically table -->
<section id="row-selection">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">View Payments</h4>
                        <a href="<?php echo base_url()."payment/create" ?>">  
                        <button style="float: right" class="btn btn-primary mr-1"><i class="ft-file"></i>&nbsp; Add Payment</button>
                    </a>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block">
                        <table class="display table table-striped table-bordered search-api dataTable">
                            <thead>
                                <tr>
                                    <th>Payment ID</th>
                                    <th>Payment #</th>
                                    <th>Invoice #</th>
                                    <th>Create Date</th>
                                    <th>Team</th>
                                    <th>Category</th>
                                    <th>Account</th>
                                    <th>Descrption</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($payments as $key => $value) { ?>
                                   <tr>
                                        <td><?php echo $value->payment_id ?></td>
                                        <td><?php echo $value->payment_number ?></td>
                                        <td><?php echo $value->invoiceNumber ?></td>
                                        <td><?php echo date("d-m-Y",strtotime($value->create_date)) ?></td>
                                        <td><?php echo $value->team_name ?></td>
                                        <td><?php echo $value->category_name ?></td>
                                        <td><?php echo $value->payment_method ?></td>
                                        <td><?php echo $value->description ?></td>
                                        <td>Rs.&nbsp;<?php echo $value->amount ?></td>
                                        <td>
                                        <div class="btn-group mr-1 mb-1">
                                            <button type="button" class="btn btn-raised btn-light btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo base_url()."payment/edit/".$value->payment_id ?>">Edit</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."payment/delete/".$value->payment_id ?>">Delete</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."payment/emailReceipt/".$value->payment_number ?>">Send Receipt</a>
                                                <a class="dropdown-item" target="_blank" href="<?php echo base_url()."payment/downloadPDF/".$value->payment_number ?>">Download PDF</a>
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
