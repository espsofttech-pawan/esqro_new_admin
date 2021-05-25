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
              <h3 class="box-title">Users</h3>
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
              <div class="row">
                <div class="col-md-6">
                  <div class="box-body box-profile">
                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <b>User ID</b> <a class="pull-right"><?php echo $userInfo['id']; ?></a>
                      </li>
                      <li class="list-group-item">
                        <b>User Name</b> <a class="pull-right"><?php echo $userInfo['user_name']; ?></a>
                      </li>
                      <!--<li class="list-group-item">
                        <b>Friends</b> <a class="pull-right">13,287</a>
                      </li>-->
                    </ul>  
                  </div>
                </div>  
              </div>
              

              <!--<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Received BTC</th>
                  <th>Sent BTC</th>
                  <th>Send Description</th>
                  <th>Deposite Fee BTC</th>
                </tr>
                </thead>
                <tbody>
                    <php

                      if(!empty($transactionInfo))
                      {
                        foreach ($transactionInfo as $key => $arr) 
                        {
                            ?>
                            <tr>
                               <td><php echo (!empty($arr['create_date']) ? date('d-m-Y H:i:s a',strtotime($arr['create_date'])) : 'N/A'); ?></td>
                               <td>0</td>
                               <td><php echo (!empty($arr['total']) ? $arr['total'] : '0'); ?></td>
                               <td></td>
                               <td><php echo (!empty($arr['fees']) ? $arr['fees'] : '0'); ?></td>
                            </tr>
                            <php     
                        }
                      }
                      else
                      {
                          ?>
                          <tr>
                             <td></td>
                             <td>0</td>
                             <td>0</td>
                             <td></td>
                             <td>0</td>
                          </tr>
                          <php
                      }
                      ?>
                </tbody>
              </table>-->


              <table id="example1" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>Receiver Address</th>
                   <th>Send Amount</th>
                   <th>Received Amount</th>
                   <th>Date</th>
                 </tr>
                 </thead>
                 <tbody>
                     <?php
                   if(!empty($transactionInfo))
                   {
                       foreach ($transactionInfo as $key => $arr) 
                       {
                           ?>
                           <tr>
                              <td><?php echo $arr['receiver_btc_address']; ?></td>
                              <td><?php echo @$arr['currency_amt'].' '.@$arr['currency']; ?></td>
                              <td>0</td>
                              <td><?php echo (!empty($arr['update_date']) ? date('d-m-Y H:i:s a',strtotime($arr['update_date'])) : 'N/A'); ?></td>
                           </tr>
                           <?php
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
