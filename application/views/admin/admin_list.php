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
              <h3 class="box-title">Admin</h3>
<!--                <a href="<?php echo base_url("admin/home/add_admin") ?>">
                <button style="float: right;" class="btn btn-info">Add</button>
            </a> -->
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Name</th>
                  <th>Contact Number</th>
                  <th>Type</th>
                  <!-- <th>Create Date</th> -->
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($admin_list))
                    {   $i = 1;
                        foreach ($admin_list as $key => $arr) 
                        {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $arr['first_name']." ".$arr['last_name']; ?></td>
                                <td><?php echo $arr['email']; ?></td>
                                <td><?php echo $arr['user_name']; ?></td>
                                <td><?php echo $arr['contact_no']; ?></td>
                                <td><?php if($arr['user_role'] == 1){
                                  echo "Super Admin";
                                }elseif($arr['user_role'] == 3){
                                  echo "Dispute Admin";
                                }elseif($arr['user_role'] == 4){
                                  echo "Contact Admin";
                                }elseif($arr['user_role'] == 5){
                                  echo "Identity Verification Admin";
                                } 
                                ?></td>
                                <!-- <td><?php echo (!empty($arr['created_date']) ? date('Y-m-d H:i:s',strtotime($arr['created_date'])) : 'N/A'); ?></td> -->
                                <td>
                                    <a href="<?php echo site_url().'admin/home/user_profile/'.base64_encode($arr['id']); ?>">Edit</a> 
                                    <!-- <a onclick="return confirm('Are you sure?')" href="<?php echo site_url().'admin/home/delete_profile_admin/'.base64_encode($arr['id']); ?>">Delete</a> -->
                                </td>
                            </tr>
                            <?php
                       $i++; }
                    }
                    ?>
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
