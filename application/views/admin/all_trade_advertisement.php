<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>"> 
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Trade Advertisement
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
              <h3 class="box-title">All Trade ( Buy & Sell ) Advertisement</h3>
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
                <th>Username</th>
                <th>Trade Type</th>
                <th>Purchase Price</th>
                <th>Limit</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           <?php $i=1; foreach ($all_trade as $key => $value) { 
                if($value['admin_approval'] == 0){
                    $publishType = "Publish";
                    $offerTypeMsg = "Are you sure want to publish this offer?";
                }else{
                    $publishType = "Published";
                    $offerTypeMsg = "Are you sure want to unpublish this offer?";
                }
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td>
                    <a href="<?php echo base_url().'home/user_profile/'.base64_encode($value['user_id']) ?>">
                        <?php echo $value['username']; ?>
                    </a>
                    </td>
                <td><?php if($value['trade_type'] == 1){ echo $trade_type = "Buy"; }else{ echo $trade_type = "Sell"; } ?></td>
                <td><?php echo $value['purchase_price']; ?> AUD</td>
                <td><?php echo $value['min_transaction_limit'].' - '.$value['max_transaction_limit']; ?> AUD</td>
                <td><?php if($value['admin_approval'] == 1){ echo $admin_approval = "Published"; }else{ echo $admin_approval = "Pending"; } ?></td>
                <td>
                  <a href="#" data-toggle="modal" onclick="previewOffers('<?php echo $value['id'] ?>')" data-target="#offerPreview">Preview</a>
                   | 

                  <a href="#" data-toggle="modal" onclick="publishOffers(<?php echo $value['id']; ?>, '<?php echo $offerTypeMsg; ?>' )" data-target="#publishRecord"  ><?php echo $publishType; ?></a>
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

<div class="modal fade" id="publishRecord" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="alert alert-danger" id="deleteErrorDiv" style="display: none;"></div>
        <div class="alert alert-success" id="deleteSuccessDiv" style="display: none;"></div>
        <form action="<?php echo base_url('trade/change_publish_status') ?>" name='publishRecord' id="deleteRecord" method="post">
        <div class="modal-body" style="color: black;">
          <input type="hidden" class="form-control" name="id" id="offerid" required="">
          <span id="offermsg"></span>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" name="block_country" type="submit">Confirm</button>
        </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="offerPreview" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Offer Details</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <table class="table table-bordered">
          <tr>
            <th>Username</th>
            <td><span id="username"></span></td>
          </tr>

          <tr>
            <th>Trade Type</th>
            <td><span id="trade_type"></span></td>
          </tr>

          <tr>
            <th>Purchase Price</th>
            <td><span id="purchase_price"></span> AUD</td>
          </tr>

          <tr>
            <th>Limit</th>
            <td><span id="min_transaction_limit"></span> AUD - <span id="max_transaction_limit"></span> AUD</td>
          </tr>

          <tr>
            <th>Quantity</th>
            <td><span id="coin_quantity"></span> AUD</td>
          </tr>

          <tr>
            <th>Expiration</th>
            <td><span id="offer_expiration"></span></td>
          </tr>

          <tr>
            <th>Terms Of Trade</th>
            <td><span id="terms_of_trade"></span></td>
          </tr>

          <tr>
            <th>Status</th>
            <td><span id="admin_approval"></span></td>
          </tr>

          <tr>
            <th>Created Date</th>
            <td><span id="created_date"></span></td>
          </tr>

        </table>
      </div>
    </div>
</div>

<script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.2.0.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>

  <script>
    $(function () {
      $("#example1").DataTable();
    });
  </script> 

  <script type="text/javascript">
  function publishOffers(id, offerTypeMsg){
    $("#offerid").val(id);
    $("#offermsg").html(offerTypeMsg);
  }
  </script>

  <script type="text/javascript">
  function previewOffers(id){
    $.ajax({
       type: "POST",
       url: "<?php echo base_url('trade/getofferDetails') ?>",
       dataType: "json",
       data: {'id' : id},

       success: function(response)
       {
            $("#username").html(response.username);
            $("#trade_type").html(response.trade_type);
            $("#purchase_price").html(response.purchase_price);
            $("#min_transaction_limit").html(response.min_transaction_limit);
            $("#max_transaction_limit").html(response.max_transaction_limit);
            $("#coin_quantity").html(response.coin_quantity);
            $("#offer_expiration").html(response.offer_expiration);
            $("#terms_of_trade").html(response.terms_of_trade);
            $("#admin_approval").html(response.admin_approval);
            $("#created_date").html(response.created_date);
       }
    });
  }
  </script>  