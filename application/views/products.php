<?php

$url = base_url()."products/create";
$editurl = base_url()."products/edit/";
$deleteurl = base_url()."products/delete/";

if($selectedTab == "tinpack"){
    $url = base_url()."signaturedishes/create_tinpack";
    $editurl = base_url()."signaturedishes/edit_tinpack/";
    $deleteurl = base_url()."signaturedishes/delete/";
}

if($selectedTab == "signature"){
    $url = base_url()."signaturedishes/create_signature";
    $editurl = base_url()."signaturedishes/edit_signature/";
    $deleteurl = base_url()."signaturedishes/delete/";
}

 ?>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dishes 
                        </h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Kfoods Dishes
                        </div>
                        <div style="text-align: right;" class="panel-heading">
                               <a href="<?php echo $url;  ?>" class="btn btn-primary" role="button">+ Add</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <?php if($selectedTab == "tinpack"){ ?>
                                                <th>435 Grams Price</th>
                                                <th>850 Grams Price</th>
                                            <?php } ?>

                                            <?php if($selectedTab == "products"){ ?>
                                                <th>Single Dish Price</th>
                                                <th>Half Dish Price</th>
                                                <th>Full Dish Price</th>
                                                <th>Family Dish Price</th>
                                            <?php } ?>

                                            <?php if($selectedTab == "signature"){ ?>
                                                <th>Price</th>
                                            <?php } ?>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $key => $value) {  ?>
                                            <tr class="odd gradeX">
                                            <td><?php echo $value->product_name ?></td>
                                            <?php if($selectedTab == "tinpack"){ ?>

                                                <td><?php echo (isset($value->tinpack_435_grams_price) && $value->tinpack_435_grams_price > 0) ? $value->tinpack_435_grams_price. " - PKR" : ""; ?></td>

                                                <td><?php echo (isset($value->tinpack_850_grams_price) &&  $value->tinpack_850_grams_price > 0) ? $value->tinpack_850_grams_price. " - PKR" : ""; ?></td>
                                            <?php } ?>

                                             <?php if($selectedTab == "products"){ ?>
                                                <td><?php echo (isset($value->price) && $value->price > 0 ) ? $value->price. " - PKR" : ""; ?></td>
                                                <td><?php echo isset($value->half_price) ? $value->half_price. " - PKR" : ""; ?></td>
                                                
                                                <td><?php echo isset($value->full_price) ? $value->full_price. " - PKR" : ""; ?></td>

                                                <td><?php echo isset($value->family_pack_price) ? $value->family_pack_price. " - PKR" : ""; ?></td>
                                            <?php } ?>

                                             <?php if($selectedTab == "signature"){ ?>
                                                <td><?php echo $value->price. " - PKR" ?></td>
                                            <?php } ?>

                                            <td>
                                            <?php if(isset($value->product_image)){ ?>
                                                <img src="<?php echo PRODUCTS_IMAGES.$value->product_image ?>" width='50' height='50' >
                                            <?php } ?></td>
                                            <td><a href="<?php echo $editurl.$value->id ?>">Edit</a> | <a href="<?php echo $deleteurl.$value->id ?>">Delete</a></td>
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->