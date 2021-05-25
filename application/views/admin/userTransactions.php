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
        Users Transactions
      </h1>
    </section>

    <section class="content">
      <div class="row">        
        <div class="col-md-12">
          <h2>Buy Trades</h2>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#buybtc" data-toggle="tab">Open Trade</a></li>
              <li><a href="#buyeth" data-toggle="tab">Ongoing Trade</a></li>
              <li><a href="#buyltc" data-toggle="tab">Completed Trade</a></li>
              <li><a href="#buybch" data-toggle="tab">Cancelled Trade</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="buybtc">
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Buyer Name</th>
                      <th>Seller Name</th>
                      <th>Amount</th>
                      <th>Payment Method</th>
                      <th>Created Date</th>
                      <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($openTradeInfo))
                      {
                           $i = 1;
                          foreach ($openTradeInfo as $key => $arr) 
                          {
                              ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php if(!empty($arr['buyer_name'])){ echo $arr['buyer_name']; } ?></td>
                                 <td><?php if(!empty($arr['seller_name'])){ echo $arr['seller_name']; } ?></td>
                                  <td>
                                      <?php if(!empty($arr['currency_amount'])){ echo $arr['currency_amount']." ".$arr['country_currency']; } ?>
                                  </td>
                                  <td><?php echo $arr['payment_method']; ?></td>
                                  <td>
                                    <?php echo $arr['create_date']; ?>
                                  </td>
                                  <!-- <td>
                                    <a type="button" href="javascript:void(0);" class="preview_this" data-toggle="modal" data-target="#tradePreview<?php echo $arr['id'] ?>" value="<?= base64_encode($arr['id']); ?>" >Preview</a>
                                  </td> -->
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

              <div class="tab-pane" id="buyeth">
                <div class="box-body table-responsive">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Buyer Name</th>
                      <th>Seller Name</th>
                      <th>Amount</th>
                      <th>Payment Method</th>
                      <th>Created Date</th>
                      <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($ongoingTradeInfo))
                      {
                           $i = 1;
                          foreach ($ongoingTradeInfo as $key => $arr) 
                          {
                              ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php if(!empty($arr['buyer_name'])){ echo $arr['buyer_name']; } ?></td>
                                 <td><?php if(!empty($arr['seller_name'])){ echo $arr['seller_name']; } ?></td>
                                  <td>
                                      <?php if(!empty($arr['currency_amount'])){ echo $arr['currency_amount']." ".$arr['country_currency']; } ?>
                                  </td>
                                  <td><?php echo $arr['payment_method']; ?></td>
                                  <td>
                                    <?php echo $arr['create_date']; ?>
                                  </td>
                                 <!--  <td>
                                    <a type="button" href="javascript:void(0);" class="preview_this" data-toggle="modal" data-target="#tradePreview<?php echo $arr['id'] ?>" value="<?= base64_encode($arr['id']); ?>" >Preview</a>
                                  </td> -->
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

              <div class="tab-pane" id="buyltc">
                <div class="box-body table-responsive">
                  <table id="example3" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Buyer Name</th>
                      <th>Seller Name</th>
                      <th>Amount</th>
                      <th>Payment Method</th>
                      <th>Created Date</th>
                      <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($completedTradeInfo))
                      {
                           $i = 1;
                          foreach ($completedTradeInfo as $key => $arr) 
                          {
                              ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php if(!empty($arr['buyer_name'])){ echo $arr['buyer_name']; } ?></td>
                                 <td><?php if(!empty($arr['seller_name'])){ echo $arr['seller_name']; } ?></td>
                                  <td>
                                      <?php if(!empty($arr['currency_amount'])){ echo $arr['currency_amount']." ".$arr['country_currency']; } ?>
                                  </td>
                                  <td><?php echo $arr['payment_method']; ?></td>
                                  <td>
                                    <?php echo $arr['create_date']; ?>
                                  </td>
                                  <!-- <td>
                                    <a type="button" href="javascript:void(0);" class="preview_this" data-toggle="modal" data-target="#tradePreview<?php echo $arr['id'] ?>" value="<?= base64_encode($arr['id']); ?>" >Preview</a>
                                  </td> -->
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

              <div class="tab-pane" id="buybch">
                <div class="box-body table-responsive">
                  <table id="example4" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Buyer Name</th>
                      <th>Seller Name</th>
                      <th>Amount</th>
                      <th>Payment Method</th>
                      <th>Created Date</th>
                      <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($cancelledTradeInfo))
                      {
                           $i = 1;
                          foreach ($cancelledTradeInfo as $key => $arr) 
                          {
                              ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php if(!empty($arr['buyer_name'])){ echo $arr['buyer_name']; } ?></td>
                                 <td><?php if(!empty($arr['seller_name'])){ echo $arr['seller_name']; } ?></td>
                                  <td>
                                      <?php if(!empty($arr['currency_amount'])){ echo $arr['currency_amount']." ".$arr['country_currency']; } ?>
                                  </td>
                                  <td><?php echo $arr['payment_method']; ?></td>
                                  <td>
                                    <?php echo $arr['create_date']; ?>
                                  </td>
                                  <!-- <td>
                                    <a type="button" href="javascript:void(0);" class="preview_this" data-toggle="modal" data-target="#tradePreview<?php echo $arr['id'] ?>" value="<?= base64_encode($arr['id']); ?>" >Preview</a>
                                  </td> -->
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
        </div>
      </div>

      <div class="row">        
        <div class="col-md-12">
          <h2>Sell Trades</h2>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#sellbtc" data-toggle="tab">Open Trade</a></li>
              <li><a href="#selleth" data-toggle="tab">Ongoing Trade</a></li>
              <li><a href="#sellltc" data-toggle="tab">Completed Trade</a></li>
              <li><a href="#sellbch" data-toggle="tab">Cancelled Trade</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="sellbtc">
                <div class="box-body table-responsive">
                  <table id="example5" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Buyer Name</th>
                      <th>Seller Name</th>
                      <th>Amount</th>
                      <th>Payment Method</th>
                      <th>Created Date</th>
                      <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($sellopenTradeInfo))
                      {
                           $i = 1;
                          foreach ($sellopenTradeInfo as $key => $arr) 
                          {
                              ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php if(!empty($arr['buyer_name'])){ echo $arr['buyer_name']; } ?></td>
                                 <td><?php if(!empty($arr['seller_name'])){ echo $arr['seller_name']; } ?></td>
                                  <td>
                                      <?php if(!empty($arr['currency_amount'])){ echo $arr['currency_amount']." ".$arr['country_currency']; } ?>
                                  </td>
                                  <td><?php echo $arr['payment_method']; ?></td>
                                  <td>
                                    <?php echo $arr['create_date']; ?>
                                  </td>
                                  <!-- <td>
                                    <a type="button" href="javascript:void(0);" class="preview_this" data-toggle="modal" data-target="#tradePreview<?php echo $arr['id'] ?>" value="<?= base64_encode($arr['id']); ?>" >Preview</a> 
                                  </td> -->
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

              <div class="tab-pane" id="selleth">
                <div class="box-body table-responsive">
                  <table id="example6" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Buyer Name</th>
                      <th>Seller Name</th>
                      <th>Amount</th>
                      <th>Payment Method</th>
                      <th>Created Date</th>
                      <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($sellongoingTradeInfo))
                      {
                           $i = 1;
                          foreach ($sellongoingTradeInfo as $key => $arr) 
                          {
                              ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php if(!empty($arr['buyer_name'])){ echo $arr['buyer_name']; } ?></td>
                                 <td><?php if(!empty($arr['seller_name'])){ echo $arr['seller_name']; } ?></td>
                                  <td>
                                      <?php if(!empty($arr['currency_amount'])){ echo $arr['currency_amount']." ".$arr['country_currency']; } ?>
                                  </td>
                                  <td><?php echo $arr['payment_method']; ?></td>
                                  <td>
                                    <?php echo $arr['create_date']; ?>
                                  </td>
                                  <!-- <td>
                                    <a type="button" href="javascript:void(0);" class="preview_this" data-toggle="modal" data-target="#tradePreview<?php echo $arr['id'] ?>" value="<?= base64_encode($arr['id']); ?>" >Preview</a>
                                  </td> -->
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

              <div class="tab-pane" id="sellltc">
                <div class="box-body table-responsive">
                  <table id="example7" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Buyer Name</th>
                      <th>Seller Name</th>
                      <th>Amount</th>
                      <th>Payment Method</th>
                      <th>Created Date</th>
                      <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($sellcompletedTradeInfo))
                      {
                           $i = 1;
                          foreach ($sellcompletedTradeInfo as $key => $arr) 
                          {
                              ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php if(!empty($arr['buyer_name'])){ echo $arr['buyer_name']; } ?></td>
                                 <td><?php if(!empty($arr['seller_name'])){ echo $arr['seller_name']; } ?></td>
                                  <td>
                                      <?php if(!empty($arr['currency_amount'])){ echo $arr['currency_amount']." ".$arr['country_currency']; } ?>
                                  </td>
                                  <td><?php echo $arr['payment_method']; ?></td>
                                  <td>
                                    <?php echo $arr['create_date']; ?>
                                  </td>
                                  <!-- <td>
                                    <a type="button" href="javascript:void(0);" class="preview_this" data-toggle="modal" data-target="#tradePreview<?php echo $arr['id'] ?>" value="<?= base64_encode($arr['id']); ?>" >Preview</a>
                                  </td> -->
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

              <div class="tab-pane" id="sellbch">
                <div class="box-body table-responsive">
                  <table id="example8" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Buyer Name</th>
                      <th>Seller Name</th>
                      <th>Amount</th>
                      <th>Payment Method</th>
                      <th>Created Date</th>
                      <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($sellcancelledTradeInfo))
                      {
                           $i = 1;
                          foreach ($sellcancelledTradeInfo as $key => $arr) 
                          {
                              ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php if(!empty($arr['buyer_name'])){ echo $arr['buyer_name']; } ?></td>
                                 <td><?php if(!empty($arr['seller_name'])){ echo $arr['seller_name']; } ?></td>
                                  <td>
                                      <?php if(!empty($arr['currency_amount'])){ echo $arr['currency_amount']." ".$arr['country_currency']; } ?>
                                  </td>
                                  <td><?php echo $arr['payment_method']; ?></td>
                                  <td>
                                    <?php echo $arr['create_date']; ?>
                                  </td>
                                  <!-- <td>
                                    <a type="button" href="javascript:void(0);" class="preview_this" data-toggle="modal" data-target="#tradePreview<?php echo $arr['id'] ?>" value="<?= base64_encode($arr['id']); ?>" >Preview</a>
                                  </td> -->
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
        </div>
      </div>

      <div class="row">        
        <div class="col-md-12">
          <h2>Coin Transactions</h2>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#eth_trx" data-toggle="tab">ETH</a></li>
              <li><a href="#btc_trx" data-toggle="tab">BTC</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="eth_trx">
                <div class="box-body table-responsive">
                  <table id="example9" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Transaction hash</th>
                      <th>Value</th>
                      <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($transactionHistory))
                      {
                           $i = 1;
                           $today = date('Y-m-d');
                          foreach ($transactionHistory as $key => $ethtrxList) 
                          {
                            $trx_date = date('Y-m-d',@$ethtrxList->timeStamp);
                            if($today == $trx_date)
                            {
                            if(strtolower($myAddress) == strtolower($ethtrxList->to))
                            {
                              ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $ethtrxList->hash; ?></td>
                                  <td><?php echo $ethtrxList->value/10000000000000000;  ?>
                                  </td>
                                  <td><?php echo date('d M, Y', $ethtrxList->timeStamp); ?></td>
                              </tr>
                              <?php
                              $i++;
                            }
                          }
                      }
                    }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="tab-pane" id="btc_trx">
                <div class="box-body table-responsive">
                  <table id="example10" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Transaction hash</th>
                      <th>Value</th>
                      <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                         <?php
                      if(!empty($transactionHistoryBtc))
                      {
                           $i = 1;
                           $today1 = date('Y-m-d');
                          foreach ($transactionHistoryBtc as $key => $btctrxList) 
                          {
                            $trx_date1 = date('Y-m-d',$btctrxList->timeStamp);
                            if($today1 == $trx_date1)
                            {
                            if(strtolower($mybtcAddress) == strtolower($btctrxList->to))
                            {
                              ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $btctrxList->hash; ?></td>
                                  <td><?php echo $btctrxList->value/100000000;  ?>
                                  </td>
                                  <td><?php echo date('d M, Y', $btctrxList->timeStamp); ?></td>
                              </tr>
                              <?php
                              $i++;
                            }
                          }
                      }
                    }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

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
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url().'assets/dist/js/app.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/dist/js/demo.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script> 
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable();
    $("#example3").DataTable();
    $("#example4").DataTable();
    $("#example5").DataTable();
    $("#example6").DataTable();
    $("#example7").DataTable();
    $("#example8").DataTable();    
    $("#example9").DataTable();    
    $("#example10").DataTable();    
  });
</script>
</body>
</html>
