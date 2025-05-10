<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo APP_NAME ?></title>
    <script src="<?=base_url()?>admin_assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url()?>admin_assets/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>admin_assets/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>admin_assets/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url()?>admin_assets/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>admin_assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>admin_assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet"> -->
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/vendors/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/vendors/css/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/vendors/css/tables/datatable/responsive.dataTables.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>admin_assets/css/app.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
  </head>

  <?php 

    $is_dashboard = (isset($selectedTab) && $selectedTab == "dashboard") ? "active" : "";
    $is_view_team = (isset($selectedTab) && $selectedTab == "view_team") ? "active" : "";
    $is_view_team_member = (isset($selectedTab) && $selectedTab == "view_team_member") ? "active" : "";
    $is_expense = (isset($selectedTab) && $selectedTab == "view_expense") ? "active" : "";
    $is_category = (isset($selectedTab) && $selectedTab == "view_category") ? "active" : "";
    $is_invoice = (isset($selectedTab) && $selectedTab == "invoice") ? "active" : "";
    $is_employee = (isset($selectedTab) && $selectedTab == "employee") ? "active" : "";
    $is_fmp_request = (isset($selectedTab) && $selectedTab == "fmp_request") ? "active" : "";
    $is_meeting_room = (isset($selectedTab) && $selectedTab == "meeting_room") ? "active" : "";
    ?>
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <div data-active-color="white" data-background-color="man-of-steel" data-image="<?=base_url()?>admin_assets/img/sidebar-bg/01.jpg" class="app-sidebar">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix">
            <a href="<?php echo base_url(); ?>admin/dashboard" class="logo-text float-left">
              <div class="logo-img"><img src="<?=base_url()?>admin_assets/img/logo.png"/>
              </div>
              <span class="text align-middle">SAND BOX</span>
          </a>
      </div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
              <li class="<?php echo $is_dashboard; ?>">
                <a href="<?php echo base_url(); ?>admin/dashboard"><i class="ft-home">    
                    </i><span data-i18n="" class="menu-title">Dashboard</span>
                </a>
              </li>
                <li class="has-sub nav-item"><a href="#"><i class="ft-aperture"></i><span data-i18n="" class="menu-title">Teams</span></a>
                <ul class="menu-content">
                  <li class="<?php echo $is_view_team; ?>"><a href="<?php echo base_url(); ?>teams" class="menu-item">View Team</a>
                  </li>
                  <li class="<?php echo $is_view_team_member; ?>" ><a href="<?php echo base_url(); ?>teammembers" class="menu-item">View Team Member</a>
                  </li>
                </ul>
              </li>
              </li>
                <li class="has-sub nav-item"><a href="#"><i class="ft-aperture"></i><span data-i18n="" class="menu-title">Invitations</span></a>
                <ul class="menu-content">
                  <li class="<?php echo $is_view_team; ?>"><a href="<?php echo base_url(); ?>invitation" class="menu-item">View Invites</a>
                  </li>
                  <li class="<?php echo $is_view_team_member; ?>" ><a href="<?php echo base_url(); ?>invitation/create" class="menu-item">New Invite</a>
                  </li>
                </ul>
              </li>
              <? if($this->session->userdata("user_type") == 1) { ?>
              <li class="has-sub nav-item"><a href="#"><i class="ft-droplet"></i><span data-i18n="" class="menu-title">Invoice</span></a>
                <ul class="menu-content">
                  <li class="<?php echo $is_expense; ?>" ><a href="<?php echo base_url(); ?>invoice/invoiceList" class="menu-item">View Invoice</a>
                    <li class="<?php echo $is_expense; ?>" ><a href="<?php echo base_url(); ?>invoice/saveInvoice" class="menu-item">Add Invoice</a>
                  </li>
                </ul>
              </li>
              <? } ?>
              <? if($this->session->userdata("user_type") == 1) { ?>
              <li class="has-sub nav-item"><a href="#"><i class="ft-droplet"></i><span data-i18n="" class="menu-title">Payments</span></a>
                <ul class="menu-content">
                  <li class="<?php echo $is_category; ?>"><a href="<?php echo base_url(); ?>category" class="menu-item">Categories</a>
                  </li>
                  <li class="<?php echo $is_expense; ?>" ><a href="<?php echo base_url(); ?>payment" class="menu-item">View Payments</a>
                    <li class="<?php echo $is_expense; ?>" ><a href="<?php echo base_url(); ?>payment/create" class="menu-item">Add Payment</a>
                  </li>
                </ul>
              </li>
              <? } ?>
              <? if($this->session->userdata("user_type") == 1) { ?>
              <li class="has-sub nav-item"><a href="#"><i class="ft-droplet"></i><span data-i18n="" class="menu-title">Expense</span></a>
                <ul class="menu-content">
                  <li class="<?php echo $is_category; ?>"><a href="<?php echo base_url(); ?>category" class="menu-item">Categories</a>
                  </li>
                  <li class="<?php echo $is_expense; ?>" ><a href="<?php echo base_url(); ?>expense" class="menu-item">View Expense</a>
                    <li class="<?php echo $is_expense; ?>" ><a href="<?php echo base_url(); ?>expense/create" class="menu-item">Create Expense</a>
                  </li>
                </ul>
              </li>
              <? } ?>
              <? if($this->session->userdata("user_type") == 1) { ?>
              <li class="has-sub nav-item"><a href="#"><i class="ft-droplet"></i><span data-i18n="" class="menu-title">Journal Voucher</span></a>
                <ul class="menu-content">
                  <li class="<?php echo $is_expense; ?>" ><a href="<?php echo base_url(); ?>jv" class="menu-item">View Jv</a>
                    <li class="<?php echo $is_expense; ?>" ><a href="<?php echo base_url(); ?>jv/create" class="menu-item">Create Jv</a>
                  </li>
                </ul>
              </li>
              <? } ?>
              <li class="<?php echo $is_dashboard; ?>">
                <a href="<?php echo base_url(); ?>blogpost/index/"><i class="ft-home">    
                    </i><span data-i18n="" class="menu-title">Blogs</span>
                </a>
              </li>
              <li class="<?php echo $is_dashboard; ?>" style="background:#fff; color:#000;">
                <a style="color:#000;" href="<?php echo base_url(); ?>blogpost/save/"><i class="ft-home">    
                    </i><span data-i18n="" class="menu-title">New Blog</span>
                </a>
              </li>
              <li class="<?php echo $is_fmp_request; ?>">
                <a href="<?php echo base_url(); ?>request/"><i class="ft-square">    
                    </i><span data-i18n="" class="menu-title">Sand Box Request</span>
                </a>
              </li>
              <li class="<?php echo $is_fmp_request; ?>">
                <a href="<?php echo base_url(); ?>admin/fmpRequest"><i class="ft-square">    
                    </i><span data-i18n="" class="menu-title">Old Sand Box Request</span>
                </a>
              </li>
              <li class="<?php echo $is_meeting_room; ?>">
                <a href="<?php echo base_url(); ?>admin/sandboxMeetingRoom"><i class="ft-box">    
                    </i><span data-i18n="" class="menu-title">Meeting Room Calender</span>
                </a>
              </li>
              <? if($this->session->userdata("user_type") == 1) { ?>
              <li class="<?php echo $is_meeting_room; ?>">
                <a href="<?php echo base_url(); ?>admin/report_center"><i class="ft-box">    
                    </i><span data-i18n="" class="menu-title">Financial Reports</span>
                </a>
              </li>
              <? } ?>
              <li class="has-sub nav-item"><a href="#"><i class="ft-droplet"></i><span data-i18n="" class="menu-title">Employee Reports</span></a>
                <ul class="menu-content">
                  <li class="<?php echo $is_category; ?>"><a href="<?php echo base_url(); ?>employee" class="menu-item">Reports</a></li>
                  <li class="<?php echo $is_expense; ?>" ><a href="<?php echo base_url(); ?>employee/create" class="menu-item">Create Report</a></li>
                </ul>
              </li>
              <li class="<?php echo $is_meeting_room; ?>">
                <a href="<?php echo base_url(); ?>admin/changeLog"><i class="ft-box">    
                    </i><span data-i18n="" class="menu-title">Change Log</span>
                </a>
              </li>

            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
      </div>
      <!-- / main menu-->

      <div class="main-panel">
        <div class="main-content">
           <?php echo $content_for_layout; ?>
        </div>
      </div>
    </div>
    <!-- Theme customizer Starts-->
    
    <!-- Theme customizer Ends-->
    <!-- BEGIN VENDOR JS-->
    <script src="<?=base_url()?>admin_assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- <script src="<?=base_url()?>admin_assets/vendors/js/chartist.min.js" type="text/javascript"></script> -->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->

    <script src="<?=base_url()?>admin_assets/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/datatable/dataTables.responsive.min.js" type="text/javascript"></script>

    <script src="<?=base_url()?>admin_assets/js/data-tables/datatable-api.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/vendors/js/sweetalert2.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/js/customizer.js" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?=base_url()?>admin_assets/js/sweet-alerts.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/js/components-modal.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/js/custom.js" type="text/javascript"></script>
    <script src="<?=base_url()?>admin_assets/js/dashboard1.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js" type="text/javascript"></script>
    <script src="https://cdn.tiny.cloud/1/b3qt5ec55b22c5fqtyuiowwlfu7u7aev9eawhssd0zuk6i3s/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  
    <!-- END PAGE LEVEL JS-->
    <script type="text/javascript">
      $(document).ready(function () {

        tinymce.init({
          selector: '.contentarea',
          height : "500",
          // plugins: 'wordcount, link, lists image code table',
          // toolbar: "link numlist bullist styleselect | fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent image code table",
          plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
          images_upload_url: 'https://crm.sandbox.com.pk/blogpost/imageuploader/',
          images_upload_credentials: true,
          rel_list: [
            {title: 'Index and Follow', value: 'dofollow'},
            {title: 'No Index', value: 'noindex'},
            {title: 'No Follow', value: 'nofollow'},
            {title: 'Sponsored', value: 'noindex, nofollow, sponsored'},
          ]
        });
      });
    </script>
  </body>

</html>