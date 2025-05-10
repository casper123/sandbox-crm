<div class="content-wrapper">
    <!--Statistics cards Starts-->
    <section id="form-action-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="from-actions-multiple">Blog List</h4>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12">
                                        <table class="storeListTable display table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Active</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($blogs as $key => $value) { ?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                        <td><?=$value->title?></td>
                                                        <td><? echo ($value->is_active == 1) ? "Yes" : "No" ?></td>
                                                        <td>
                                                            <a href="<?=base_url().'blogpost/save/' . $value->id?>">Edit</a>&nbsp;|&nbsp; 
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
            </div>
        </div>
    </div>
</div>