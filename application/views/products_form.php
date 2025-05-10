<?php
$url = (isset($id) && $id > 0) ? "products/edit/".$id : "products/create";


if(isset($selectedTab) && $selectedTab == "signature" ){
    $url = (isset($id) && $id > 0) ? "/signaturedishes/edit_signature/".$id : "signaturedishes/create_signature";
}

if(isset($selectedTab) && $selectedTab == "tinpack" ){
    $url = (isset($id) && $id > 0) ? "/signaturedishes/edit_tinpack/".$id : "signaturedishes/create_tinpack";
}

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Add / Edit Dishes 
        </h1>
    </div>
 </div>
    <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dishes Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if(isset($msg) && $msg != ""){ ?>
                                    <div class="alert alert-danger">
                                        <strong>Error !</strong> Unkown Error.
                                    </div>
                                    <?php } ?>
                                    <?php if(isset($success) && $success != ""){ ?>
                                    <div class="alert alert-success">
                                        <strong>Success !</strong> Record updated successfully.
                                    </div>
                                    <?php } ?>
                                    <form method="post" role="form" action="<?php echo base_url().$url ?>" enctype="multipart/form-data" >
                                        <div class="form-group">
                                            <?php if($selectedTab != 'signature' && $selectedTab != 'tinpack'){ ?>
                                            <label>Selects</label>
                                            <select required="required" name="menu_id" class="form-control">
                                                
                                                <?php foreach ($menulist as $key => $value) { ?>
                                                    <option <?php echo (isset($data->menu_id) && $data->menu_id == $value->id ) ? "selected" : "";  ?> value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                               <?php } ?>
                                            </select>
                                        <?php }else{ ?>
                                            <input type="hidden" name="menu_id" value="0">
                                        <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Dish Name</label>
                                            <input required="required" class="form-control" name="product_name" type="text" value="<?php echo isset($data->product_name) ? $data->product_name : "";  ?>" >
                                        </div>
                                        <div class="form-group">
                                            <?php if($selectedTab != "tinpack" && $selectedTab != "products"){ ?>
                                                <label>Price</label>
                                                <input required="required" class="form-control" name="price" type="number" value="<?php echo isset($data->price) ? $data->price : "";  ?>" >
                                            <?php } ?>
                                            <input class="form-control" name="product_type" type="hidden" value="<?php echo (isset($selectedTab) && $selectedTab == "products" ) ? "normal" : $selectedTab;  ?>" >
                                        </div>

                                        <?php if($selectedTab == "products"){ ?>

                                            <div class="form-group">
                                                <label>Single Dish Price</label>
                                                <input required="required" class="form-control" name="price" type="number" value="<?php echo isset($data->price) ? $data->price : "";  ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label>Half Dish Price</label>
                                                <input required="required" class="form-control" name="half_price" type="number" value="<?php echo isset($data->half_price) ? $data->half_price : "";  ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label>Full Dish price</label>
                                                <input required="required" class="form-control" name="full_price" type="number" value="<?php echo isset($data->full_price) ? $data->full_price : "";  ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label>Family Pack Price</label>
                                                <input required="required" class="form-control" name="family_pack_price" type="number" value="<?php echo isset($data->family_pack_price) ? $data->family_pack_price : "";  ?>" >
                                            </div>
                                        <?php } ?>

                                        <?php if($selectedTab == "tinpack"){ ?>

                                            <div class="form-group">
                                                <label>435 Grams Price</label>
                                                <input required="required" class="form-control" name="tinpack_435_grams_price" type="number" value="<?php echo isset($data->tinpack_435_grams_price) ? $data->tinpack_435_grams_price : "";  ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label>850 Grams Price</label>
                                                <input required="required" class="form-control" name="tinpack_850_grams_price" type="number" value="<?php echo isset($data->tinpack_850_grams_price) ? $data->tinpack_850_grams_price : "";  ?>" >
                                            </div>

                                        <?php } ?>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea required="required" name="description" class="form-control" rows="3"><?php echo isset($data->description) ? $data->description : "";  ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="product_image" >
                                            <?php if(isset($data->product_image)){ ?>
                                            <img src="<?php echo PRODUCTS_IMAGES.$data->product_image ?>" width='100' height='100' >
                                            <?php } ?>
                                        </div>

                                        <button type="submit" class="btn btn-default">Save</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>