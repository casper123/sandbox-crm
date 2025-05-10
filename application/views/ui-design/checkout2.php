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
    <meta name="description" content="Dawat Restaurant is a simple restaraunt website for restaurant business" />
    <meta name="keywords" content="restaurant, pizza, burger, business, house, online, delevery, html, coffee, cafe, bar" />
    <meta name="author" content="BDEXPERT" />

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
  background-color : #31B0D5;
  color: white;
  padding: 10px 20px;
  border-radius: 4px;
  border-color: #46b8da;
}

#display-cart {
  position: fixed;
  bottom: -4px;
  left: 10px;
}

.comment-box input, .comment-box select {
    border: 1px solid;
    display: block;
    margin-bottom: 30px;
    max-height: 100px;
    padding: 5px 10px;
    width: 100%;
}

.post-widget ul li .post-tumb{
  width :auto !important;
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

    <header class="top-area-checkout" id="home">

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
                                <li><a href="<?=base_url()?>">Back</a> </li>
                                <!--<li><a href="#about">about us</a></li>
                                <li><a href="#promotion">Specialities</a></li>
                                <li><a href="#menu">Menu/Order</a></li>
                                <li><a href="#tinpacks">Tin Packs</a></li>
                                <li><a href="#blog">Booking</a></li>
                                <li><a href="#services">Services</a></li>
                                <li><a href="#gallery">Gallery</a></li>
                                <!--<li><a href="#contact">Contact</a></li>
                                <li class="active"><a href="#" onclick="gotocheckout()">checkout</a></li>-->
                            </ul>
            </div>
          </div>
        </nav>
      </div>
      <!--END MAINMENU AREA END-->
    </div>



  </header>
    <!--END TOP AREA-->

    <!--RESERVATION BUTTON AREA-->
  <section class="reservation-button-area section-padding" id="reservation-button">
    <div class="reservation-button-area-bg"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <!-- ADDRESS FORM MODAL -->
            <div class="modal fade" data-backdrop="static" data-keyboard="false" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: red;" id="exampleModalLabel">Confirmation</h4>
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="modal-body">
                      <div class="reservation-form">
                        <form action="#" class="table-booking-form" id="reservation">
                          <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="mobile"><i class="fa fa-phone"></i></label>
                                <input type="text" name="mobile" id="mobile" value="Are you sure you want to proceed? ">
                              </div>
                            </div>
                          </div>
                    </form>
                  </div>
                </div>
                <div class="modal-footer">
                    <button style="background-color: red;color: white;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button style="background-color: red;color: white;" id="proceed-checkout" type="button" class="btn btn-primary">Save changes</button>
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
    <section class="blog-page blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    <div class="comment-box wow fadeIn">
                        <h4>Order Details</h4>
                            <div id="success-msg" style="display: none;">
                                <hr>
                                <h3 style="background-color: lightgreen;color: darkgreen;padding: 10px;">Your order placed successfully</h3>
                                <hr>
                            </div>
                            <label>Name : </label>
                            <input type="text" value="<?php echo (isset($user['name'])) ? $user['name'] : ''; ?>" id="comment-name" placeholder="Name..">
                            <label>Email : </label>
                            <input type="email" id="email" value="<?php echo (isset($user['email'])) ? $user['email'] : ''; ?>"  placeholder="Email..">
                            <label>Phone : </label>
                            <input type="number" id="ord-mobile" value="<?php echo (isset($user['phone'])) ? $user['phone'] : ''; ?>"  placeholder="phone..">
                            <label>Location : </label>
                             <select id="checkout-address" name="address">
                                <option value="0">Select Location</option>
                                <?php foreach($address_list as $key => $value){
                                  $val = trim($value->id."_".$value->fair);
                                 ?>
                                  <option value="<?php echo $val;?>"><?php echo $value->address ?></option>
                                <?php } ?>
                              </select>
                            <label>Complete Address : </label>
                            <textarea id="ord-c-address"></textarea>

                            <button id="confirm-order">Confirm Order</button>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="blog-sidebar">
                        <div class="single-sidebar-widget post-widget wow fadeIn">
                            <h4>Your Order Items </h4>
                            <ul id="display-cart-item">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--BLOG AREA END-->


    <!-- Models Area -->
     <!--RESERVATION BUTTON AREA-->
  <!--<section class="reservation-button-area section-padding" id="reservation-button">
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
                      <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                          <label for="name"><i class="fa fa-user-o"></i></label>
                          <input type="text" name="name" id="name" placeholder="Name...">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                          <label for="email"><i class="fa fa-at"></i></label>
                          <input type="email" name="email" id="email" placeholder="Email...">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                          <label for="mobile"><i class="fa fa-phone"></i></label>
                          <input type="text" name="mobile" id="mobile" placeholder="Mobile...">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                          <label for="date"><i class="fa fa-calendar"></i></label>
                          <input type="text" name="date" id="date" data-select="datepicker" placeholder="Date...">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                          <label for="time"><i class="fa fa-clock-o"></i></label>
                          <input type="text" id="time-2" placeholder="Time...">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                          <label for="person"><i class="fa fa-user"></i></label>
                          <select name="person" id="person">
                              <option style="color: black" value="2">2 Person</option>
                              <option style="color: black" value="3">3 Person</option>
                              <option style="color: black" value="4">4 Person</option>
                              <option style="color: black" value="5">5 Person</option>
                              <option style="color: black" value="6">6 Person</option>
                              <option style="color: black" value="7">7 Person</option>
                          </select>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-sm-offset-3  col-md-offset-3  col-lg-offset-3 col-xs-12">
                          <button type="submit">book a table</button>
                        </div>
                      </div>
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
                  <button type="button"  class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button id="Save-cart" type="button" class="btn btn-danger">Save</button>
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
                          <select style="color: black;border-color: white;" id="address" name="address">
                          <option value="0">Select Location</option>
                          <?php foreach($address_list as $key => $value){ ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->address ?></option>
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
          <div class="modal-body">
            <div class="reservation-form">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
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
  </section>-->
  <!--RESERVATION BUTTON AREA END-->
    <!-- Models Area -->







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
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
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
    <script src="<?=base_url()."assets/ui-design/"?>js/instafeed.min.js"></script>
    <script src="<?=base_url()."assets/ui-design/"?>js/datepicker.min.js"></script>
    <script src="<?=base_url()."assets/ui-design/"?>js/timepicker.min.js"></script>
    <script src="<?=base_url()."assets/ui-design/"?>js/wow.min.js"></script>
    <script src="<?=base_url()."assets/ui-design/"?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url()."assets/ui-design/"?>js/jquery.sticky.js"></script>
    <script src="<?=base_url()."assets/ui-design/"?>js/custom.js"></script>

    <!--===== ACTIVE JS=====-->
    <script src="<?=base_url()."assets/ui-design/"?>js/main.js"></script>
</body>

</html>