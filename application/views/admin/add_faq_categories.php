<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add FAQ Category
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                <form class="form-horizontal" method="post" action="">
                      
                      <div class="form-group">
                        <label class="col-sm-5 control-label">Categry</label>
                        <div class="col-sm-7">
                          <input type="text" required name="name" value="<?php echo (!empty($pdata) && isset($pdata['name']) ? $pdata['name'] : "") ?>" class="form-control" placeholder="Enter Category Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="hidden" name="id" value="<?php echo (isset($pdata['id']) && !empty($pdata['id']) ? $pdata['id'] : "");?>">
                          <button type="submit" name="btnUpdateUser" class="btn btn-primary pull-right">Submit</button>
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
        