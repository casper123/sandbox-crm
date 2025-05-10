<!-- 
  Developer : Muhammad Hasham
  Email     : m.hashamrudy@gmail.com
  Portfolio : https://muhammad-hasham.000webhostapp.com/
-->
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
  <!--====== USEFULL META ======-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Karachi Foods" />
  <meta name="keywords" content="restaurant, pizza, burger, business, house, online, delivery, html, broast, tin packs, events" />
  <meta name="author" content="Karachi Foods" />

  <!--====== TITLE TAG ======-->
  <title>Karachi Foods</title>

  <!--====== FAVICON ICON =======-->
  <link rel="shortcut icon" type="image/ico" href="<?=base_url()."assets/ui-design/"?>img/favicon.png" />

  <!--====== STYLESHEETS ======-->
  <link rel="stylesheet" href="<?=base_url()."assets/ui-design/"?>css/normalize.css">
  <link rel="stylesheet" href="<?=base_url()."assets/ui-design/"?>css/animate.css">
  <link rel="stylesheet" href="<?=base_url()."assets/ui-design/"?>css/pogo-slider.css">
  <link rel="stylesheet" href="<?=base_url()."assets/ui-design/"?>css/owl.carousel.css">
  <link rel="stylesheet" href="<?=base_url()."assets/ui-design/"?>css/datepicker.css">
  <link rel="stylesheet" href="<?=base_url()."assets/ui-design/"?>css/timepicker.min.css">
  <link rel="stylesheet" href="<?=base_url()."assets/ui-design/"?>css/magnific-popup.css">
  <link rel="stylesheet" href="<?=base_url()."assets/ui-design/"?>css/typed.css">
  <link href="<?=base_url()."assets/ui-design/"?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()."assets/ui-design/"?>css/font-awesome.min.css" rel="stylesheet">

  <!--====== MAIN STYLESHEETS ======-->
  <link href="<?=base_url()."assets/ui-design/"?>style.css" rel="stylesheet">
  <link href="<?=base_url()."assets/ui-design/"?>css/responsive.css" rel="stylesheet">

  <script src="<?=base_url()."assets/ui-design/"?>js/vendor/modernizr-2.8.3.min.js"></script>
  <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
  <style type="text/css" media="screen">
  .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{
    background-color: red !important;    
  }  
  .nav-link active{
    background-color: red !important;
    color: white !important; 
  }

  .feedback {
  background-color : #e11e26;
  color: white;
  border-color: transparent;
  padding: 5px 10px 5px 10px;
}

#display-cart {
  position: fixed;
  bottom: 20px;
  left: 20px;
  z-index: 99;
  height:40px;
  width:40px;
}

.dropdown{
    width:100%;
}

.btn-dropdown{
    width:100%;
    border: 1px solid #e11e26;
    background: #fff;
}

.dropdown-menu{
    width:100%;
}

.reservation-tab{
    background:#fff none repeat scroll 0 0;
   color:#000;
   font-size:14px;
   font-weight:700;
  padding:15px 15px;
   text-transform:uppercase;
  -webkit-transition:all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
  width: 97%;
  margin-left:1.5%;
  border: 2px solid transparent !important;
}

.selected-reservation{
    background: #fff none repeat scroll 0 0 !important;
    border: 2px solid #fff !important;
    color: #e11e26 !important;
}

.team-member-img {
    width:50%;
    height:50%;
     display : block;
    margin : auto;
}


.card {
    padding: 20px 20px 20px 20px;
    margin-bottom: 20px;
}

.shadow-depth-1{
  -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  -webkit-appearance: none;
  }

.card-img-top {
    width:100%;
    height:180px;
    object-fit: fill;
}
.menu-price {
    color: #e11e26;
}
  </style>
</head>

