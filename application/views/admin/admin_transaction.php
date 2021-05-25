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

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        
                        <!-- Table code start -->
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">Admin Transaction</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>User ID</th>
                                  <th>User Name</th>
                                  <th>Receiver Address</th>
                                  <th>Send Amount</th>
                                  <th>Status</th>
                                  <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                  if(!empty($admin_txns))
                                  {
                                      foreach ($admin_txns as $key => $arr) 
                                      {
                                          ?>
                                          <tr>
                                             <td><?php echo $arr['id']; ?></td>
                                             <td><?php echo $arr['user_name']; ?></td>
                                             <td><?php echo $arr['receiver_btc_address']; ?></td>
                                             <td><?php echo @$arr['currency_amt'].' '.@$arr['currency']; ?></td>
                                             <td>Sent</td>
                                             <td><?php echo (!empty($arr['update_date']) ? date('d-m-Y H:i:s a',strtotime($arr['update_date'])) : 'N/A'); ?></td>
                                          </tr>
                                          <?php
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

                <div class="row">
                   <div class="col-md-12">
                   
                      <div class="well" id="cactus-wrapper">

                         <h4 class="head_theme">
                            <?php echo "Transaction"; ?>
                         </h4>
                         <?php //echo "<pre>"; //print_r($transactionInfo); ?>
                         <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                           <thead>
                               <tr>
                                   <!--<th>Address</th>-->  
                                   <th><?php echo "Date"; ?></th>
                                   <th><?php echo "Received BTC"; ?></th>
                                   <th><?php echo "Sent BTC"; ?></th>
                                   <th><?php echo "Description"; ?></th>
                                   <!--<th>Fee BTC</th>-->
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
                                         <!--<td></td>-->  
                                         <td><?php echo (!empty($arr['create_date']) ? date('d-m-Y H:i:s a',strtotime($arr['create_date'])) : 'N/A'); ?></td>
                                          <?php
                                          if($this->session->userdata("user_id") == $arr['user_id'])
                                          {
                                              ?>
                                              <td>0</td>
                                              <td><?php echo (!empty($arr['currency_amt']) ? $arr['currency_amt'] : '0'); ?></td>
                                              <?php
                                          }
                                          else
                                          {
                                              ?>
                                              <td><?php echo (!empty($arr['currency_amt']) ? $arr['currency_amt'] : '0'); ?></td>
                                              <td>0</td>
                                              <?php
                                          }
                                          ?>                                     
                                         
                                         <td></td>
                                         <!--<td><php echo (!empty($arr['fees']) ? $arr['fees'] : '0'); ?></td>-->
                                      </tr>
                                      <?php     
                                  }

                                }
                                else
                                {
                                     if(!empty($txn_hash_info))
                                     {
                                       foreach ($txn_hash_info as $key1 => $arr1) 
                                       {
                                          foreach ($arr1->outputs as $key2 => $arr2) {
                                              if($arr2->addresses[0] != $btc_address_info['coin_address'])
                                              {
                                                 ?>
                                                <tr>
                                                    <td><?php echo (!empty($arr1->received) ? date('d-m-Y H:i:s A',strtotime($arr1->received)) : 'N/A'); ?></td>
                                                    <td>0</td>
                                                    <td><?php echo $arr2->value/100000000; ?></td>
                                                    <td></td>
                                                 </tr>
                                                <?php
                                              }
                                          }
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
                                       <!--<td>0</td>-->
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