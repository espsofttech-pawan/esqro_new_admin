<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Localbitcoin | Dashboard</title>
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <!-- small box -->
                        <h2>Send Bitcoin</h2>

                        <!-- Table code start -->
                        <div class="box">
                            <!--<div class="box-header">
                              <h3 class="box-title">Data Table With Full Features</h3>
                            </div>-->
                            <!-- /.box-header -->
                            <div class="box-body">

                              <?php
                              if(!empty($processNotifications))
                              {
                                 $count = count($processNotifications);
                                 $i = 1;
                                 foreach ($processNotifications as $key => $arr) 
                                 {
                                     ?>
                                     <div class="alert <?php echo ($arr['type'] == 'error' ? 'alert-danger' : 'alert-success'); ?> alert-dismissable">
                                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                       <?php echo $arr['msg']; ?>
                                     </div>
                                     <?php
                                     if($i == $count)
                                     {
                                         $this->common_model->deleteRecords('send_process_notification',array('user_id' => $this->session->userdata("user_id")));
                                     }
                                     $i++;
                                 }
                              }
                              ?>
                                
                              <form method='post' action="<?php echo site_url().'admin/home/send_bitcoin'; ?>">
                                 <div class="form-group">
                                   <label class="col-sm-2 control-label">First Name</label>
                                   <div class="col-sm-10">
                                     <input type="text" required="" class="form-control" placeholder="Receiving bitcoin address" name="btc_address">
                                   </div>
                                 </div>
                                 <br>

                                 <div class="form-group">
                                   <label class="col-sm-2 control-label">Last Name</label>

                                   <div class="col-sm-10">
                                     <input type="text" required="" id="bitcoinAmt" class="form-control" placeholder="0.0000" name="btc_amount">
                                   </div>
                                 </div>
                                 <br>

                                 <div class="form-group">
                                   <div class="col-sm-offset-2 col-sm-10">
                                     <button type="submit" name="btnSubmitBtc" class="btn btn-danger">Submit</button>
                                   </div>
                                 </div>
                              </form>   
                               
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