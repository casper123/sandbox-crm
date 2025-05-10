<!DOCTYPE html>
<html lang="en" class="loading">
  

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Sand Box Receipt</title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url()?>/admin_assets/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>/admin_assets/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>/admin_assets/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url()?>/admin_assets/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>/admin_assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?=base_url()?>/admin_assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/admin_assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/admin_assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/admin_assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/admin_assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/admin_assets/vendors/css/prism.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/admin_assets/css/app.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
  </head>
  <style type="text/css">
  .main-panel .main-content {
     padding-left: 0px !important; 
  }
  </style>
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <!-- / main menu-->

      <div class="main-panel">
        <div class="main-content">
        <div class="content-wrapper"><!--Invoice template starts-->
        <section class="invoice-template">
            <div class="card">
                <div class="card-body p-3">
                    <div id="invoice-template" class="card-block">
                <div id="invoice-items-details" class="pt-2">
                    <div class="row">
                        <div id="invoiceData" class="table-responsive col-sm-12">
                             <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h2>Sand Box</h2>
                                            <ul class="px-0 list-unstyled">
                                            <li class="text-bold-800" style="line-height:1rem;">A26, PECHS Block 6, Karachi, Pakistan<br/>https://sandbox.com.pk</li>
                                            </ul>
                                        </td>
                                        <td><img class="img-responsive" src="https://sandbox.com.pk/images/sandbox.png" /></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <ul class="px-0 list-unstyled">
                                                <li class="text-bold-800">Bill To</li>
                                                <li class="text-bold-800"><? echo ($invoice->team_name != "") ? $invoice->team_name : $invoice->customerName?></li>
                                                <? if ($customerAddress != "") { ?><li class="text-bold-800"><span class="text-muted">Address : </span><? echo $invoice->customerAddress?></li> <? } ?>
                                                <li class="text-bold-800"><span class="text-muted">Email : </span><? echo ($invoice->owner_email != "") ? $invoice->owner_email : $invoice->customerEmail?></li>
                                                <li class="text-bold-800"><span class="text-muted">Contact : </span><? echo ($invoice->owner_contact != "") ? $invoice->owner_contact : $invoice->customerPhone?></li>
                                            </ul>
                                        </td>
                                <td>
                                    <ul class="px-0 list-unstyled">
                                        <li class="text-bold-800"><span class="text-muted">Receipt #</span> <?php echo $payments[0]->payment_number; ?></li>
                                        <li class="text-bold-800"><span class="text-muted">Payment Method :</span> <?=$payments[0]->payment_method;?></li>
                                        <li class="text-bold-800"><span class="text-muted">Payment Date :</span> <?=date("d, M, Y", strtotime($payments[0]->create_date))?></li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                                <thead>
                                    <tr style="background:#e74c3c; color:#fff;">
                                        <th>Description</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? $total = 0; ?>
                                    <? foreach ($payments as $key => $value) { ?>
                                    <? $total = $total + $value->amount ?>
                                    <tr>
                                    <td><?=ucfirst($value->description)?></span></td>
                                    <td class="text-right">PKR <?=number_format($value->amount)?></span></td>
                                    </tr>
                                    <? } ?>
                                    <tr style="background:#e74c3c; color:#fff;">
                                        <td class="text-right">Total</td>
                                        <td class="text-right">PKR <?php echo number_format($total); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="clearfix text-muted text-sm-center px-2">This is a computer generated receipt and does not require any signature</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Invoice template ends-->
          </div>
        </div>

        

      </div>
    </div>
  </body>

  <script>
      window.onload = function() {
        window.print();  
      };
  </script>


</html>