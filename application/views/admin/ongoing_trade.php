<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LocalCoinTrade</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'; ?>">
    
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'; ?>">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'; ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php $this->load->view('admin/header'); ?>

        <?php $this->load->view('admin/side_bar'); ?>

        <?php foreach ($ongoingTradeInfo as $key => $arr){ ?>        
        <div class="modal fade" tabindex="-1" role="dialog" id="tradePreview<?php echo $arr['id'] ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="modal_heading">Trade Preview</h4>
              </div>
              <input type="hidden" name="trad_id" id="trad_id">
              <div class="modal-body" id="preview_div">
                <table class="table table-bordered">
                  <tr>
                    <th>Buyer Name</th>
                    <td><?php echo $arr['buyer_name'] ?></td>
                  </tr>
                   <tr>
                    <th>Seller name</th>
                    <td><?php echo $arr['seller_name'] ?></td>
                  </tr>
                   <tr>
                    <th>Currency</th>
                    <td><?php echo $arr['currency']; ?></td>
                  </tr>
                   <tr>
                    <th>Crypto Currency</th>
                    <td><?php echo $arr['crypto_currency']==1;  ?></td>
                  </tr>
                   <tr>
                    <th>Location</th>
                    <td><?php echo $arr['location'] ?></td>
                  </tr>
                   <tr>
                    <th>Currency Price</th>
                    <td><?php echo $arr['per_btc_currency_price']." ".$arr['currency'] ?></td>
                  </tr>
                   <tr>
                    <th>Payment Method</th>
                    <td><?php echo $arr['payment_method'] ?></td>
                  </tr>
                   <tr>
                    <th>Min Transaction Limit</th>
                    <td><?php echo $arr['min_transac_limit'] ?></td>
                  </tr>
                   <tr>
                    <th>Max Transaction Limit</th>
                    <td><?php echo $arr['max_transac_limit'] ?></td>
                  </tr>
                   <tr>
                    <th>Terms of trade</th>
                    <td><?php echo $arr['term_of_trad'] ?></td>
                  </tr>
                   <tr>
                    <th>Created Date</th>
                    <td><?php echo $arr['create_date'] ?></td>
                  </tr>
                   <tr>
                    <th>Updated Date</th>
                    <td><?php echo $arr['update_date'] ?></td>
                  </tr>
                </table>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <a class="btn btn-primary">Modify</a> -->
              </div>
            </div>
          </div>
        </div>
        <?php } ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Ongoing Trade</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <!-- small box -->
                        <h2>Ongoing Trade</h2>

                        <!-- Table code start -->
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">Ongoing Trade</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>S.No</th>
                                  <th>Buyer Name</th>
                                  <th>Seller Name</th>
                                  <th>Amount</th>
                                  <th>Payment Method</th>
                                  <th>Created Date</th>
                                  <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  if(!empty($ongoingTradeInfo))
                                  {
                                       $i = 1;
                                      foreach ($ongoingTradeInfo as $key => $arr) 
                                      {
                                          ?>
                                          <tr>
                                             <td><?php echo $i; ?></td>
                                             <td><?php if(!empty($arr['buyer_name'])){ echo $arr['buyer_name']; } ?></td>
                                             <td><?php if(!empty($arr['seller_name'])){ echo $arr['seller_name']; } ?></td>
                                              <td>
                                                  <?php if(!empty($arr['currency_amount'])){ echo $arr['currency_amount']." ".$arr['country_currency']; } ?>
                                              </td>
                                              <td><?php echo $arr['payment_method']; ?></td>
                                              <td>
                                                <?php echo $arr['create_date']; ?>
                                              </td>
                                              <td>
                                                <a type="button" href="javascript:void(0);" class="preview_this" data-toggle="modal" data-target="#tradePreview<?php echo $arr['id'] ?>" value="<?= base64_encode($arr['id']); ?>" >Preview</a>
                                              </td>
                                          </tr>
                                          <?php
                                          $i++;
                                      }
                                  }
                                  ?>
                              
                                </tbody>
                              </table>
                            </div>
                            <!-- /.box-body -->
                          </div>
                        <!-- Table code close -->

                    </div>
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>

        <?php $this->load->view('admin/footer'); ?>


        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.0 -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.2.0.min.js'; ?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/dist/js/app.min.js'; ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url().'assets/dist/js/demo.js'; ?>"></script>

    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
</body>

</html>