<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Edit Fees
      </h1>
    </section>
    <section class="content">
      <div class="box box-default">
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12" align="center">
                <form class="form-horizontal" method="post" action="">        

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Coin Name</label>
                        <div class="col-sm-7">
                          <input type="text" required name="coin_name" value="<?php echo (!empty($feeData) && isset($feeData['coin_name']) ? $feeData['coin_name'] : "") ?>" class="form-control" placeholder="Enter coin name" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Buyer Fees</label>
                        <div class="col-sm-7">
                          <input type="text" required name="buyer" value="<?php echo (!empty($feeData) && isset($feeData['buyer']) ? $feeData['buyer'] : "") ?>" class="form-control" placeholder="Enter buyer fees">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Seller Fees</label>
                        <div class="col-sm-7">
                          <input type="text" required name="seller" value="<?php echo (!empty($feeData) && isset($feeData['seller']) ? $feeData['seller'] : "") ?>" class="form-control" placeholder="Enter seller fees">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Deposit Fees</label>
                        <div class="col-sm-7">
                          <input type="text" required name="deposit" value="<?php echo (!empty($feeData) && isset($feeData['deposit']) ? $feeData['deposit'] : "") ?>" class="form-control" placeholder="Enter Deposit fees">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="hidden" name="id" value="<?php echo (isset($feeData['id']) && !empty($feeData['id']) ? $feeData['id'] : "");?>">
                          <input  type="submit" name="btnUpdateUser" class="btn btn-primary pull-right" value="Submit">
                        </div>
                      </div>

                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>