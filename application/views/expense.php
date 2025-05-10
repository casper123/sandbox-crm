<div class="content-wrapper"><!--Statistics cards Starts-->
<!-- Show & hide columns dynamically table -->
<section id="row-selection">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">View Expense</h4>
                        <a href="<?php echo base_url()."expense/create" ?>">  
                        <button style="float: right" class="btn btn-primary mr-1"><i class="ft-file"></i>&nbsp; Create Expense</button>
                    </a>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block">
                        <table class="display table table-striped table-bordered search-api dataTable">
                            <thead>
                                <tr>
                                    <th>Expense ID</th>
                                    <th>Create Date</th>
                                    <th>Descrption</th>
                                    <th>Category</th>
                                    <th>Account</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($expense as $key => $value) { ?>
                                   <tr>
                                        <td><?php echo $value->id ?></td>
                                        <td><?php echo date("d-m-Y",strtotime($value->create_date)) ?></td>
                                        <td><?php echo $value->description ?></td>
                                        <td><?php echo $value->category_name ?></td>
                                        <td><?php echo $value->expense_method ?></td>
                                        <td><?php echo $value->amount." PKR" ?></td>
                                        <td>
                                        <div class="btn-group mr-1 mb-1">
                                            <button type="button" class="btn btn-raised btn-light btn-min-width dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo base_url()."expense/edit/".$value->id ?>">Edit</a>
                                                <a class="dropdown-item" href="<?php echo base_url()."expense/delete/".$value->id ?>">Delete</a>
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
