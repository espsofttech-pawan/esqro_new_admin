      <div class="login-box">
         <div class="login-logo">
            <b>EsqroCrypto Admin Panel
         </div>
         <!-- /.login-logo -->
         <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <div class="form-signin-heading">
               <?php
               if(isset($error)) 
               {
                  echo '<div class="has-error error" style="margin-bottom: 10px;">'.$error.'</div>';  
               } 
               ?>
             </div>
            <form action="<?php echo base_url().'login/signin'; ?>" method="post">
               <div class="form-group has-feedback">
                  <input type="email" name="user_name" value="<?php echo set_value('user_name'); ?>" class="form-control" placeholder="Email">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  <label class="error"><?php echo (!empty(form_error('user_name')) ? form_error('user_name') : ''); ?></label>
               </div>
               <div class="form-group has-feedback">
                  <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  <label class="error"><?php echo (!empty(form_error('password')) ? form_error('password') : ''); ?></label>
               </div>
               <div class="row">
                  <div class="col-xs-4">
                     <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                  </div>
               </div>
            </form>
         </div>
      </div>