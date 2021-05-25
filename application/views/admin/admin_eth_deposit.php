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
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">ETH Transactions</li>
                </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <h2>ETH Transactions</h2>
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">ETH Transactions</h3>
                            </div>
                            <div class="box-body table-responsive">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>S.No</th>
                                  <th>From Address</th>
                                  <th>To Address</th>
                                  <th>Amount</th>
                                  <th>Created Date</th>
                                  <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  if(!empty($allTransactions))
                                  {
                                       $i = 1;
                                      foreach ($allTransactions as $key => $arr) 
                                      {
                                          ?>
                                          <tr>
                                             <td><?php echo $i; ?></td>
                                             <td><?php if(!empty($arr['from_address'])){ echo $arr['from_address']; } ?></td>
                                             <td><?php if(!empty($arr['to_address'])){ echo $arr['to_address']; } ?></td>
                                              <td>
                                                  <?php if(!empty($arr['amount'])){ echo $arr['amount']; } ?>
                                              </td>
                                              <td><?php echo $arr['created_date']; ?></td>
                                              <td>
                                                <a target="_blanck" href="https://rinkeby.etherscan.io/tx/<?php echo $arr['hash']; ?>">
                                                <button class="btn btn-success" style="background: #001548;">Check Status</button></a>
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