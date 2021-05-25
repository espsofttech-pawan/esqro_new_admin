<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>"> 
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Completed Sell Trades
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Completed Sell Trades</h3>
            </div>
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
                <th>Buyername</th>
                <th>Seller Name</th>
                <th>Buyer Confrm</th>
                <th>Seller Confrm</th>
                <th>Qoin</th>
                <th>AUD Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           <?php $i=1; foreach ($openTradeInfo as $key => $value) { 
            ?>
            <tr>
              <td><?php echo $i ?></td>
              <td>
                <a target="_blank" href="<?php echo base_url('home/user_profile/'.base64_encode($value['buyer_id'])) ?>">
                  <?php echo $value['buyer_name'] ?>
                </a>
              </td>
              <td>
                <a target="_blank" href="<?php echo base_url('home/user_profile/'.base64_encode($value['seller_id'])) ?>">
                  <?php echo $value['seller_name'] ?>
                </a>
              </td>
              <td><?php if($value['buyer_confirm'] == 1){ echo "Yes"; }else{ echo "No"; } ?>
              <td><?php if($value['seller_confirm'] == 1){ echo "Yes"; }else{ echo "No"; } ?>
              <td><?php echo $value['token_amount'] ?> Qoin</td>
              </td>
              <td><?php echo $value['currency_amount'] ?> AUD</td>
              <td>
                <a href="<?php echo base_url('trade/viewTrade/'.$value['id']) ?>">View</a>
              </td>
            </tr>
            <?php $i++; } ?>
        </tbody>
    </table>
            </div>
          </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.2.0.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>

  <script>
    $(function () {
      $("#example1").DataTable();
    });
  </script> 