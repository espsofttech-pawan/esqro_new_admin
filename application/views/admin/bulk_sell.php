<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LocalCoinTrade</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'; ?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'; ?>">

      <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'; ?>">

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php $this->load->view('admin/header'); ?>

        <?php $this->load->view('admin/side_bar'); ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Bulk Sell
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12 col-xs-12">


                        <!-- Table code start -->
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Bulk Sell</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <?php
                    if(!empty($this->session->flashdata('success')))
                    {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <?php
                    }
                    ?>
                    
                    <?php
                    if(!empty($this->session->flashdata('error')))
                    {
                        ?>
                        <div class="alert alert-error alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php
                    }
                    ?>
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                             <th>#</th>
                             <th><?php echo __webtxt('Coin Type'); ?></th>
                             <th><?php echo __webtxt('Amount'); ?></th>
                             <th><?php echo __webtxt('From Address'); ?></th>
                             <th><?php echo __webtxt('To Address'); ?></th>
                             <th><?php echo __webtxt('Status'); ?></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $j = 1; 
                           foreach($bulkSell as $s_array){ 
                            if($s_array['coin_type'] == "BTC"){
                              $url = "https://live.blockcypher.com/btc/tx/";
                            }else{
                              $url = "https://etherscan.io/tx/";
                            }
                            ?>
                              <tr>
                                <td><?php echo $j;?></td>
                                <td><?php echo $s_array['coin_type']; ?></td>
                                <td><?php echo $s_array['amount']; ?></td>
                                <td><?php echo $s_array['from_address']; ?></td>
                                <td><?php echo $s_array['to_address']; ?></td>
                                <td><a target="_blank" href="<?php echo $url.$s_array['transaction_hash'] ?>"> <button class="btn btn-success">Check</button> </a></td>
                              </tr>
                           <?php $j++; } ?>
                        </tbody>
                      </table>
                    </div>
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
    <script type="text/javascript">
      $('#bulk_sell').addClass('active');
    </script>

</body>

</html>