<body>

  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

  <!--- PRELOADER -->
  <div class="preeloader">
    <div class="preloader-spinner"><i class="fa fa-cutlery"></i></div>
  </div>

  <!--SCROLL TO TOP-->
  <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

  <!--START TOP AREA-->
  <header class="top-area" id="home">
      <div class = "top-area-bg-mobile video-bg-mobile hidden-md hidden-lg hidden-xl">
          
          </div>
    <div class="top-area-bg video-bg hidden-sm hidden-xs">
      <!--<a class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=A1NtnPkzCjk',containment:'#home', showControls:false, allowtransparency: false,autoPlay:true, zoom:0, loop:true, mute:false, startAt:0, opacity:1, quality:'default'}"></a>-->
    </div>
    <div class="header-top-area">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-lg-6 col-sm-8">
              <div class="call-to-action">
                <p><i class="fa fa-envelope-o"></i>Email: <a href="#">info@karachifoods.com</a></p>
                <p><i class="fa fa-phone"></i>Telephone: <a href="#">+92 213 438 5345</a></p>
              </div>
            </div>
            <!-- <div class="col-md-5 col-lg-6 col-sm-4">
              <div class="book-table-popup">
                <a href="#reservation-form-modal" data-toggle="modal">Book a table</a>
              </div>
              <div class="top-social-bookmark">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
              </div>
            </div> -->
          </div>
          <div class="row">
              <center>
              <a href="#home" class="navbar-brand-top white hidden-xs hidden-sm"><img src="<?=base_url()."assets/ui-design/"?>img/main_logo_black.png" alt="logo"></a>
              </center>
              </div>
        </div>
      </div>

      <!--MAINMENU AREA-->
      <div class="mainmenu-area" id="mainmenu-area">
        <div class="mainmenu-area-bg"></div>
        <nav class="navbar">
          <div class="container-main-menu">
            <div class="navbar-header">
              <button class="collapsed navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-scrollspy">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="#home" class="navbar-brand white hidden-md hidden-lg hidden-xl"><img src="<?=base_url()."assets/ui-design/"?>img/main_logo_black.png" alt="logo"></a>
                            <a href="#home" class="navbar-brand hidden-md hidden-lg hidden-xl"><img src="<?=base_url()."assets/ui-design/"?>img/main_logo.png" alt="logo"></a>
              <!-- -->
            </div>
            <div class="collapse navbar-collapse bs-example-js-navbar-scrollspy">
              <!-- <div class="search-form-area">
                                <div class="search-form-overlay"></div>
                                <a class="search-form-trigger" href="#search-form">Search<span></span></a>
                                <div id="search-form" class="search-form">
                                    <form>
                                        <input type="search" placeholder="Search...">
                                    </form>
                                </div>
                            </div> -->
                            <ul id="nav" class="nav navbar-nav">
                                <li class="active"><a href="#home">Home</a> </li>
                                <li><a href="#about">about us</a></li>
                                <li><a href="#promotion">Specialities</a></li>
                                <li><a href="#menu">Menu/Order</a></li>
                                <li><a href="#tinpacks">Tin Packs</a></li>
                                <li><a href="#blog">Booking</a></li>
                                <li><a href="#services">Services</a></li>
                                <li><a href="#gallery">Gallery</a></li>
                                <li><a href="#location">Location</a></li>
                                <li><a href="#" onclick="gotocheckout()">checkout</a></li>
                            </ul>
            </div>
          </div>
        </nav>
      </div>
      <!--END MAINMENU AREA END-->
    </div>

    <!--WELCOME TEXT AREA-->
    <div class="welcome-text-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="welcome-text">
              <!-- <h2>Welcome To</h2>
                            <h1 class="cd-headline clip is-full-width">
                                <span class="hero-text">Dawat</span>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">Cafe & Restaurant</b>
                                    <b>Pizza House</b>
                                    <b>Coffee House</b>
                                </span>
                            </h1> -->
                           
              <a class="home-reservation-button" href="#menu">Order Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--WELCOME TEXT AREA END-->

  </header>
  <!--END TOP AREA-->

  <!--ABOUT AREA-->
  <section class="about-area section-padding" id="about">
    <div class="container wow fadeIn">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="area-title text-center">
            <h2>Our Story</h2>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
          <div class="about-content">
            <p><span class="big-text">K</span>arachi Foods Restaurant located at city center Shara-e-Faisal, main Nursery Road. A very unique tasted and friendly environment based restaurant developed as an extension to the Family business in 2006 and till
              now serving the people of Karachi with delicious and cultural foods with hospitality and comfort. From the very beginning we have been offering much more flavors and variety in food, our recipes have come from our family kitchen. We believe
              in exploring new ways of adding flavors in food with the spoonsful of nutrition and a pinch of excitement. Our distinction in traditional and continental food will enhance your appetite and ignite your taste buds. Traditional foods like
              chicken boneless handi, chicken karhai, biryani, BBQ, fish and fried chicken are our specialty. Our hygienic dishes are cooked in best quality oil and fresh ingredients that serves the people with quality food. </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
          <div class="right-about-content">
            <p>To explore the new horizons Karachi Foods has recently entered into Fast Food as well. We aim to explore best taste in town that would be a combination of sustenance and flavor. The astonishing response has convinced us to expend this idea
              further. Right from the beginning it is the most famous food chain that has brought latest innovations and expertise in food located at most prevailing location of Karachi. To meet our customers’ requirements and comforts, we have an Innovative
              family hall, party hall for formal and informal get-togethers to meet all kind of gatherings with a total of 300 capacity of sitting. Our trained and well-behaved staff is very humble and hospitable with our customers. The taste of Pakistani
              cultural food is the expertise of our chefs and they all serving the taste lovers with their different and unique ways.

            </p>
          </div>
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="about-author-sign text-center">
            <!-- <img src="<?=base_url()."assets/ui-design/"?>img/about/about_sign.png" alt=""> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--ABOUT AREA END-->

  <!--SPEACIAL PROMOTIONS AREA-->
  <section class="promotions-area section-padding" id="promotion">
    <div class="promotion-area-bg" data-stellar-background-ratio="0.6"></div>
    <div class="container wow fadeIn">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="area-title-white text-center">
            <h2 style="color: #ffffff;">Signature Dishes</h2>
          </div>
        </div>
      </div>
      <div class="row special-offers">
        <div class="menu-discount-offer col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <?php foreach ($signature_dishes as $key => $value) { ?>
              <div class="single-promotions">
                  <div class="promotions-img">
                    <img width="299" height="168" src="<?php echo PRODUCTS_IMAGES."/".$value->product_image ?>" alt="">
                  </div>
                  <div style="height: auto !important;" class="promotions-details">
                    <h3><?php echo $value->product_name ?></h3>
                    <p></p>
                    <h4><?php echo $value->description ?></h4>
                  </div>
                </div>
              <?php } ?>  
        </div>
      </div>
    </div>
  </section>
  <!--SPEACIAL PROMOTIONS AREA END-->

  <!--MENUS AREA-->
  <section class="menus-area section-padding" id="menu">
    <div class="container wow fadeIn">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="area-title text-center">
            <h2>Menu</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="food-menu-list-menu">
            <ul>
              <a href="<?php echo base_url(); ?>#menu">
              <li <?php echo (!isset($_GET["menu"])) ? 'style="background-color: red;color: white;border-color: red;"' : '';  ?>>
                All
                </li></a>
              <?php foreach ($menu as $key => $value) { ?>
                <a href="<?php echo base_url()."?menu=".$value->id; ?>#menu">
                  <li <?php echo (isset($_GET["menu"]) && $_GET["menu"] == $value->id) ? 'style="background-color: red;color: white;border-color: red;"' : '';  ?> ><?php echo $value->name ?></li>
                </a>
              <?php } ?>

