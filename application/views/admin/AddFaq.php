<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add FAQ
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
            <div class="col-md-12" align="center">
                <form class="form-horizontal" method="post" action="">

                      <div class="form-group">
                        <label class="col-sm-2 control-label" >Category</label>
                        <div class="col-sm-7">
                          <select name="category_id" class="form-control" required="">
                            <option value="">Select Category</option>
                            <?php if(!empty($faq_cat_list)){
                                    foreach ($faq_cat_list as $fkey => $fvalue) {
                            ?>
                                    <option value="<?php echo $fvalue['id']?>" <?php echo (!empty($pdata) && isset($pdata['category_id']) && $pdata['category_id'] == $fvalue['id'] ? "selected":"");?>> <?php echo $fvalue['name']?></option>
                            <?php } }?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Question</label>
                        <div class="col-sm-7">
                          <input type="text" required name="question" value="<?php echo (!empty($pdata) && isset($pdata['question']) ? $pdata['question'] : "") ?>" class="form-control" placeholder="Enter Question">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Answew</label>
                        <div class="col-sm-7">
                          <textarea name="answer"  id="description"><?php echo (!empty($pdata) && isset($pdata['answer']) ? $pdata['answer'] : "") ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="hidden" name="id" value="<?php echo (isset($pdata['id']) && !empty($pdata['id']) ? $pdata['id'] : "");?>">
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


        