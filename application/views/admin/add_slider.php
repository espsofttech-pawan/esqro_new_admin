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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
            Add Slider
            <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Add Slider</li>
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
                    <h3 class="box-title">Add Slider</h3>
                  </div>
                  <!-- /.box-header -->
                  <form action="" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="page_type" value="<?php echo $pageType; ?>">
                    <div class="box-body">
                    
                      <div class="row">
                        <div class="col-md-12">
                          <div class="from-group">
                            <label class="col-md-2">Slider Image</label>
                            <div class="col-md-10">
                              <input type="file" class="form-control"  name="slider_image">
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="from-group">
                            <label class="col-md-2">Redirect Link</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" name="redirect_url">
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="from-group">
                            <label class="col-md-2">Slider Content Heading 01 English</label>
                            <div class="col-md-10">
                              <input type="text" name="content1" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="from-group">
                            <label class="col-md-2">Slider Content Heading 01 French</label>
                            <div class="col-md-10">
                              <input type="text" name="content1_french" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="from-group">
                            <label class="col-md-2">Slider Content Heading 02 English</label>
                            <div class="col-md-10">
                              <input type="text" name="content2" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="from-group">
                            <label class="col-md-2">Slider Content Heading 02 French</label>
                            <div class="col-md-10">
                              <input type="text" name="content2_french" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="from-group">
                            <label class="col-md-2">Slider Content Heading 03 English</label>
                            <div class="col-md-10">
                              <!-- <textarea name="content" id="page_description"><?= $slider_info['content']; ?></textarea> -->
                              <input type="text" name="content3" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="from-group">
                            <label class="col-md-2">Slider Content Heading 03 French</label>
                            <div class="col-md-10">
                              <input type="text" name="content3_french" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>

                        <div class="from-group">
                          <center>
                          <button type="submit" name="update_slider" class="btn btn-success">Add</button>
                          </center>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
              </section>
                <!-- Table code close -->
              </div>
            </div>
        
        </div>
        

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
        // $('#homepage').addClass('active');
      });
    </script>
</body>

</html>