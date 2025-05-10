<?php 
if ($invoice->invoiceNumber == "")
    $invoiceNumber = 'SAN-'.strtotime("now");
else
    $invoiceNumber = $invoice->invoiceNumber;
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
                                <form class="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'invoice/saveInvoice/'?>" >
                                    <div class="row">
                                        <div class="form-group col-md-4 mb-2">
                                            <label for="projectinput6">Select Customer</label>
                                            <select id="teamId" name="teamId" class="form-control" data-live-search="true"> 
                                                <option value="">Please Select</option>
                                                <?php foreach ($teamslist as $key => $value) { ?>
                                                    <option <? echo ($invoice->teamId == $value->id) ? "selected='selected'" : "" ?> value="<?php echo $value->id;?>"><?php echo $value->team_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 offset-4 mb-2">
                                        <label for="projectinput6">Invoice No.&nbsp;</label><?=$invoiceNumber?>
                                        </div>
                                    </div>
                                    <div class="row"><div class="col-md-4"><p style="text-align:center;">OR</p></div></div>
                                    <div class="row">
                                        <div class="form-group col-md-4 mb-2">
                                            <label for="projectinput6">Add New Customer</label>
                                            <input value="<?php echo $invoice->customerName; ?>" type="text" id="projectinput2" class="form-control" placeholder="Name" name="customerName">
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label for="projectinput2">Email Address</label>
                                            <input value="<?php echo $invoice->customerEmail; ?>" type="text" id="projectinput2" class="form-control" placeholder="Email Address" name="customerEmail">
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label for="projectinput2">Contact Number</label>
                                            <input value="<?php echo $invoice->customerPhone; ?>" type="text" id="projectinput2" class="form-control" placeholder="Mobile Number" name="customerPhone">
                                        </div>
                                        <div class="form-group col-md-12 mb-2">
                                            <textarea placeholder="Customer Address" class="form-control" name="customerAddress"><?=$invoice->customerAddress?></textarea>
                                        </div>
                                        <input type="hidden" name="invoiceNumber" value="<?=$invoiceNumber?>" />
                                        <input type="hidden" name="invoiceId" value="<?=$invoice->invoiceId?>" />
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label for="projectinput6">Invoice Date (YYYY-MM-DD)</label>
                                            <input value="<?php echo isset($invoice->invoiceDate) ? $invoice->invoiceDate : date("Y-m-d",strtotime("now")) ?>" type="text" id="projectinput2" class="form-control" placeholder="Invoice Date" name="invoiceDate">
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label for="projectinput2">Due Date (YYYY-MM-DD)</label>
                                            <input value="<?php echo isset($invoice->invoiceDue) ? $invoice->invoiceDue : date("Y-m")."-".date("d",strtotime($display_details->memebership_start_date)); ?>" type="text" id="projectinput2" class="form-control" placeholder="Due Date" name="invoiceDue">
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
                                                        <? foreach($invoice->detail as $k => $v) { ?>
                                                            <tr>
                                                                <td><textarea placeholder="description" class="form-control" name="description[]"><?=$v->description?></textarea></td>
                                                                <td><input value="<?=$v->quantity?>" id="quantity_<?=$k?>" value="" type="text" class="quantity form-control" name="quantity[]"></td>
                                                                <td><input value="<?=$v->price?>" id="price_<?=$k?>" value=""  type="text" class="price form-control" name="price[]"></td>
                                                                <td><input id="amount_<?=$k?>" value="" type="text" class="amount form-control" name="amount[]"></td>
                                                            </tr>
                                                        <? } ?>
                                                        <? if (count_($invoice_items) == 0) { ?>
                                                        <? for ($i=1; $i < 6; $i++) { ?>
                                                            <tr>
                                                                <td><textarea placeholder="description" class="form-control" name="description[]"></textarea></td>
                                                                <td><input id="quantity_<?=$i?>" value="" type="text" class="quantity form-control" name="quantity[]"></td>
                                                                <td><input id="price_<?=$i?>" value=""  type="text" class="price form-control" name="price[]"></td>
                                                                <td><input id="amount_<?=$i?>" value="" type="text" class="amount form-control" name="amount[]"></td>
                                                            </tr>
                                                        <? } ?>
                                                        <? } else { ?>
                                                            <? for ($i=$k; $i < 6 - count_($invoice_items); $i++) { ?>
                                                                <tr>
                                                                    <td><textarea placeholder="description" class="form-control" name="description[]"></textarea></td>
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
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <input type="checkbox" name="sendInvoice" value="1"> Send this invoice as well
                                        </div>
                                    </div>
                                    <div class="form-actions clearfix">
                                        <div class="buttons-group float-right">
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
    </section>
</div>

<script>
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#customerDropdown').select2();
});
</script>