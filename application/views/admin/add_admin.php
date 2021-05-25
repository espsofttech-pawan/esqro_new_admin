<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Add
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12" align="center">
                <form class="form-horizontal" method="post" action="">        

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-7">
                          <input type="text" required name="user_name" class="form-control" placeholder="Enter Username" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-7">
                          <input type="text" required name="first_name" class="form-control" placeholder="Enter First Name" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-7">
                          <input type="text" required name="last_name" class="form-control" placeholder="Enter Last Name" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-7">
                          <input type="email" required name="email" class="form-control" placeholder="Enter Email" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-7">
                          <input type="password" required name="password" class="form-control" placeholder="Enter Password" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Contact Number</label>
                        <div class="col-sm-7">
                          <input type="number" required name="contact_number" class="form-control" placeholder="Enter Contact Number" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-7">
                            <select required name="user_role" class="form-control">
                                <option value="1">Super Admin</option>
                                <option value="3">Dispute Admin</option>
                                <option value="4">Contact Admin</option>
                                <option value="5">Identity Verification Admin</option>
                            </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
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