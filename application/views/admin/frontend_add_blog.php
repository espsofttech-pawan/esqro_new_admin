
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Add Blog
      </h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">        
              <div class="active tab-pane" id="settings">

                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input name="title" type="text" class="form-control" required="" placeholder="Enter title">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                      <textarea rows="4" name="description" class="form-control" required="" placeholder="Enter description"></textarea>
                    </div>
                  </div>                  

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file" name="image" required="">
                    </div>
                  </div>                 

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="addBlogBtn" class="btn btn-primary">Submit</button>
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