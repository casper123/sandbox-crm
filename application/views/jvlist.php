<div class="content-wrapper"><!--Statistics cards Starts-->
<!-- Show & hide columns dynamically table -->
<section id="row-selection">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Journam Vouchers</h4>
                        <a href="<?php echo base_url()."jv/create" ?>">  
                        <button style="float: right" class="btn btn-primary mr-1"><i class="ft-file"></i>&nbsp; Create Voucher</button>
                    </a>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block">
                        <table class="display table table-striped table-bordered search-api dataTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>From Account</th>
                                    <th>To Account</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($category as $key => $value) { ?>
                                   <tr>
                                        <td><?php echo $value->jv_id; ?></td>
                                        <td><?php echo $value->create_date; ?></td>
                                        <td><?php echo $value->from_account ?></td>
                                        <td><?php echo $value->to_account ?></td>
                                        <td><?php echo $value->amount ?></td>
                                        <td>
                                        <div class="btn-group mr-1 mb-1">
                                            <button type="button" class="btn btn-raised btn-light btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo base_url()."jv/edit/".$value->jv_id ?>">Edit</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."jv/delete/".$value->jv_id ?>">Delete</a>
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