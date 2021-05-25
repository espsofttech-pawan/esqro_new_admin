<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Localbitcoin | User Management</title>
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

  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('admin/side_bar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>-->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Transaction History</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
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
              <?php //echo "<pre>"; print_r($txn_hash_info); ?>


               <h1 class="head_theme">
                  <?php echo $user_info['user_name']; ?>
               </h1>

                  <div data-ng-if="address.addrStr" class="ng-scope">
                   <div class="well well-sm ellipsis">
                     <strong translate=""><span class="ng-scope">Address</span></strong> 
                     <span class="text-muted ng-binding"><?php echo $addrTxn->address; ?></span>
                     
                   </div>
                   <h2 translate=""><span class="ng-scope">Summary </span><small class="ng-scope">confirmed</small></h2>
                   <div class="row" data-ng-hide="!address.addrStr">
                     <div class="col-md-10">
                       <table class="table">
                         <tbody>
                              <tr>
                                <td><strong translate=""><span class="ng-scope">Total Received</span></strong></td>
                                <td class="ellipsis text-right ng-binding"><?php echo $addrTxn->total_received/100000000; ?></td>
                              </tr>
                              <tr>
                                <td><strong translate=""><span class="ng-scope">Total Send</span></strong></td>
                                <td class="ellipsis text-right ng-binding"><?php echo $addrTxn->total_sent/100000000; ?></td>
                              </tr>
                              <tr>
                                <td><strong translate=""><span class="ng-scope">Final Balance</span></strong></td>
                                <td class="ellipsis text-right ng-binding"><?php echo $addrTxn->final_balance/100000000; ?></td>
                              </tr>
                              <tr>
                                <td><strong translate=""><span class="ng-scope">No. Transactions</span></strong></td>
                                <td class="ellipsis text-right ng-binding"><?php echo $addrTxn->final_n_tx; ?></td>
                              </tr>
                         </tbody>
                       </table>
                     </div>
                     <div class="col-md-2 text-center">
                      <!--<img alt="qr code" src="<php echo base_url().'assets/frontend/assets/qr_code.png'; ?>" height="160" width="160">-->
                      <img alt="qr code" src="https://chart.googleapis.com/chart?chs=160x160&amp;cht=qr&amp;chl=<?php echo $addrTxn->address; ?>" width="160" height="160">
                      
                     </div>
                   </div>

     </div>


               <?php //echo "<pre>"; print_r($txn_hash_info); ?>
              <table id="example2" class="table table-bordered table-striped">
                <tr>
                  <th>S.No</th>
                  <th>Address</th>
                  <th>BTC Amount</th>
                  <th>Transaction Type</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($txn_hash_info))
                    {
                        $i = 1;
                        foreach ($txn_hash_info as $key => $arr) 
                        {
                            foreach ($arr->outputs as $key1 => $arr1) 
                            {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo implode(',', $arr1->addresses); ?></td>
                                    <td><?php echo $arr1->value/100000000; ?></td>
                                    <td>Receive</td>
                                </tr>
                                <?php
                                $i++;
                            }
                            
                            foreach ($arr->inputs as $key1 => $arr1) 
                            {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo implode(',', $arr1->addresses); ?></td>
                                    <td><?php echo $arr1->output_value/100000000; ?></td>
                                    <td>Send</td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                    }
                    ?>
                    <!--<tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td>Win 95+</td>
                      <td> 4</td>
                      <td>X</td>
                    </tr>-->
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('admin/footer'); ?>
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
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
<!-- page script -->
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
