<?php $this->load->view('admin/header'); ?>
<?php $this->load->view('admin/side_bar'); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <h2>Support Request</h2>
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
                    <div class="box-body">

                      <form method='post' action="" enctype="multipart/form-data" >
                        <h2>Request by <?php echo (isset($user_data[0]['user_name']) ? $user_data[0]['user_name'] : ""); ?></h2>
                        <br>
                         <div class="form-group">
                         <div class="form-group">
                           <label class="col-sm-2 control-label">
                            Message
                           </label>
                           <div class="col-sm-10">
                             <textarea required="" name="message" class="form-control" style="width: 100%" rows="5"></textarea>
                           </div>
                         </div>
                         <div class="clearfix"></div>
                        
                         <!-- <div class="form-group" style="margin-top: 5px;">
                           <label class="col-sm-2 control-label">
                            Attachment
                           </label>
                           <div class="col-sm-10">
                             <div>
                              <input type="file" name="attachment">
                            </div>
                           </div>
                         </div> -->
                         <br>
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
                          ?>  
                              <div class="well">
                                <div class="panel-heading">
                                <?php 
                                if($chat_data['is_send_by_admin']){ ?>
                                  <h4 class="panel-title pull-left"><span>From : </span> <strong> 
                                      <?php echo $admin_data['user_name']; ?>
                                    </strong>  &nbsp; <span>To : </span> <strong>
                                      <?php echo $user_data['username'];?>    
                                    </strong></h4>
                                  <?php }else{ ?>
                                      <h4 class="panel-title pull-left"><span>From : </span> <strong> 
                                          <?php echo $user_data['username'];?>     
                                        </strong>  &nbsp; <span>To : </span> <strong>
                                          <?php echo $admin_data['user_name']; ?>
                                        </strong></h4>
                                      <?php } ?>
                                  <h4 class="panel-title pull-right"><?php echo $chat_data['start_date']?></h4>
                                  <br>
                                </div>
                                <div class="form-control" style="height: auto;">
                                  <p class=""><?php echo (isset($chat_data['message']) ? $chat_data['message'] : "");?></p>
                                  <?php if(isset($chat_data['attachment']) && !empty($chat_data['attachment'])){?>
                                    <p><a href="<?php echo base_url()?>uploads/<?php echo $chat_data['attachment']; ?>" target="_blank"><img src="<?php echo base_url();?>uploads/<?php echo $chat_data['attachment'];?>"  height="42" width="42"></a></p>
                                  <?php } ?>
                                </div>
                              </div>
                          <?php } } ?>
                        <div>
                        <div class="clearfix"></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('admin/footer'); ?>        