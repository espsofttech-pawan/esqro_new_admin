  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Profile
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-md-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="active"><a href="#settings" data-toggle="tab">Edit Profile</a></li>
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

                <form class="form-horizontal" method="post" action="<?php echo site_url().'home/user_profile/'.base64_encode($user_info['id']); ?>">
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="hidden" name="user_id" value="<?php echo $user_info['id']; ?>">
                      <input type="text" required name="first_name" value="<?php echo (!empty($first_name) ? $first_name : $user_info['first_name']) ?>" class="form-control" placeholder="First Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-10">
                      <input type="text" required name="last_name" value="<?php echo (!empty($last_name) ? $last_name : $user_info['last_name']) ?>" class="form-control" placeholder="Last Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" readonly="" name="email" value="<?php echo (!empty($email) ? $email : $user_info['email']) ?>" class="form-control" placeholder="Email">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
                      <input type="text" required name="user_name" value="<?php echo $user_info['username']; ?>" class="form-control" placeholder="User Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Contact Number</label>
                    <div class="col-sm-10">
                      <input type="number" required name="contact_no" value="<?php echo $user_info['mobile']; ?>" class="form-control" placeholder="Contact Number">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">DOB</label>
                    <div class="col-sm-10">
                      <input type="date" required name="dob" value="<?php echo $user_info['dob']; ?>" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Postcode</label>
                    <div class="col-sm-10">
                      <input type="number" name="postcode" value="<?php echo $user_info['postcode']; ?>" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Telegram Username</label>
                    <div class="col-sm-10">
                      <input type="text" name="telegram_username" value="<?php echo $user_info['telegram_username']; ?>" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                      <input type="text" name="address1" value="<?php echo $user_info['address1']; ?>" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">City</label>
                    <div class="col-sm-10">
                      <input type="text" name="city" value="<?php echo $user_info['city']; ?>" class="form-control">
                    </div>
                  </div>                                    

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Status/Block</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="status">
                          <option <?php echo ($user_info['isVerified'] == 0)?'selected':''; ?> value="0">Inactive</option>
                          <option <?php echo ($user_info['isVerified'] == 1)?'selected':''; ?> value="1">Active</option>
                          <option <?php echo ($user_info['isVerified'] == 2)?'selected':''; ?> value="2">Block</option>         
                      </select>
                    </div>
                  </div>                  

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="btnUpdateUser" class="btn btn-danger">Update</button>
                    </div>
                  </div>

                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

        <div class="col-md-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="active"><a href="#settings" data-toggle="tab">View Profile</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="settings">


                <form class="form-horizontal">
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label">First Name:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['first_name']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Last Name:</label>

                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['last_name']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Username:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['username']; ?></span>
                    </div>
                  </div>                  

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Email:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['email']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Contact Number:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['mobile']; ?></span>
                    </div>
                  </div>

                  <?php if(!empty($user_info['dob'])){ ?>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Date of birth:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['dob']; ?></span>
                    </div>
                  </div>
                  <?php } ?>

                  <?php if(!empty($user_info['postcode'])){ ?>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Postcode:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['postcode']; ?></span>
                    </div>
                  </div>
                  <?php } ?>

                  <?php if(!empty($user_info['country_name'])){ ?>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Country:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['country_name']; ?></span>
                    </div>
                  </div>
                  <?php } ?>

                  <?php if(!empty($user_info['state'])){ ?>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">State:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['state']; ?></span>
                    </div>
                  </div>
                  <?php } ?>                  

                  <?php if(!empty($user_info['city'])){ ?>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">City:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['city']; ?></span>
                    </div>
                  </div>
                  <?php } ?>

                  <?php if(!empty($user_info['telegram_username'])){ ?>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Telegram Username:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['telegram_username']; ?></span>
                    </div>
                  </div> 
                  <?php } ?>

                  <?php if(!empty($user_info['address1'])){ ?>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address-1:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['address1']; ?></span>
                    </div>
                  </div> 
                  <?php } ?>

                  <?php if(!empty($user_info['address2'])){ ?>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Address-2:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['address2']; ?></span>
                    </div>
                  </div> 
                  <?php } ?>

                  <?php if(!empty($user_info['datetime'])){ ?>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Registered Date:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php echo $user_info['datetime']; ?></span>
                    </div>
                  </div> 
                  <?php } ?>                  
                        
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Status:</label>
                    <div class="col-sm-8">
                      <span class="formelement"><?php if($user_info['isVerified'] == 1){ echo "Active"; }else if($user_info['isVerified'] == 2){ echo "Block"; }else{ echo "Inactive"; } ?></span>
                    </div>
                  </div>

                </form>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>