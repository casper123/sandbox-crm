<?php 
if ($invoice->invoice_no == "")
    $invoice_no = 'SAN-'.strtotime("now");
else
    $invoice_no = $invoice->invoice_no;
?>

<div class="content-wrapper">
    <!--Statistics cards Starts-->
    <section id="form-action-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Generate Invoice</h4>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                                <form class="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'invoice/create/'?>" >
                                    <div class="row">
                                        <div class="form-group col-md-4 mb-2">
                                            <label for="projectinput6">Select Customer</label>
                                            <select id="customerDropdown" name="customer" class="form-control" data-live-search="true"> 
                                                <option value="">Please Select</option>
                                                <?php foreach ($clients as $key => $value) { ?>
                                                    <option <? echo ($customer == $value->id) ? "selected='selected'" : "" ?> value="<?php echo $value->id;?>"><?php echo $value->names; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 offset-4 mb-2">
                                        <label for="projectinput6">Invoice No.&nbsp;</label><?=$invoice_no?>
                                        </div>
                                    </div>
                                    <div class="row"><div class="col-md-4"><p style="text-align:center;">OR</p></div></div>
                                    <div class="row">
                                        <div class="form-group col-md-4 mb-2">
                                            <label for="projectinput6">Add New Customer</label>
                                            <input value="<?php echo $display_details->team_owner; ?>" type="text" id="projectinput2" class="form-control" placeholder="Name" name="name">
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label for="projectinput2">Email Address</label>
                                            <input value="<?php echo $display_details->owner_email; ?>" type="text" id="projectinput2" class="form-control" placeholder="Email Address" name="email">
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label for="projectinput2">Contact Number</label>
                                            <input value="<?php echo $display_details->owner_contact; ?>" type="text" id="projectinput2" class="form-control" placeholder="Mobile Number" name="mobile">
                                            <input type="hidden" name="gi_contactId" value="<?=$customer?>" />
                                            <input type="hidden" name="teamId" value="" />
                                            <input type="hidden" name="invoice_no" value="<?=$invoice_no?>" />
                                            <input type="hidden" name="invoice_id" value="<?=$invoice_id?>" />
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label for="projectinput6">Invoice Date (YYYY-MM-DD)</label>
                                            <input value="<?php echo isset($invoice->issue_date) ? $invoice->issue_date : date("Y-m-d",strtotime("now")) ?>" type="text" id="projectinput2" class="form-control" placeholder="Invoice Date" name="invoice_date">
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label for="projectinput2">Due Date (YYYY-MM-DD)</label>
                                            <input value="<?php echo isset($invoice->due_date) ? $invoice->due_date : date("Y-m")."-".date("d",strtotime($display_details->memebership_start_date)); ?>" type="text" id="projectinput2" class="form-control" placeholder="Due Date" name="due_date">
                                        </div>
                                    </div>

                                    <div id="invoice-items-details" class="pt-2">
                                        <div class="row">
                                            <div class="table-responsive col-sm-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <? foreach($invoice_items as $k => $v) { ?>
                                                            <tr>
                                                                <td>
                                                                    <select id="category_<?=$k?>" name="cateogry[]" class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <?php foreach ($category as $key => $value) { ?>
                                                                            <option <? echo ($v->description == $value->name) ? 'selected="selected"': '' ?> value="<?php echo $value->name;?>"><?php echo $value->name; ?></option>
                                                                        <?php } ?>
                                                                    </select> 
                                                                </td>
                                                                <td><input value="<?=$v->quantity?>" id="quantity_<?=$k?>" value="" type="text" class="quantity form-control" name="quantity[]"></td>
                                                                <td><input value="<?=$v->rate?>" id="price_<?=$k?>" value=""  type="text" class="price form-control" name="price[]"></td>
                                                                <td><input id="amount_<?=$k?>" value="" type="text" class="amount form-control" name="amount[]"></td>
                                                            </tr>
                                                        <? } ?>
                                                        <? if (count_($invoice_items) == 0) { ?>
                                                        <? for ($i=1; $i < 6; $i++) { ?>
                                                            <tr>
                                                                <td>
                                                                    <select id="category_<?=$i?>" name="cateogry[]" class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <?php foreach ($category as $key => $value) { ?>
                                                                            <option value="<?php echo $value->id;?>"><?php echo $value->name; ?></option>
                                                                        <?php } ?>
                                                                    </select> 
                                                                </td>
                                                                <td><input id="quantity_<?=$i?>" value="" type="text" class="quantity form-control" name="quantity[]"></td>
                                                                <td><input id="price_<?=$i?>" value=""  type="text" class="price form-control" name="price[]"></td>
                                                                <td><input id="amount_<?=$i?>" value="" type="text" class="amount form-control" name="amount[]"></td>
                                                            </tr>
                                                        <? } ?>
                                                        <? } else { ?>
                                                            <? for ($i=$k; $i < 6 - count_($invoice_items); $i++) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <select id="category_<?=$i?>" name="cateogry[]" class="form-control">
                                                                            <option value="">Please Select</option>
                                                                            <?php foreach ($category as $key => $value) { ?>
                                                                                <option value="<?php echo $value->name;?>"><?php echo $value->name; ?></option>
                                                                            <?php } ?>
                                                                        </select> 
                                                                    </td>
                                                                    <td><input id="quantity_<?=$i?>" value="" type="text" class="quantity form-control" name="quantity[]"></td>
                                                                    <td><input id="price_<?=$i?>" value=""  type="text" class="price form-control" name="price[]"></td>
                                                                    <td><input id="amount_<?=$i?>" value="" type="text" class="amount form-control" name="amount[]"></td>
                                                                </tr>
                                                            <? } ?>
                                                        <? } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions clearfix">
                                        <div class="buttons-group float-right">
                                            <button type="submit" class="btn btn-raised btn-primary mr-1">
                                                <i class="fa fa-check-square-o"></i> Save & Send
                                            </button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#customerDropdown').select2();
});
</script>