
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?php if(!empty($support_category)){ echo "Edit"; }else{ echo "Add"; } ?> Category
      </h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">        
              <div class="active tab-pane" id="settings">

                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                  <input type="hidden" name="id" value="<?php if(!empty($support_category)){ echo $support_category['id']; } ?>">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input name="name" value="<?php if(!empty($support_category)){ echo $support_category['name']; } ?>" type="text" class="form-control" required="" placeholder="Enter name">
                    </div>
                  </div>             

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="addBtn" class="btn btn-primary">Submit</button>
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