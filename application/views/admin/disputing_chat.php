<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LocalCoinTrade</title>
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
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <!-- small box -->
                        <h2>Disputing Request</h2>

                        <!-- Table code start -->
                        <div class="box">
                            <?php if(isset($success) && !empty($success)){ ?>
                                <div class="alert alert-success"><?php echo $success;?></div>
                            <?php }?>
                            <?php if(isset($error) && !empty($error)){ ?>
                                <div class="alert alert-danger"><?php echo $error;?></div>
                            <?php }?>
                            <?php if($this->session->flashdata('error')){?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php } ?>
                            <?php if($this->session->flashdata('success')){?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                            <?php } ?>
                            <div class="box-body">
                              <?php
                                if($tokenData){
                                  if($tokenData['release_hash']){ ?>
                                      <button class="btn btn-primary pull-right">Dispute Completed</button>
                                  <?php }else{ ?>
                                      <button data-toggle="modal" data-target="#myModal" class="btn btn-primary pull-right">Dispute winner</button> 
                                  <?php }
                                }
                              ?>
                              <form method='post' action="" enctype="multipart/form-data" >
                                <h2>Request by <?php echo (isset($user_data[0]['user_name']) ? $user_data[0]['user_name'] : ""); ?></h2>
                                <br>
                                <input type="hidden" name="toid" value="<?php echo $toid; ?>">
                                 <div class="form-group">
                                   <label class="col-sm-2 control-label">
                                    Message
                                   </label>
                                   <div class="col-sm-10">
                                     <textarea name="message" class="form-control" style="width: 100%" rows="5"></textarea>
                                   </div>
                                 </div>

                                 <div class="form-group">
                                   <label class="col-sm-2 control-label">
                                    Attachment
                                   </label>
                                   <div class="col-sm-10">
                                      <input type="file" name="document">
                                   </div>
                                 </div>
                                
                                 <div class="clearfix"></div>
                                 <div class="form-group">
                                   <div class="col-sm-offset-2 col-sm-10">
                                     <button type="submit" name="reply" class="btn btn-primary pull-right">Reply</button>
                                   </div>
                                 </div>
                              </form>   
                                <div class="col-lg-12 col-xs-12 col-md-12">
                                  <?php if(isset($chat_data) && !empty($chat_data)){
                                        foreach ($chat_data as $chat_data) {
                                          $fromId = $chat_data['from_id'];
                                          $getRole = $this->common_model->getSingleRecordById("users", array('id' => $fromId));
                                          $role = $getRole['user_role'];
                                          if($role == 1 OR $role == 3 ){
                                            $class = "color:red";
                                          }else{
                                            $class = "";
                                          }                                          
                                  ?>  
                                      <div class="well">
                                        <div class="panel-heading">
                                          <h4 class="panel-title pull-left"><span>From : </span> <strong> <?php echo $chat_data['from_user_name']?> </strong>  &nbsp; <span></h4>
                                          <h4 class="panel-title pull-right"><?php echo $chat_data['created_date']?></h4>
                                          <br>
                                        </div>
                                       <div style="height: 100%;<?php echo $class; ?>" class="form-control" style="height: auto;">

                                          <p class=""><?php echo (isset($chat_data['dispute_type']) ? $chat_data['dispute_type'] : "");?></p>
                                          <?php 
                                          if(isset($chat_data['attachment']) && !empty($chat_data['attachment'])){?>
                                            <p><a href="<?php echo base_url()?>uploads/dispute/<?php echo $chat_data['attachment']; ?>" target="_blank"><img src="<?php echo base_url();?>uploads/dispute/<?php echo $chat_data['attachment'];?>"  height="42" width="42"></a></p>
                                          <?php } ?>
                                        </div>                                        
                                      </div>
                                  <?php } } ?>
                                <div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- Table code close -->

                    </div>
                    
                </div>
                <!-- /.row -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Dispute Winner</h4>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo base_url('admin/home/dispute_winner') ?>">
                  <input type="hidden" name="post_trad_id" value="<?php if($tokenData['post_trad_id']){ echo $tokenData['post_trad_id']; } ?>">
                  <input type="hidden" name="toid" value="<?php echo $toid; ?>">
                  <input type="hidden" name="token" value="<?php if($tokenData['token']){ echo $tokenData['token']; } ?>">

                  <select class="form-control" name="winner_type" required="">
                    <option value="">--Select--</option>
                    <option value="1">Buyer</option>
                    <option value="2">Seller</option>
                  </select>
                  <br>
                  <input type="submit" name="disputeWinnerBtn" value="Submit" class="btn btn-success">
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
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