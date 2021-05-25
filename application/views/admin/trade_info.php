  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
  .control-label{
    text-align: left!important;
  }
</style>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Trade Info
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="" data-toggle="tab">View Trade Info</a></li>
              <li>
                  <a href="<?php echo $redirectUrl ?>">
                    <button class="btn btn-primary">Back</button>
                  </a>                  
              </li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="settings">


                <form class="form-horizontal">

                  <?php if(!empty($trade_info['order_number'])){ ?>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Order Number</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                          <span class="formelement"><?php echo $trade_info['order_number']; ?></span>
                        </div>
                      </div>
                  <?php } ?>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Name</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                      <span class="formelement"><?php echo $trade_info['buyer_name']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Name:</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                      <span class="formelement"><?php echo $trade_info['seller_name']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Limit:</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                      <span class="formelement"><?php echo $trade_info['min_transaction_limit']."-".$trade_info['max_transaction_limit']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Qoin Amount:</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                      <span class="formelement"><?php echo $trade_info['token_amount']; ?> Qoin</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">AUD Amount:</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                      <span class="formelement"><?php echo $trade_info['currency_amount']; ?> AUD</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Buyer Confirm:</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                      <span class="formelement"><?php if($trade_info['buyer_confirm'] == 1){ echo "Yes"; }else{ echo "No"; } ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Seller Confirm:</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                      <span class="formelement"><?php if($trade_info['seller_confirm'] == 1){ echo "Yes"; }else{ echo "No"; } ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Currency:</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                      <span class="formelement">AUD</span>
                    </div>
                  </div>

                  <?php if(!empty($trade_info['buyer_wallet'])){ ?>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Order Number</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                          <span class="formelement"><?php echo $trade_info['buyer_wallet']; ?></span>
                        </div>
                      </div>
                  <?php } ?>

                  <?php if(!empty($trade_info['buyer_transaction_id'])){ ?>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Buyer Transaction ID</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                          <span class="formelement"><?php echo $trade_info['buyer_transaction_id']; ?></span>
                        </div>
                      </div>
                  <?php } ?>

                  <?php if(!empty($trade_info['seller_transaction_id'])){ ?>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Seller Transaction ID</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                          <span class="formelement"><?php echo $trade_info['seller_transaction_id']; ?></span>
                        </div>
                      </div>
                  <?php } ?>

                  <?php if(!empty($sellerWallet)){ ?>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Seller Wallet Details</label>
                        <label class="col-sm-1 control-label">:</label>
                        <div class="col-sm-7">
                          <span class="formelement"> Account Holder Name: <?php echo $sellerWallet['account_holder_name']; ?></span><br>

                          <span class="formelement"> Account Number: <?php echo $sellerWallet['account_number']; ?></span> <br>

                          <span class="formelement"> BSC: <?php echo $sellerWallet['bsc']; ?></span>

                        </div>
                      </div>
                  <?php } ?>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Trade Terms:</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                      <span class="formelement"><?php echo $trade_info['terms_of_trade']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Created Date:</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                      <span class="formelement"><?php echo $trade_info['datetime']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Status:</label>
                    <label class="col-sm-1 control-label">:</label>
                    <div class="col-sm-7">
                      <span class="formelement">
                        <?php if($trade_info['status'] == 0){ echo "Pending"; }
                        else if($trade_info['status'] == 1 ){ echo "Ongoing"; }
                        else if($trade_info['status'] == 2 ){ echo "Cancelled"; }
                        else if($trade_info['status'] == 3 ){ echo "Cancelled"; }
                        else if($trade_info['status'] == 4 ){ echo "Confirmed"; }
                       ?>
                         
                       </span>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>