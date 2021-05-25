<style type="text/css">
  h2{
    margin-left: 87px;
  }
  .showkey{
    text-align: left;
  }
</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Wallet Management
      </h1>
    </section>
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
    <section class="content">
      <?php if($wallet_management){
        foreach ($wallet_management as $key => $value) {  ?>
        <div class="box box-default">
          <div class="box-body">
            <div class="row">
              <?php
                if($value['coin_name'] == 'BTC'){
                  echo "<h2>Bitcoin Wallet</h2>";
                  $link = "#";
                }else if($value['coin_name'] == 'ETH'){
                  $link = base_url('admin/home/admin_eth_deposit'); 
                  echo "<h2>Ethereum Wallet</h2>";
                }else if($value['coin_name'] == 'BCH'){
                  $link = "#"; 
                  echo "<h2>Bitcoin Cash Wallet</h2>";
                }else{
                  $link = "#";
                  echo "<h2>Litcoin Wallet</h2>";
                }
              ?>
              
              <div class="col-md-12" align="center">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Public</label>
                    <div class="col-sm-7 showkey">
                        <?php echo $value['public']; ?>
                    </div>
                  </div>
              </div>

              <div class="col-md-12" align="center">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Private</label>
                    <div class="col-sm-7 showkey">
                        <?php echo $value['private']; ?>
                    </div>
                  </div>
              </div>

              <div class="col-md-12" align="center">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Balance</label>
                    <div class="col-sm-7 showkey">
                        <?php echo $value['balance']; ?>
                    </div>
                  </div>
              </div>

              <div class="col-md-12" align="center">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Send Crypto</label>
                    <div class="col-sm-7 showkey">
                        <button class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $value['id']; ?>" style="background: #eb4853;">Send</button>

                        <a href="<?php echo $link; ?>">
                          <button class="btn btn-success" style="background: #eb4853;">Transactions List</button>
                        </a>
                    </div>
                  </div>
              </div>              

            </div>
          </div>
        </div>

      <div class="modal fade" id="myModal<?php echo $value['id']; ?>" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Send Crypto</h4>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <input type="hidden" name="from_public" value="<?php echo $value['public']; ?>">
                <input type="hidden" name="from_private" value="<?php echo $value['private']; ?>">
                <input type="hidden" name="coin_name" value="<?php echo $value['coin_name']; ?>">
                <div class="row">
                  <div class="col-md-3">
                    <label>Wallet Address</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" placeholder="Enter wallet address" name="to_public" class="form-control" required="">
                  </div>                  
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label>Amount</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" placeholder="Enter Amount" name="amount" class="form-control" required="">
                  </div>                  
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <label>Password</label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" placeholder="Enter Password" name="password" class="form-control" required="">
                  </div>                  
                </div>

                <br>
                <div class="row">
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-9">
                    <input type="submit" name="submitBtn" class="btn btn-success">
                  </div>                  
                </div>                                

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <?php } } ?>

    </section>
    <!-- /.content -->
</div>