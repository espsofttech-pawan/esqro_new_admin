<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LocalCoinTrade</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'; ?>">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/header'); ?>
        <?php $this->load->view('admin/side_bar'); ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <h2>Token/Coin List</h2>
                        <div class="box">
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
                              <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Token Symbol</th>
                                       <th>Token Supplier</th>
                                       <th>Description</th>
                                       <th>Date & Time</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 $j = 1;
                                 if(!empty($coin_listing))
                                 {
                                    foreach ($coin_listing as $key => $arr)
                                    {
                                       ?>
                                       <tr>
                                        <td><?php echo $j; ?></td>
                                          <td><?php echo $arr['name']; ?></td>
                                          <td><?php echo $arr['email']; ?></td>
                                          <td><?php echo $arr['token_symbol']; ?></td>
                                          <td><?php echo $arr['token_supplier']; ?></td>
                                          <td><?php echo $arr['description']; ?></td>
                                          <td><?php echo date('d M Y H:i:s', strtotime($arr['created_date'])); ?></td>
                                       </tr>
                                       <?php
                                    }
                                 }
                                 ?>
                                 </tbody>
                              </table>
                            </div>
                          </div>
                    </div>
                </div>
            </section>
        </div>
        
        <?php $this->load->view('admin/footer'); ?>
        <div class="control-sidebar-bg"></div>
    </div>
    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.2.0.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/dist/js/app.min.js'; ?>"></script>
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