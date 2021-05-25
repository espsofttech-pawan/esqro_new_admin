<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Social Media Links
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        
        <!-- /.box-header -->
        <div class="box-body">

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

          <div class="row">
            <div class="col-md-12" align="center">
                <form class="form-horizontal" method="post" action="">        

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Twitter</label>
                        <div class="col-sm-7">
                          <input type="text" required name="twitter" value="<?php echo (!empty($social_media) && isset($social_media['twitter']) ? $social_media['twitter'] : "") ?>" class="form-control" placeholder="Enter Twitter Link">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Facebook</label>
                        <div class="col-sm-7">
                          <input type="text" required name="facebook" value="<?php echo (!empty($social_media) && isset($social_media['facebook']) ? $social_media['facebook'] : "") ?>" class="form-control" placeholder="Enter Facebook Link">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">LinkedIn</label>
                        <div class="col-sm-7">
                          <input type="text" required name="linkedin" value="<?php echo (!empty($social_media) && isset($social_media['linkedin']) ? $social_media['linkedin'] : "") ?>" class="form-control" placeholder="Enter Linkedin Link">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Google Plus</label>
                        <div class="col-sm-7">
                          <input type="text" required name="blog" value="<?php echo (!empty($social_media) && isset($social_media['blog']) ? $social_media['blog'] : "") ?>" class="form-control" placeholder="Enter Google Plus Link">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Youtube</label>
                        <div class="col-sm-7">
                          <input type="text" required name="youtube" value="<?php echo (!empty($social_media) && isset($social_media['youtube']) ? $social_media['youtube'] : "") ?>" class="form-control" placeholder="Enter Youtube Link">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="hidden" name="id" value="<?php echo (isset($social_media['id']) && !empty($social_media['id']) ? $social_media['id'] : "");?>">
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