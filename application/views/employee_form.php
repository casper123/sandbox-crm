<?php
    if(isset($id) && $id > 0){
        $url =  "edit/".$id;
        $action = "edit";
    }else{
       $action = $url =  "create";
    }
    
    ?>
<div class="content-wrapper">
    <!--Statistics cards Starts-->
    <section id="form-action-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="from-actions-multiple">Employee Reporting</h4>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'employee/create'?>" >
                                <div class="row justify-content-md-center">
                                    <div class="col-md-12">
                                        <div class="form-body">
                                            <h4 class="form-section">Info</h4>
                                        </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput2">Employee Name</label>
                                                    <input value="" type="text" id="projectinput2" class="form-control" placeholder="Employee Name" name="employee_name">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="projectinput4">Work Done</label>
                                                    <textarea class="form-control" name="work_done"><?php echo isset($record->work_done) ? $record->work_done : ""; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput4">Time In</label>
                                                    <input value="" type="time" id="projectinput2" class="form-control" placeholder="time in" name="time_in">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label for="projectinput4">Time Out</label>
                                                    <input value="" type="time" id="projectinput2" class="form-control" placeholder="time out" name="time_out">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions clearfix">
                                    <div class="buttons-group float-right">
                                       <a href="<?php echo base_url().'employee/'; ?>"><button type="button" class="btn btn-raised btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                        </button></a>
                                        <button type="submit" class="btn btn-raised btn-primary mr-1">
                                        <i class="fa fa-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Form actions layout section end -->
</div>