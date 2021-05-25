    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Settings
      </h1>
    </section>

    <section class="content">

      <div class="row">

        <div class="col-md-4" style="display: none;">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="active"><a href="#settings" data-toggle="tab">Fees Management</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="settings">
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
                <form class="form-horizontal" method="post" action="">

                  <input type="hidden" name="id" value="<?php if(!empty($feeData)){ echo $feeData[0]['id']; } ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Buyer Fees</label>
                    <div class="col-sm-10">
                      <input name="buyer_fees" type="text" value="<?php if(!empty($feeData)){ echo $feeData[0]['buyer']; } ?>" class="form-control" required="" placeholder="Buyer Fees">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Seller Fees</label>
                    <div class="col-sm-10">
                      <input type="text" name="seller_fees" value="<?php if(!empty($feeData)){ echo $feeData[0]['seller']; } ?>" class="form-control" required="" placeholder="Seller Fees">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Platform Fees</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php if(!empty($feeData)){ echo $feeData[0]['platform_fees']; } ?>" name="platform_fees" class="form-control" required="" placeholder="Platform Fees">
                    </div>
                  </div>                  

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="feesBtn" class="btn btn-primary">Update</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="active"><a >Bank Details</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="settings">

                <?php
                if(!empty($this->session->flashdata('bank_success')))
                {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('bank_success'); ?>
                    </div>
                    <?php
                }
                ?>
                
                <?php
                if(!empty($this->session->flashdata('bank_error')))
                {
                    ?>
                    <div class="alert alert-error alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('bank_error'); ?>
                    </div>
                    <?php
                }
                ?>
                <form class="form-horizontal" method="post" action="">

                  <input type="hidden" name="id" value="<?php if(!empty($feeData)){ echo $feeData[0]['id']; } ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Account Holder Name</label>
                    <div class="col-sm-10">
                      <input name="account_holder_name" type="text" value="<?php if(!empty($feeData)){ echo $feeData[0]['account_holder_name']; } ?>" class="form-control" required="" placeholder="Account Holder Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Account Number</label>
                    <div class="col-sm-10">
                      <input type="number" name="account_number" value="<?php if(!empty($feeData)){ echo $feeData[0]['account_number']; } ?>" class="form-control" required="" placeholder="Account Number">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">BSC</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php if(!empty($feeData)){ echo $feeData[0]['bsc']; } ?>" name="bsc" class="form-control" required="" placeholder="BSC">
                    </div>
                  </div>                  

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="accountBtn" class="btn btn-primary">Update</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="active"><a>Wallet Details</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="settings">

                <?php
                if(!empty($this->session->flashdata('wallet_success')))
                {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('wallet_success'); ?>
                    </div>
                    <?php
                }
                ?>
                
                <?php
                if(!empty($this->session->flashdata('wallet_error')))
                {
                    ?>
                    <div class="alert alert-error alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('wallet_error'); ?>
                    </div>
                    <?php
                }
                ?>
                <form class="form-horizontal" method="post" action="">

                  <input type="hidden" name="id" value="<?php if(!empty($feeData)){ echo $feeData[0]['id']; } ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Wallet Address</label>
                    <div class="col-sm-10">
                      <input name="wallet_address" type="text" value="<?php if(!empty($feeData)){ echo $feeData[0]['wallet_address']; } ?>" class="form-control" required="" placeholder="Wallet Address">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="walletBtn" class="btn btn-primary">Update</button>
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