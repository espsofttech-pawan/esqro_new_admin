<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Square Algeria | Admin</title>
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
            <section class="content-header">
                <h1>
                    Invest In Algeria Slider
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Slider</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <!-- small box -->
                        <!-- <h2>Home Slider</h2> -->

                        <!-- Table code start -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Manage Invest In Algeria Page Slider</h3>
                  <div style="float: right;">
                    <?php $pageType = base64_encode("invest"); ?>
                    <a href="<?php echo base_url("admin/home/add_slider/$pageType") ?>">
                      <button class="btn btn-info">Add</button>
                    </a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Slider Image</th>
                        <th>Redirect Link</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($sliders))
                      {
                      $i = 1;
                      foreach ($sliders as $key => $arr)
                      {
                      ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><img src="<?= base_url('sliders/'.$arr['slider_image']); ?>" style="width: 300px; height: 150px;"></td>
                        <td><a target="__blank" href="<?= $arr['redirect_url']; ?>"><?= $arr['redirect_url']; ?></a></td>
                        <td><a href="<?= base_url('admin/home/updateSlider/'.$arr['id']); ?>" class="btn btn-info">Change</a>
                          <a onclick="return confirm('Are you sure?')" href="<?= base_url('admin/home/deleteSlider/'.$arr['id'].'/'.$pageType); ?>" class="btn btn-info">
                            Delete
                          </a>
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
    <script type="text/javascript">
      $(document).ready(function(){
        $('#sliderNav').addClass('active');
        $('#investinAlg').addClass('active');
      });
    </script>
</body>

</html>