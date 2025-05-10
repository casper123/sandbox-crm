<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo APP_NAME; ?></title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url()?>/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url()?>/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https:/fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/vendors/css/prism.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/css/app.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
  </head>
  <body data-col="1-column" class=" 1-column  blank-page blank-page">

    <div class="wrapper">
      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper"><!--Login Page Starts-->
			<section id="login">
			    <div class="container-fluid">
			        <div class="row full-height-vh">
			            <div class="col-12 d-flex align-items-center justify-content-center">
			                <div class="card gradient-indigo-purple text-center width-400">
			                    <div class="card-img overlap">
			                        <img alt="element 06" class="mb-1" src="<?=base_url()?>admin_assets//img/portrait/avatars/avatar-08.png" width="190">
			                    </div>
			                    <div class="card-body">
			                        <div class="card-block">
			                            <h2 class="white">Login</h2>
			                            <form action="<?=base_url()."admin"?>" method="post">
			                                <div class="form-group">
			                                    <div class="col-md-12">
			                                        <input type="text" class="form-control" name="name" id="name" placeholder="User Name" required >
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <div class="col-md-12">
			                                        <input type="password" class="form-control" name="inputPass" id="password" placeholder="Password" required>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <div class="row">
			                                        <div class="col-md-12">
			                                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0 ml-3">
			                                                <input type="checkbox" class="custom-control-input" checked id="rememberme">
			                                                <label class="custom-control-label float-left white" for="rememberme">Remember Me</label>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>

			                                <div class="form-group">
			                                    <div class="col-md-12">
			                                        <button type="submit" class="btn btn-pink btn-block btn-raised">Login</button>
			                                    </div>
			                                </div>
			                            </form>
			                        </div>
			                    </div>
			                    <!-- <div class="card-footer">
			                        <div class="float-left"><a (click)="onForgotPassword()" class="white">Recover Password</a></div>
			                        <div class="float-right"><a (click)="onRegister()" class="white">New User?</a></div>
			                    </div> -->
			                </div>
			            </div>
			        </div>
			    </div>
			</section>
<!--Login Page Ends-->
          </div>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?=base_url()?>admin_assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="<?=base_url()?>admin_assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/js/customizer.js" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>


</html>