<!--               <li class="filter active" data-filter="all">All</li>
              <li class="filter" data-filter=".starters">Starters</li> -->
            </ul>
          </div>
        </div>
      </div>
      <div class="row food-menu-list">

        <?php foreach ($normal_dishes as $key => $value) { ?>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="card shadow-depth-1">
                    <?php if($value->product_image) { ?>
                    <img class="card-img-top" src="<?php echo PRODUCTS_IMAGES.'/'.$value->product_image ?>" alt="Card image cap">
                    <?php }else{ ?>
                    <img class="card-img-top" src="<?php echo PRODUCTS_IMAGES."/placeholder.jpg" ?>" alt="Card image cap">
                    <?php } ?>
                    <div class="card-body">
                        <h4 class="card-title" style="height:57px; margin-top:5px;"><strong id="name_<?php echo $value->id ?>" ><?php echo $value->product_name ?></strong>
                        
                        </h4>
                        <p style="height:60px; font-size:12px;"><?php echo $value->description ?></p>

                        <?php 
                          $value_set = false;
                          
                          $price = 0;
                          $label = "Single";

                          if(isset($value->price) && $value->price > 0){
                            $price = $value->price;
                            $label = "Single";
                            $value_set = true;
                          }

                          if((isset($value->half_price) && $value->half_price > 0) && $value_set == false){
                            $price = $value->half_price;
                            $label = "Half";
                            $value_set = true;
                          }

                          if((isset($value->full_price) && $value->full_price > 0) && $value_set == false){
                            $price = $value->full_price;
                            $label = "Full";
                            $value_set = true;
                          }

                          if((isset($value->family_pack_price) && $value->family_pack_price > 0) && $value_set == false){
                            $price = $value->family_pack_price;
                            $label = "Family";
                            $value_set = true;
                          }

                        ?>


                        <span class="menu-price" id="price_<?php echo $value->id ?>">Rs.<?php echo $price ?></span>

                        <span style="display: none;" class="menu-price" id="price_<?php echo $value->id."_".$label ?>">Rs.<?php echo $price ?></span>


                        <div class="dropdown">
                            <button class="btn btn-dropdown dropdown-toggle price-tag-<?php echo $value->id; ?>" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?php echo $label; ?>
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <?php if($value->product_type == "normal"){ ?>
                                
                                <?php if($value->price){ ?>
                                  <li><a id="<?php echo $value->id."_".$value->price ?>" class="change-price" href="javascript:void(0);">Single</a></li>
                                  <span style="display: none;" class="menu-price" id="price_<?php echo $value->id ?>">Rs.<?php echo $value->price ?></span>
                                  <span style="display: none;" class="menu-price" id="price_<?php echo $value->id."_Single" ?>">Rs.<?php echo $value->price ?></span>
                                <?php } ?> 

                                <?php if($value->half_price){ ?>
                                <li><a id="<?php echo $value->id."_".$value->half_price ?>" class="change-price" href="javascript:void(0);">Half</a></li>
                                <span style="display: none;" class="menu-price" id="price_<?php echo $value->id."_Half" ?>">Rs.<?php echo $value->half_price ?></span>
                                <?php } ?>

                                <?php if($value->full_price){ ?>
                                  <li><a id="<?php echo $value->id."_".$value->full_price ?>" class="change-price" href="javascript:void(0);">Full</a></li>
                                  <span style="display: none;" class="menu-price" id="price_<?php echo $value->id."_Full" ?>">Rs.<?php echo $value->full_price ?></span>
                                <?php } ?>

                                <?php if($value->family_pack_price){   ?>

                                   <li><a id="<?php echo $value->id."_".$value->family_pack_price ?>" class="change-price" href="javascript:void(0);">Family Pack</a></li>
                                   <span style="display: none;" class="menu-price" id="price_<?php echo $value->id."_Family" ?>">Rs.<?php echo $value->family_pack_price ?></span>
                              <?php } } ?>
                                
                                <!-- <li><a href="#">Half</a></li>
                                <li><a href="#">Full</a></li>
                                <li><a href="#">Family Pack</a></li> -->
                                <input type="hidden" value="Single" id="selected-packname-<?php echo $value->id; ?>">
                                <input type="hidden" value="<?php echo $value->price ?>" id="selected-packprice-<?php echo $value->id; ?>">
                            </ul>
                        </div>
                        <div class="number-field">
                            <button id="decrement_<?php echo $value->id ?>" class="decrement">-</button>
                            <input id="number_<?php echo $value->id ?>" type="number" value="1" placeholder="1" min="1" max="99">
                            <button id="increment_<?php echo $value->id ?>" class="increment">+</button>
                        </div>
                        <p id="cart_<?php echo $value->id ?>" class="addToCart menu-speacification"><button class="add-to-cart-button">Add To Cart</button></p>
                    </div>
                </div>
          </div>
        <?php } ?>

      </div>
      </div>
  </section>
  <!--MENUS AREA END-->
  <?php if(isset($total_record) && $total_record > 0){ ?>
  <section class="blog-page blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="single-post-pagination">
                      <ul class="page-pagination">
                        <?php
                            $page_no = (isset($_GET["page_no"]) && $_GET["page_no"] > 0 ) ? $_GET["page_no"] : 1;  
                            $menu = (isset($_GET["menu"]) && $_GET["menu"] > 0 ) ? "menu=".intval($_GET["menu"])."&" : "";  
                            $total_button = ceil($total_record / 10);
                            for($i = 1; $i<$total_button; $i++){ ?>
                              <li class="<?php echo ($i == $page_no) ? "active" : ""; ?>"><a href="<?php echo base_url()."?".$menu."page_no=".$i ?>#menu"><?php echo $i; ?></a></li>
                            <?php }  ?>
                          </ul>
                        </div>
                  </div>
              </div>
        </div>
    </section>
  <?php } ?>
  

  <!--MENUS AREA-->
  <section class="menus-area section-padding" id="tinpacks">
    <div class="container wow fadeIn">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="area-title text-center">
            <h2>Tin Packs</h2>
          </div>
        </div>
      </div>
      <div class="row food-menu-list">
       <!--  <?php foreach ($tinpack as $key => $value) { ?>
          
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="card shadow-depth-1">
                    <?php if($value->product_image) { ?>
                    <img class="card-img-top" src="<?php echo PRODUCTS_IMAGES.'/'.$value->product_image ?>" alt="Card image cap">
                    <?php }else{ ?>
                    <img class="card-img-top" src="<?php echo PRODUCTS_IMAGES."/placeholder.jpg" ?>" alt="Card image cap">
                    <?php } ?>
                    <div class="card-body">
                        <h4 class="card-title" style="height:57px; margin-top:5px;"><strong id="name_<?php echo $value->id ?>" ><?php echo $value->product_name ?></strong>
                        
                        </h4>
                        <p style="height:60px; font-size:12px;"><?php echo $value->description ?></p>
                        <span class="menu-price" id="price_<?php echo $value->id ?>">Rs.<?php echo $value->tinpack_435_grams_price ?></span>
                        <div class="dropdown">
                            <button class="btn btn-dropdown dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            435 grams
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <?php if($value->tinpack_435_grams_price){ ?>
                                  <li><a id="<?php echo $value->id."_".$value->tinpack_435_grams_price ?>" class="change-price" href="javascript:void(0);">435 grams</a>
                                  </li>
                                <?php } ?> 

                                <?php if($value->tinpack_850_grams_price){ ?>
                                  <li><a id="<?php echo $value->id."_".$value->tinpack_850_grams_price ?>" class="change-price" href="javascript:void(0);">850 grams</a>
                                  </li>
                                <?php } ?> 

                                <input type="hidden" value="435 grams" id="selected-packname-<?php echo $value->id; ?>">
                                <input type="hidden" value="<?php echo $value->tinpack_435_grams_price ?>" id="selected-packprice-<?php echo $value->id; ?>">
                            </ul>
                        </div>
                        <div class="number-field">
                            <button id="decrement_<?php echo $value->id ?>" class="decrement">-</button>
                            <input id="number_<?php echo $value->id ?>" type="number" value="1" placeholder="1" min="1" max="99">
                            <button id="increment_<?php echo $value->id ?>" class="increment">+</button>
                        </div>
                        <p id="cart_<?php echo $value->id ?>" class="addToCart menu-speacification"><button class="add-to-cart-button">Add To Cart</button></p>
                    </div>
                </div>
          </div>
        <?php } ?> -->
        <?php foreach ($tinpack as $key => $value) { ?>
          
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="card shadow-depth-1">
                    <?php if($value->product_image) { ?>
                    <img class="card-img-top" src="<?php echo PRODUCTS_IMAGES.'/'.$value->product_image ?>" alt="Card image cap">
                    <?php }else{ ?>
                    <img class="card-img-top" src="<?php echo PRODUCTS_IMAGES."/placeholder.jpg" ?>" alt="Card image cap">
                    <?php } ?>
                    <div class="card-body">
                        <h4 class="card-title" style="height:57px; margin-top:5px;"><strong id="name_<?php echo $value->id ?>" ><?php echo $value->product_name ?></strong>
                        
                        </h4>
                        <p style="height:60px; font-size:12px;"><?php echo $value->description ?></p>
                        <span class="menu-price" id="price_<?php echo $value->id ?>">Rs.<?php echo $value->tinpack_435_grams_price ?></span>
            <span style="display: none;" class="menu-price" id="price_<?php echo $value->id."_435g" ?>">Rs.<?php echo $value->price ?></span>
                        <div class="dropdown">
                            <button class="btn btn-dropdown dropdown-toggle price-tag-<?php echo $value->id; ?> " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            435 grams
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <?php if($value->tinpack_435_grams_price){ ?>
                                  <li><a id="<?php echo $value->id."_".$value->tinpack_435_grams_price ?>" class="change-price" href="javascript:void(0);">435 grams</a>
                                  </li>
                  <span style="display: none;" class="menu-price" id="price_<?php echo $value->id ?>">Rs.<?php echo $value->tinpack_435_grams_price ?></span>
                                  <span style="display: none;" class="menu-price" id="price_<?php echo $value->id."_435g" ?>">Rs.<?php echo $value->tinpack_435_grams_price ?></span>
                                <?php } ?> 

                                <?php if($value->tinpack_850_grams_price){ ?>
                                  <li><a id="<?php echo $value->id."_".$value->tinpack_850_grams_price ?>" class="change-price" href="javascript:void(0);">850 grams</a>
                                  </li>
                  <span style="display: none;" class="menu-price" id="price_<?php echo $value->id ?>">Rs.<?php echo $value->tinpack_850_grams_price ?></span>
                                  <span style="display: none;" class="menu-price" id="price_<?php echo $value->id."_850g" ?>">Rs.<?php echo $value->tinpack_850_grams_price ?></span>
                                <?php } ?> 

                                <input type="hidden" value="435 grams" id="selected-packname-<?php echo $value->id; ?>">
                                <input type="hidden" value="<?php echo $value->tinpack_435_grams_price ?>" id="selected-packprice-<?php echo $value->id; ?>">
                            </ul>
                        </div>
                        <div class="number-field">
                            <button id="decrement_<?php echo $value->id ?>" class="decrement">-</button>
                            <input id="number_<?php echo $value->id ?>" type="number" value="1" placeholder="1" min="1" max="99">
                            <button id="increment_<?php echo $value->id ?>" class="increment">+</button>
                        </div>
                        <p id="cart_<?php echo $value->id ?>" class="addToCart menu-speacification"><button class="add-to-cart-button">Add To Cart</button></p>
                    </div>
                </div>
          </div>
        <?php } ?>
        </div>
        </div>
        </section>

  <section class="blog-page blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="single-post-pagination">
                      <ul class="page-pagination">
                        <?php if(isset($tp_total_record) && $tp_total_record > 0){
                            $tpage_no = (isset($_GET["tpage_no"]) && $_GET["tpage_no"] > 0 ) ? $_GET["tpage_no"] : 1;  
                            $total_button = ceil($tp_total_record / 10);
                            for($i = 1; $i<$total_button; $i++){ ?>
                              <li class="<?php echo ($i == $tpage_no) ? "active" : ""; ?>"><a href="<?php echo base_url()."?tpage_no=".$i ?>#menu"><?php echo $i; ?></a></li>
                            <?php } } ?>
                          </ul>
                        </div>
                        </div>
                        </div>
                        </div>
                    </section>
      </div>
    </div>
  </section>
  <!--MENUS AREA END-->

  <!--RESERVATION BUTTON AREA-->
  <section class="reservation-button-area section-padding" id="reservation-button">
    <div class="reservation-button-area-bg"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <!-- RESERVATION FORM MODAL -->
          <div class="modal fade" id="reservation-form-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Table Booking Reservation Form</h4>
                </div>
                <div class="modal-body">
                  <div class="reservation-form">
                    <form action="#" class="table-booking-form" id="reservation">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- RESERVATION FORM MODAL -->


   <!-- CART FORM MODAL -->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="cartModel" tabindex="-1" role="dialog">
             <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                  <h4 style="color:red" class="modal-title">Cart Items</h4>
                  </div>
                    <div class="modal-body">
                      
                        <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                         <div class="blog-sidebar">
                          <div class="" style="visibility: inherit !important; animation-name: none;">
                              <h4>Your Order Items </h4>
                              <ul id="display-cart-item">
                              </ul>
                          </div>
                          </div>
                        </div>
                        </div>
                  
                    </div>
                <div class="modal-footer"> 
                  <button type="button" onclick="location.href = '<?php echo base_url()."home/checkout_details" ?>'" class="btn btn-danger">Checkout</button>
                  <button type="button"  class="btn btn-danger" data-dismiss="modal">Close</button>
