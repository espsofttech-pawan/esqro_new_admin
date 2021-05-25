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
                    Dispute Management
                    <small>Dispute Management</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dispute Management</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Dispute Management</h3>
                    </div>
                    <div class="box-body table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>S.No</th>
                            <th>Dispute ID</th>
                            <th>View</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if(!empty($disputeTokenData))
                          {
                          $i = 1;
                          foreach ($disputeTokenData as $key => $arr)
                          {
                            $disputer_id = base64_encode($arr['disputer_id']);
                            $disputer_behalf_id = base64_encode($arr['disputer_behalf_id']);
                          ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                              <?= $arr['token']; ?>
                            </td>
                            <td>
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $arr['token']; ?>">View</button>
                            </td>
                            <td><?php
                              if($arr['trade_status'] == 4){ ?>
                                <button class="btn btn-danger">Cancelled</button>
                              <?php }else if($arr['trade_status'] == 3){ ?>
                                <button class="btn btn-success">Dispute Completed</button>
                              <?php }else{ ?>
                                <button class="btn btn-warning">Pending</button>
                              <?php } ?></td>
                            <td><?= $arr['create_date']; ?></td>
                            <td>
                              <a href="<?php echo base_url().'admin/home/disputingchat?token='.$arr['token'].'&toid='.$disputer_id ?>">
                                <button class="btn btn-success">Dispute Chat</button>
                              </a>
                              <!-- <a href="<?php echo base_url().'admin/home/disputingchat?token='.$arr['token'].'&toid='.$disputer_behalf_id ?>">
                                <button class="btn btn-success">Disputer Behalf Chat</button>
                              </a> -->
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

        <?php
        if(!empty($disputeTokenData))
        {
        foreach ($disputeTokenData as $key => $arr)
        { ?>
        
        <div class="modal fade" id="myModal<?php echo $arr['token']; ?>" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Dispute Details</h4>
              </div>
              <div class="modal-body">
                <?php $getDisputeData = $this->common_model->getDisputeDataForView($arr['token']);
                 ?>
                <table class="table table-bordered">
                  <tr>
                    <th>Dispute ID</th>
                    <td><?php echo $getDisputeData['token'] ?></td>
                  </tr>

                  <tr>
                    <th>Disputer Name(Buyer)</th>
                    <td><?php echo $getDisputeData['disputer_name'] ?></td>
                  </tr>

                  <tr>
                    <th>Disputer Behalf Name(Seller)</th>
                    <td><?php echo $getDisputeData['disputer_behalf_name'] ?></td>
                  </tr>

                  <tr>
                    <th>Amount</th>
                    <td><?php echo $getDisputeData['currency_amount']." ".$getDisputeData['country_currency'] ?></td>
                  </tr>

                  <tr>
                    <th>Crypto Amount</th>
                    <td><?php echo $getDisputeData['btc'] ?></td>
                  </tr>   

                  <tr>
                    <th>Created Date</th>
                    <td><?php echo $getDisputeData['create_date'] ?></td>
                  </tr> 

                  <tr>
                    <th>Updated Date</th>
                    <td><?php echo $getDisputeData['modify_date'] ?></td>
                  </tr>

                  <tr>
                    <th>Status</th>
                      <td>
                        <!-- <?php
                        if($arr['release_hash']){ ?>
                          <button class="btn btn-success">Dispute Completed</button>
                        <?php }else{ ?>
                          <button class="btn btn-warning">Pending</button>
                        <?php } ?> -->
                            <?php
                            if($arr['trade_status'] == 4){ ?>
                              <button class="btn btn-danger">Cancelled</button>
                            <?php }else if($arr['trade_status'] == 3){ ?>
                              <button class="btn btn-success">Dispute Completed</button>
                            <?php }else{ ?>
                              <button class="btn btn-warning">Pending</button>
                            <?php } ?>                        
                      </td>
                  </tr>                                                        
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

      <?php } } ?>

        <?php $this->load->view('admin/footer'); ?>

        <div class="control-sidebar-bg"></div>
    </div>
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