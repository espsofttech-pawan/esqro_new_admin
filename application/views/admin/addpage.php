<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php
          if($pdata['page_name'] == 'how_to_buy_currency')
          {
            $page_name = 'How to buy currency';
          }
          elseif($pdata['page_name'] == 'aboutus'){
             $page_name = 'About Us';
          }
          elseif($pdata['page_name'] == 'privacy_policy')
          {
            $page_name = 'Privacy Policy';
          }
          elseif($pdata['page_name'] == 'terms_of_conditions')
          {
            $page_name = 'Terms Of Conditions';
          }
          elseif($pdata['page_name'] == 'faq')
          {
            $page_name = 'FAQ';
          }
         echo $page_name;?>
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
                        <!-- <label class="col-sm-2 control-label">Content English</label> -->
                        <div class="col-sm-12">
                          <textarea name="page_value"  id="page_description"><?php echo (!empty($pdata) && isset($pdata['page_value']) ? $pdata['page_value'] : "") ?></textarea>
                        </div>

<!--                         <label class="col-sm-2 control-label">Content French</label>
                        <div class="col-sm-12">
                          <textarea name="other_value"  id="page_description"><?php echo (!empty($pdata) && isset($pdata['other_value']) ? $pdata['other_value'] : "") ?></textarea>
                        </div> -->
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


        