<!--                   <button id="Save-cart" type="button" class="btn btn-danger">Save</button> -->
                </div>
              </div>
            </div>
          </div>
          <!-- CART FORM MODAL -->



          <!-- ADDRESS FORM MODAL -->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                  <h4 style="color:red" class="modal-title">Address</h4>
                  </div>
                    <div class="modal-body">
                      <div class="reservation-form">
                      <form action="#" class="table-booking-form" id="reservation">
                        <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                          <label for="name"><i class="fa fa-user-o"></i></label>
                          <select style="color: white;border-color: white; background-color: e11e26;" id="address" name="address">
                          <option value="0">Select Location</option>
                          <?php foreach($address_list as $key => $value){ 
                              $val = trim($value->id."_".$value->fair);
                            ?>
                            <option style="color:black;" value="<?php echo $val; ?>"><?php echo $value->address ?></option>
                          <?php } ?>
                          </select>
                        </div>
                        </div>
                    </form>
                  </div>
                </div>
                <div class="modal-footer"> 
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button id="save-address" type="button" class="btn btn-danger">Save</button>
                </div>
              </div>
            </div>
          </div>
          <!-- ADDRESS FORM MODAL -->

        <!-- Login / signup FORM MODAL -->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="signupModel" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
<!--                 <div class="modal-header">
                  <h4 style="color:red" class="modal-title">Login / Signup</h4>
                </div> -->
          <div class="modal-body">
            <div class="reservation-form">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item login-btn">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
              </li>
              <li class="nav-item signup-btn">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Signup</a>
              </li>
            </ul>
            <hr>
                  <!-- FORM START -->
                  <!-- Login Form -->
                  <div class="tab-content" id="pills-tabContent">
                    <div style="color: black;" class="tab-pane fade show active in" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <form action="#" class="table-booking-form login-form" id="reservation">
                        <div class="row">
                            <div style="display: none" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 error-login">
                             <label for="name"><i class="fa fa-lock"></i></label>
                            <input  style="background-color: saddlebrown;" readonly="readonly" type="text" name="name" id="error-login-msg" placeholder="all fields are mendatory">
                            </label>
                          </div>
                          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <label for="name"><i class="fa fa-user-o"></i></label>
                            <input required="required" type="email" name="email" id="login_email" placeholder="Email">
                          </div>
                          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <label for="email"><i class="fa fa-at"></i></label>
                            <input required="required" type="password" name="password" id="login_password" placeholder="Password">
                          </div>
                          <div class="col-md-6 col-lg-6 col-sm-6 col-sm-offset-3  col-md-offset-3  col-lg-offset-3 col-xs-12">
                            <button id="login-form-btn" type="button">Login</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Login Form -->
                    <!-- Signup Form -->
                    <div style="color: black;" class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                      <form action="#" class="table-booking-form signup-form" id="sign_up">
                        <div class="row">
                          <div style="display: none" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 error-signup">
                             <label for="name"><i class="fa fa-lock"></i></label>
                            <input style="background-color: saddlebrown;" id="error-signup-msg" readonly="readonly" type="text" name="name" id="name" placeholder="all fields are mendatory">
                            </label>
                          </div>
                          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                            <label for="name"><i class="fa fa-user-o"></i></label>
                            <input required="required" type="text" name="name" id="username" placeholder="Name...">
                          </div>
                          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                            <label for="email"><i class="fa fa-at"></i></label>
                            <input required="required" type="email" name="email" id="signup_email" placeholder="Email...">
                          </div>
                          <div class="col-md-sign_up col-lg-6 col-sm-6 col-xs-12">
                            <label for="password"><i class="fa fa-phone"></i></label>
                            <input required="required" type="password" name="password" id="signup_password" placeholder="password...">
                          </div>
                          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                            <label for="mobile"><i class="fa fa-phone"></i></label>
                            <input required="required" type="text" name="mobile" id="mobile-signup" placeholder="Mobile...">
                          </div>
                          <div class="col-md-6 col-lg-6 col-sm-6 col-sm-offset-3  col-md-offset-3  col-lg-offset-3 col-xs-12">
                            <button id="signup-form-btn" type="button">Sign Up</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Sign Up Form -->
                  </div>
                  <!-- FORM END -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ADDRESS FORM MODAL -->     
        </div>
      </div>
    </div>
  </section>
  <!--RESERVATION BUTTON AREA END-->

  <!--BLOG AREA-->
  <section class="blog-area section-padding" id="blog">
    <!-- <div class="blog-area-bg" data-stellar-background-ratio="0.6"></div> -->
    <div class="container wow fadeIn">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="area-title text-center">
            <h2>Reservations</h2>
          </div>
        </div>
      </div>
      
           <div  class="row">
              <div class=" col-md-6 col-lg-6 col-sm-6  col-xs-6">
                <button id="reservation-tab1" class="selected-reservation reservation-tab" type="button">Table Booking</button>
              </div>
              <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                <button id="reservation-tab2" class="reservation-tab" type="button">Event Reservation</button>
              </div>
            </div>       

      <div class="modal-body">
        <div class="reservation-form">
          <form action="#" class="table-booking-form" id="reservation">

            <!-- Table Booking Form -->
            <div id="table-form" class="row">
                        <div style="display: none" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 error-tab">
                           <label for="name"><i class="fa fa-lock"></i></label>
                          <input style="background-color: saddlebrown;" id="error-tab-msg" readonly="readonly" type="text" placeholder="all fields are mendatory">
                          </label>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                          <label for="name"><i class="fa fa-user-o"></i></label>
                          <input type="text" name="name" id="tab-name" placeholder="Name...">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                          <label for="email"><i class="fa fa-at"></i></label>
                          <input type="email" name="email" id="tab-email" placeholder="Email...">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                          <label for="mobile"><i class="fa fa-phone"></i></label>
                          <input type="text" name="mobile" id="tab-mobile" placeholder="Mobile...">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                          <label for="date"><i class="fa fa-calendar"></i></label>
                          <input type="text" class="tab-date" name="date" id="date" data-select="datepicker" placeholder="Date...">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                          <label for="time"><i class="fa fa-clock-o"></i></label>
                          <input type="text" class="tab-time" id="time-2" placeholder="Time...">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                          <label for="person"><i class="fa fa-user"></i></label>
                          <input type="text" id="tab-person" placeholder="Person...">
                        </div>
                        
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                          <label for="name"><i class=""></i></label>
                          <input type="text" name="name" id="tab-notes" placeholder="Special Notes...">
                        </div>

                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                          
                          <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                          <button id="ground" class="floor" type="button">Ground Floor</button>
                        </div>
                          <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                          <button id="first" class="floor" type="button">First Floor</button>
                        </div>
						<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                          <button id="second" class="floor" type="button">Second Floor</button>
                        </div>
                        </div>
                        <input type="hidden" id="floor" value="">
                        <div style="margin-top: 20px;" class="col-md-6 col-lg-6 col-sm-6 col-sm-offset-3  col-md-offset-3  col-lg-offset-3 col-xs-12">
                          <button id="table-booking" type="button">book a table</button>
                        </div>
                      </div>
            <!-- Table Booking Form -->

            <!-- Reservation Form -->
            <div id="res-form" style="display: none;" class="row">
              <div style="display: none" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 error-res">
                 <label for="name"><i class="fa fa-lock"></i></label>
                <input style="background-color: saddlebrown;" id="error-res-msg" readonly="readonly" type="text" name="name" id="name" placeholder="all fields are mendatory">
                </label>
              </div>
              <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <label for="name"><i class="fa fa-user-o"></i></label>
                <input type="text" name="name" id="res-name" placeholder="Name...">
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <label for="email"><i class="fa fa-at"></i></label>
                <input type="email" name="email" id="res-email" placeholder="Email...">
              </div>
              <div class="col-md-6 col-lg-12 col-sm-12 col-xs-12">
                <label for="mobile"><i class="fa fa-phone"></i></label>
                <input type="number" name="mobile" id="res-mobile" placeholder="Mobile...">
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <label for="date"><i class="fa fa-calendar"></i></label>
                <input type="text" class="res-date" name="date" id="date" data-select="datepicker" placeholder="Date...">
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <label for="time"><i class="fa fa-clock-o"></i></label>
                <input type="text" class="res-start-time" id="time" placeholder="Start Time...">
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <label for="time"><i class="fa fa-clock-o"></i></label>
                <input type="text" class="res-end-time" id="time-3" placeholder="End Time...">
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <label for="person"><i class="fa fa-user"></i></label>
                <input type="text" name="person" id="res-adult-person" placeholder="Total Person...">
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <label for="name"><i class="fa fa-user-o"></i></label>
                <input type="text" name="name" id="res-event-type" placeholder="Event Type...">
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <label for="name"><i class="fa fa-user-o"></i></label>
                <input type="text" name="name" id="res-notes" placeholder="Special Notes...">
              </div>
                </div>

              </div>
              <!--<div class="row">
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <strong style="color:white;">Select menu by clicking one of the following button:</strong>
                  </div></div><br/>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    
                  <?php foreach ($deals as $key => $value) { ?>
                  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                    <button class="deals" id="<?php echo "dealid_".$value->id."_".$value->price ?>" type="button"><?php echo $value->name; ?></button>
                   
                 </div>
                  <?php } ?>
                    
                </div>
                </div>
                <br/><br/>-->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <h2 style="color:white; text-align:center">Select Menu</h2>
                        </div>
                <?php foreach ($deals as $key => $value) { ?>
                <div class = "col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <center>
                        <button class="deals" id="<?php echo "dealid_".$value->id."_".$value->price ?>" type="button"><?php echo $value->name; ?></button>
                        </center>
                     <ul>
                      <li style="color:white" > Price : <?php echo $value->price; ?></li>
                      <li style="color:white" > <?php echo $value->description; ?></li>
                    </ul>
                    </div>
                    <?php } ?>
                    </div>
                    
              <div class="col-md-6 col-lg-6 col-sm-6 col-sm-offset-3  col-md-offset-3  col-lg-offset-3 col-xs-12">
                <label for="name"><i class="fa fa-user-o"></i></label>
                <input type="text" id="total-amount" placeholder="Total Amount">
              </div>
              <div class="col-md-6 col-lg-6 col-sm-6 col-sm-offset-3  col-md-offset-3  col-lg-offset-3 col-xs-12">
                <button id="reservation-btn" type="button">Reserve</button>
              </div>
            </div>
            <!-- Reservation Form -->

          </form>
        </div>
      </div>
    </div>
  </section>
  <!--BLOG AREA END-->

  <!--TEAM AREA-->
  <section class="team-area section-padding" id="services">
    <!--<div class="container wow fadeIn"> -->
    <div class="container wow fadeIn">
        
      <div class="row">
          <!--col-md-12 col-lg-12 col-sm-12 col-xs-12-->
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="area-title text-center">
            <h2>We are offering</h2>
          </div>
        </div>
      </div>
                  <div class="row post-slider">
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/dine-in.png" alt="">
            </div>
            <div class="member-details">
              <h2>Dine In</h2>
            </div>
          </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                     <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/business-meetings.png" alt="">
            </div>
            <div class="member-details">
              <h2>Business Meetings</h2>
            </div>
          </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                     <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/take-away.png" alt="">
            </div>
            <div class="member-details">
              <h2>Take Away</h2>
            </div>
          </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/order-online.png" alt="">
            </div>
            <div class="member-details">
              <h2>Online Ordering</h2>
            </div>
          </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/catering.png" alt="">
            </div>
            <div class="member-details">
              <h2>Catering</h2>
            </div>
          </div>
          </div>
          <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
          <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/event-organizing.png" alt="">
            </div>
            <div class="member-details">
              <h3>Event Organizing</h3>
            </div>
          </div>
          </div>
            </div>
      <!--<div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 team-slider">
          <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/dine-in.png" alt="">
            </div>
            <div class="member-details">
              <h3>Dine In</h3>
            </div>
          </div>
          <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/business-meetings.png" alt="">
            </div>
            <div class="member-details">
              <h3>Business Meetings</h3>
            </div>
          </div>
          <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/take-away.png" alt="">
            </div>
            <div class="member-details">
              <h3>Take Away</h3>
            </div>
          </div>
          <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/order-online.png" alt="">
            </div>
            <div class="member-details">
              <h3>Online Ordering</h3>
            </div>
          </div>
          <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/catering.png" alt="">
            </div>
            <div class="member-details">
              <h3>Catering</h3>
            </div>
          </div>
          <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/event-organizing.png" alt="">
            </div>
            <div class="member-details">
              <h3>Event Organizing</h3>
            </div>
          </div>
        </div>
      </div>-->
    </div>
  </section>
  <!--TEAM AREA END-->
  
      <!--BLOG AREA-->
    <!--<section class="blog-area section-padding" id="blog">
        <div class="blog-area-bg" data-stellar-background-ratio="0.6"></div>
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row post-slider">
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/dine-in.png" alt="">
            </div>
            <div class="member-details">
              <h3>Dine In</h3>
            </div>
          </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                     <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/business-meetings.png" alt="">
            </div>
            <div class="member-details">
              <h3>Business Meetings</h3>
            </div>
          </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                     <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/take-away.png" alt="">
            </div>
            <div class="member-details">
              <h3>Take Away</h3>
            </div>
          </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/order-online.png" alt="">
            </div>
            <div class="member-details">
              <h3>Online Ordering</h3>
            </div>
          </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/catering.png" alt="">
            </div>
            <div class="member-details">
              <h3>Catering</h3>
            </div>
          </div>
          </div>
          <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
          <div class="single-team-member text-center">
            <div class="team-member-img ">
              <img src="<?=base_url()."assets/ui-design/"?>img/services/event-organizing.png" alt="">
            </div>
            <div class="member-details">
              <h3>Event Organizing</h3>
            </div>
          </div>
          </div>
            </div>
        </div>
    </section>-->
    <!--BLOG AREA END-->

  <!--INSTAGRAM GALLERY FEED-->
  <section class="gallery-area section-padding" id="gallery">
    <div class="container wow fadeIn">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="area-title text-center">
            <h2>Gallery</h2>
          </div>
        </div>
      </div>
       <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 team-slider">
                  <?php foreach ($gallaryImages as $key => $value) { ?>
                   <!-- <div class="single-team-member text-center">
                        <div class="team-member-img ">
                            <img src="<?php echo GALLARY_IMAGES.$value->path ?>" alt="">
                        </div>
                    </div>-->
                    
                    
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"  data-image="<?php echo GALLARY_IMAGES.$value->path ?>" data-target="#image-gallery">
                <img class="img-responsive" src="<?php echo GALLARY_IMAGES.$value->path ?>" alt="Another alt text">
            </a>
        
                    
                  <?php } ?>
                </div>
            </div>
                        <!-- Modal -->

                        <!--Modal-->
                        
    </div>
    
    

    
    
  </section>
  
  
                          <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:  93%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image"style="width:100%" class="img-responsive" src="">
            </div>
            <div class="modal-footer">

                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" >
                    <button type="button"  class="btn btn-primary" style="float:left;" id="show-previous-image">Previous</button>
                </div>

                

                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" >
                    <button type="button"  id="show-next-image" style="float:right;" class="btn btn-default">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
  
  <!--INSTAGRAM GALLERY FEED END-->

  <section class="gallery-area section-padding" id="location">
    <div class="container wow fadeIn">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="area-title text-center">
            <h2>Location</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=Karachi%20Foods&key=AIzaSyBHYHWMshGACuAL8Z6y4RBsmHsQL5hgTjk" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>
  <div id="display-cart">
      
    <button class="feedback"><img src="<?=base_url()."assets/ui-design/img/icons/"?>cart.svg"/></button>
  </div>
  <!--FOOER AREA-->
  <div class="footer-area" id="contact">
    <!-- <div class="footer-area-bg" data-stellar-background-ratio="0.6">
        </div> -->
    <div class="container wow fadeIn">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="footer-top section-padding text-center">
            <div class="footer-logo">
              <a href="#"><img src="<?=base_url()."assets/ui-design/"?>img/logo.jpg" width="300" height="47" alt=""></a>
            </div>
            <div class="footer-address">
              <p>12-A, Block 6, PECHS, Karachi, Pakistan</p>
              <p><a href="mailto:mehedidb@gmail.com">info@karachifoods.com</a></p>
              <p><a href="callto:+922134385345">+92 213 438 5345</a>&nbsp;&nbsp;<a href="callto:+922134388261">+92 213 438 8261</a>&nbsp;&nbsp;<a href="callto:+922134386581">+92 213 4386 581</a>&nbsp;&nbsp;<a href="callto:+922134386582">+92 213 4386 582</a></p>
            </div>
            <div class="footer-social-bookmark">
              <ul>
                <li><a target="_blank" href="https://www.facebook.com/KarachiFoodsOfficial/"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="footer-copyright">
          <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
            <p>&copy; 2018 <a href="#">Karachi Foods</a> Powered by <a href="http://www.technorupt.com">Technorupt</a>.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--FOOER AREA END-->


  <!--====== SCRIPTS JS ======-->
  <script src="<?=base_url()."assets/ui-design/"?>js/vendor/jquery-1.12.4.min.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/vendor/bootstrap.min.js"></script>

  <!--====== PLUGINS JS ======-->
  <script src="<?=base_url()."assets/ui-design/"?>js/vendor/jquery.easing.1.3.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/vendor/jquery-migrate-1.2.1.min.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/jquery.pogo-slider.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/owl.carousel.min.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/stellar.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/jquery.mixitup.min.js"></script>
<!--   <script src="<?=base_url()."assets/ui-design/"?>js/instafeed.min.js"></script> -->
  <script src="<?=base_url()."assets/ui-design/"?>js/datepicker.min.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/timepicker.min.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/wow.min.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/jquery.mb.YTPlayer.min.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/typed.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/jquery.sticky.js"></script>
  <script src="<?=base_url()."assets/ui-design/"?>js/custom.js"></script>

  <!--===== ACTIVE JS=====-->
  <script src="<?=base_url()."assets/ui-design/"?>js/main.js"></script>
  <script type="text/javascript">
    $('.player').mb_YTPlayer();
  
    $(window).on('load',function(){

       var result = document.cookie.match(new RegExp('address' + '=([^;]+)'));
        result && (result = JSON.parse(result[1]));
        if(!result){
          $('#myModal').modal('show');
        }
    });
  
  $(document).ready(function(){
      

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */
     


    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });

    }
});
  
  </script>
</body>

</html>
