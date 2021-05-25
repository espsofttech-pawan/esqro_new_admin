  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Profile
      </h1>
    </section>

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

                <form class="form-horizontal" method="post" action="<?php echo site_url().'home/my_profile/'.base64_encode($user_info['id']); ?>">
                  
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
                      <input type="email" required name="email" value="<?php echo (!empty($email) ? $email : $user_info['email']) ?>" class="form-control" placeholder="Email">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
                      <input type="text" required name="user_name" value="<?php echo $user_info['user_name']; ?>" class="form-control" placeholder="User Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Contact Number</label>
                    <div class="col-sm-10">
                      <input type="number" required name="contact_no" value="<?php echo $user_info['contact_no']; ?>" class="form-control" placeholder="Contact Number">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                      <input type="text" required name="address" value="<?php echo $user_info['address']; ?>" class="form-control" placeholder="Address">
                    </div>
                  </div>                 

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="btnUpdateUser" class="btn btn-primary">Update</button>
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

              <li class="active"><a href="#settings" data-toggle="tab">View Profile</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="settings">


                <form class="form-horizontal">
                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label">First Name:</label>
                    <div class="col-sm-9">
                      <span class="formelement"><?php echo $user_info['first_name']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Last Name:</label>

                    <div class="col-sm-9">
                      <span class="formelement"><?php echo $user_info['last_name']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-sm-9">
                      <span class="formelement"><?php echo $user_info['email']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">User Name:</label>
                    <div class="col-sm-9">
                      <span class="formelement"><?php echo $user_info['user_name']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Contact Number:</label>
                    <div class="col-sm-9">
                      <span class="formelement"><?php echo $user_info['contact_no']; ?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Address:</label>
                    <div class="col-sm-9">
                      <span class="formelement"><?php echo $user_info['address']; ?></span>
                    </div>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Change Password</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="settings">

                <?php
                if(!empty($this->session->flashdata('password_success')))
                {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('password_success'); ?>
                    </div>
                    <?php
                }
                ?>
                
                <?php
                if(!empty($this->session->flashdata('password_error')))
                {
                    ?>
                    <div class="alert alert-error alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('password_error'); ?>
                    </div>
                    <?php
                }
                ?>

                <form class="form-horizontal" method="post" action="<?php echo site_url().'home/my_profile/'.base64_encode($user_info['id']); ?>">
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="hidden" name="user_id" value="<?php echo $user_info['id']; ?>">
                      <input type="text" required name="old_password" class="form-control" placeholder="Enter old password">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">New Password</label>

                    <div class="col-sm-10">
                      <input type="text" required name="new_password" class="form-control" placeholder="Enter new password">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="text" required name="confirm_password" class="form-control" placeholder="Enter confirm password">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="btnChangePassword" class="btn btn-primary">Update</button>
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