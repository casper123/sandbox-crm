<style type="text/css">
.col-1, .col-2 {
    float: left;
    margin-left: 30px;
    width: 90%;
}
</style>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <?php  
                            if($this->session->userdata("logo") != ""){
                            //echo "<img src='".BRAND_IMAGES.$this->session->userdata("logo")"' />";
                               echo  '<img alt=""  style="margin-top:50px" src="'.BRAND_IMAGES.$this->session->userdata("logo").'">';
                            }
                            else
                            { ?>
                                <h2>Start Shopping</h2>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Markets</h2>
                        <ul>
                            <?php foreach ($marketList as $key => $value) { ?>
                                <li><a href="<?=base_url()."index.php/home/getMarketBrands/".$value->market_id?>"><?=$value->name?></a></li>    
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Checkout form -->
                    <div id="payment">
                        <ul class="payment_methods methods">
                            <li class="payment_method_bacs">
                                <input type="radio" onchange="showAndHide(1)" class="input-radio" name="payment_method" value="bacs" checked="checked" data-order_button_text="">
                                <label for="payment_method_bacs">Home Delivery</label>
                                <div class="payment_box payment_method_bacs">
                                    <p>We also provide a facility for home delivery 250pkr will be charge on it.</p>
                                </div>
                            </li>
                             <li class="payment_method_bacs">
                                <input type="radio" onchange="showAndHide(0)" class="input-radio" name="payment_method" value="bacs" checked="checked" data-order_button_text="">
                                <label for="payment_method_bacs">Collect From Branch</label>
                                <div class="payment_box payment_method_bacs">
                                    <p>You can also collect your order from any branch.</p>
                                </div>
                            </li>
                        </ul>
                        <div class="clear"></div>
                                <div style="display:none" class="col2-set" id="customer_details">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Delivery Details</h3>

                                            <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                                                <label for="billing_first_name" class="">First Name <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" class="input-text " id="firstName" placeholder="First Name" value="">
                                            </p>

                                            <div class="clear"></div>

                                            <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                                                <label for="billing_address_1" class="">Address <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" class="input-text " id="address1" placeholder="Street address" value="">
                                            </p>

                                            <p class="form-row form-row-wide address-field" id="billing_address_2_field">
                                                <input type="text" class="input-text " id="address2" placeholder="Apartment, suite, unit etc. (optional)" value="">
                                            </p>

                                            <div class="clear"></div>

                                            <p class="form-row form-row-first validate-required validate-email" id="billing_email_field">
                                                <label for="billing_email" class="">Email Address <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" class="input-text " name="email" id="email" placeholder="" value="">
                                            </p>

                                            <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                                                <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" class="input-text " id="contact" placeholder="" value="">
                                            </p>
                                            <div class="clear"></div>
                                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field">
                                                <label for="billing_country" class="">Date And Time <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input placeholder="yyyy-mm-dd" style="float: left; width:50%" type="text" class="input-text " id="delivery_date" placeholder="" value="">
                                                <select style="float: left; width: 40%; margin-left: 2%;" id="delivery_time" class="country_to_state country_select">
                                                    <?php for($var = 1; $var < 25; $var++){ ?>
                                                    <option value="<?=$var?>"><?=$var?></option>
                                                    <?php } ?>
                                                </select>
                                            </p>
                                            <div class="clear"></div>
                                            <input id="submitForm" onclick="submitForm()" type="submit" class="checkout-button button alt wc-forward" name="proceed" value="Checkout">
                                        </div>
                                    </div>

                                   
                                        <div class="clear"></div>

                                    </div>
                                    <!-- Order Details -->
                                     <div style="display:none" class="col2-set" id="orderCreated">
                                        <hr>
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Order Created Successfully </h3>
                                            <div id="orderData">
                                                
                                            </div>
                                        </div>
                                    </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!-- Order Details -->

                                    <!-- Collect From Branch -->
                                    <div class="clear"></div>
                                            <div style="display:inline" class="col2-set" id="customer_details">
                                                <div class="col-1">
                                                    <div class="woocommerce-billing-fields">
                                                        <h3>Select Branch</h3>

                                                     
                                                        <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field">
                                                            <label for="billing_country" class="">Date And Time <abbr class="required" title="required">*</abbr>
                                                            </label>
                                                            <input placeholder="yyyy-mm-dd" style="float: left; width:50%" type="text" class="input-text " id="delivery_date" placeholder="" value="">
                                                            <select style="float: left; width: 40%; margin-left: 2%;" id="delivery_time" class="country_to_state country_select">
                                                                <?php for($var = 1; $var < 25; $var++){ ?>
                                                                <option value="<?=$var?>"><?=$var?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </p>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <div class="clear"></div>
                                                           <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                                                            <?php if(isset($marketBranchList) && count ($marketBranchList) > 0){ ?>
                                                                <ul class="payment_methods methods">
                                                                    <?php 
                                                                        foreach ($marketBranchList as $key => $value) {
                                                                            echo ' <li class="payment_method_bacs"><input style="float:left" type="radio" class="input-radio" name="branchId" value="'.$value->market_branch_id.'" checked="checked" data-order_button_text=""><label for="payment_method_bacs">&nbsp'.$value->name.'</label><div class="payment_box payment_method_bacs"><p>'.$value->address.'</p></div></li>';
                                                                        }
                                                                     ?>
                                                                </ul>
                                                             <?php }  ?>
                                                        </p>

                                                        <div class="clear"></div>
                                                        <input id="submitForm" onclick="cubmitBranchOrder()" type="submit" class="checkout-button button alt wc-forward" name="proceed" value="Get Order Number">
                                                    </div>
                                                </div>

                                               
                                                    <div class="clear"></div>

                                                </div>


                                    <!-- Collect From Branch -->

                                </div>
                    </div>
                    <!-- Checkout form -->

                
                </div>
            </div>                        
        </div>
    </div>
</div>

<script type="text/javascript">
function showAndHide(val)
{
    $("#customer_details").toggle();
    $("#orderCreated").toggle();

    if(val == 0)
    {
        $("#customer_details").hide();
        $("#orderCreated").hide();
        $("#branchList").show();
    }
}

function submitForm(){

        var firstName       = $("#firstName").val();
        var address1        = $("#address1").val();
        var address2        = $("#address2").val();
        var email           = $("#email").val();
        var contact         = $("#contact").val();
        var delivery_date   = $("#delivery_date").val();
        var delivery_time   = $("#delivery_time").val();

        var formData = {'firstName' : firstName,'address1' : address1,'address2' : address2,'email' : email,'contact' : contact,'delivery_date' : delivery_date,'delivery_time' : delivery_time};
        
        $.ajax({
            type: "POST",
            url: '<?=base_url()."index.php/home/homeDelivery"?>',
            data: formData,
            success: function(data)
            {
                var obj = jQuery.parseJSON(data);
                var Message = "<p>Dear "+obj.firstName+" , <div class='clear'></div> Your order has been created successfully our customer care officer will contact you please note your order reffernce number  <div class='clear'></div> <strong>Order Number : "+obj.orderNumber+"</strong></p>";
                $("#orderData").html(Message);
                $("#customer_details").hide();
                $("#orderCreated").show();
            },
            error: function(error){
            }
        });
    }
</script>
