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
        Payment Method
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="active"><a href="#settings" data-toggle="tab"><?php if($payment){ echo "Edit"; }else{ echo "Add"; } ?> Profile</a></li>
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

                <form class="form-horizontal" method="post">
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" required name="name" value="<?php if($payment){ echo $payment['name']; } ?>" class="form-control" placeholder="Name" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <?php if($payment){ ?>
                        <button type="submit" name="btnUpdatePayment" class="btn btn-danger">Update</button>
                      <?php }else{ ?>
                        <button type="submit" name="btnAddPayment" class="btn btn-danger">Add</button>
                      <?php } ?>                      
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
  <?php $this->load->view('admin/footer'); ?>
  <div class="control-sidebar-bg"></div>
</div>
<script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.2.0.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
<script src="<?php echo base_url().'assets/dist/js/app.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/dist/js/demo.js'; ?>"></script>

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script type="text/javascript">
            function copyToClipboard(t){
              var e=$("<input>");
              $("body").append(e),e.val($(t).text()).select(),document.execCommand("copy"),e.remove();
                toastr.options = {
                  "closeButton": true,
                  "progressBar": true,
                  "positionClass": "toast-bottom-center",
                }
              toastr.info('Address copied!');
            }
        </script>  

</body>
</html>
