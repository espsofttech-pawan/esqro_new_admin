  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>"> 

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Frontend Content
      </h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <section class="content-header">
                <h1>
                  Home
                </h1>
              </section>   <br>           
              <div class="active tab-pane" id="settings">

                <?php
                if(!empty($this->session->flashdata('success')))
                {
                    ?>
                    <div class="alert alert-success alert-dismissable">
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
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                    <?php
                }
                ?>

                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                  <input type="hidden" name="id" value="<?php if(!empty($homeData)){ echo $homeData['id']; } ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input name="title" type="text" value="<?php if(!empty($homeData)){ echo $homeData['title']; } ?>" class="form-control" required="" placeholder="Enter title">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                      <?php if(!empty($homeData['image'])){ ?>
                          <input type="hidden" name="old_image" value="<?php if(!empty($homeData)){ echo $homeData['image']; } ?>">
                          <a href="<?php echo $homeData['image'] ?>" target="_blank">
                            <img src="<?php echo $homeData['image'] ?>" height="200px"; width="200px" >
                          </a>
                       <?php } ?>
                      <input type="file" name="image">
                    </div>
                  </div>                 

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="homebtn" class="btn btn-primary">Update</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <section class="content-header">
                <h1>
                  How it Works
                </h1>
              </section>      <br>        
              <div class="active tab-pane" id="settings">

                <?php
                if(!empty($this->session->flashdata('how_it_works_success')))
                {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <?php echo $this->session->flashdata('how_it_works_success'); ?>
                    </div>
                    <?php
                }
                ?>
                
                <?php
                if(!empty($this->session->flashdata('how_it_works_error')))
                {
                    ?>
                    <div class="alert alert-error alert-dismissable">
                        <?php echo $this->session->flashdata('how_it_works_error'); ?>
                    </div>
                    <?php
                }
                ?>

                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                  <input type="hidden" name="id" value="<?php if(!empty($how_it_works)){ echo $how_it_works['id']; } ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Title-1</label>
                    <div class="col-sm-10">
                      <input name="title1" type="text" value="<?php if(!empty($how_it_works)){ echo $how_it_works['title1']; } ?>" class="form-control" required="" placeholder="Enter title">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Description-1</label>
                    <div class="col-sm-10">
                      <textarea rows="4" name="description1" class="form-control" required="" placeholder="Enter description"><?php if(!empty($how_it_works)){ echo $how_it_works['description1']; } ?></textarea>
                    </div>
                  </div>   

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Title-2</label>
                    <div class="col-sm-10">
                      <input name="title2" type="text" value="<?php if(!empty($how_it_works)){ echo $how_it_works['title2']; } ?>" class="form-control" required="" placeholder="Enter title">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Description-2</label>
                    <div class="col-sm-10">
                      <textarea rows="4" name="description2" class="form-control" required="" placeholder="Enter description"><?php if(!empty($how_it_works)){ echo $how_it_works['description2']; } ?></textarea>
                    </div>
                  </div>                                    

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                      <?php if(!empty($how_it_works['image'])){ ?>
                          <input type="hidden" name="old_image" value="<?php if(!empty($how_it_works)){ echo $how_it_works['image']; } ?>">
                          <a href="<?php echo $how_it_works['image'] ?>" target="_blank">
                            <img src="<?php echo $how_it_works['image'] ?>" height="200px"; width="200px" >
                          </a>
                       <?php } ?>
                      <input type="file" name="image">
                    </div>
                  </div>                 

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="how_it_works_btn" class="btn btn-primary">Update</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <section class="content-header">
                <h1>
                  Esqro Features
                </h1>
              </section>      <br>        
              <div class="active tab-pane" id="settings">

                <?php
                if(!empty($this->session->flashdata('feature_success')))
                {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <?php echo $this->session->flashdata('feature_success'); ?>
                    </div>
                    <?php
                }
                ?>
                
                <?php
                if(!empty($this->session->flashdata('feature_error')))
                {
                    ?>
                    <div class="alert alert-error alert-dismissable">
                        <?php echo $this->session->flashdata('feature_error'); ?>
                    </div>
                    <?php
                }
                ?>

                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                  <input type="hidden" name="id" value="<?php if(!empty($features)){ echo $features['id']; } ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input name="title" type="text" value="<?php if(!empty($features)){ echo $features['title']; } ?>" class="form-control" required="" placeholder="Enter title">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                      <textarea rows="4" name="description" class="form-control" required="" placeholder="Enter description"><?php if(!empty($features)){ echo $features['description']; } ?></textarea>
                    </div>
                  </div> 

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Blog</label>
                    <div class="col-sm-3">
                      <input name="blog_title1" type="text" value="<?php if(!empty($features)){ echo $features['blog_title1']; } ?>" class="form-control" required="" placeholder="Enter title"> <br>

                      <textarea rows="8" name="blog_description1" class="form-control" required="" placeholder="Enter description"><?php if(!empty($features)){ echo $features['blog_description1']; } ?></textarea><br>

                      <?php if(!empty($features['blog_image1'])){ ?>
                          <input type="hidden" name="old_blog_image1" value="<?php if(!empty($features)){ echo $features['blog_image1']; } ?>">
                          <a href="<?php echo $features['blog_image1'] ?>" target="_blank">
                            <img src="<?php echo $features['blog_image1'] ?>" height="100px"; width="100px" >
                          </a>
                       <?php } ?>
                      <input type="file" name="blog_image1">
                    </div>

                    <div class="col-sm-3">
                      <input name="blog_title2" type="text" value="<?php if(!empty($features)){ echo $features['blog_title2']; } ?>" class="form-control" required="" placeholder="Enter title"> <br>

                      <textarea rows="8" name="blog_description2" class="form-control" required="" placeholder="Enter description"><?php if(!empty($features)){ echo $features['blog_description2']; } ?></textarea><br>

                      <?php if(!empty($features['blog_image2'])){ ?>
                          <input type="hidden" name="old_blog_image2" value="<?php if(!empty($features)){ echo $features['blog_image2']; } ?>">
                          <a href="<?php echo $features['blog_image2'] ?>" target="_blank">
                            <img src="<?php echo $features['blog_image2'] ?>" height="100px"; width="100px" >
                          </a>
                       <?php } ?>
                      <input type="file" name="blog_image2">
                    </div>

                    <div class="col-sm-3">
                      <input name="blog_title3" type="text" value="<?php if(!empty($features)){ echo $features['blog_title3']; } ?>" class="form-control" required="" placeholder="Enter title"> <br>

                      <textarea rows="8" name="blog_description3" class="form-control" required="" placeholder="Enter description"><?php if(!empty($features)){ echo $features['blog_description3']; } ?></textarea><br>

                      <?php if(!empty($features['blog_image3'])){ ?>
                          <input type="hidden" name="old_blog_image3" value="<?php if(!empty($features)){ echo $features['blog_image3']; } ?>">
                          <a href="<?php echo $features['blog_image3'] ?>" target="_blank">
                            <img src="<?php echo $features['blog_image3'] ?>" height="100px"; width="100px" >
                          </a>
                       <?php } ?>
                      <input type="file" name="blog_image3">
                    </div>                    
                  </div>                                  

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="features_btn" class="btn btn-primary">Update</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

      </div>      


      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <section class="content-header">
                <h1>
                  Blog
                </h1>
                <a href="<?php echo base_url('FrontendContent/add_blog') ?>">
                  <button style="float: right" class="btn btn-primary">Add+</button>
                </a>
              </section><br>
              <div class="active tab-pane" id="settings">

                <?php
                if(!empty($this->session->flashdata('blog_success')))
                {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <?php echo $this->session->flashdata('blog_success'); ?>
                    </div>
                    <?php
                }
                ?>
                
                <?php
                if(!empty($this->session->flashdata('blog_error')))
                {
                    ?>
                    <div class="alert alert-error alert-dismissable">
                        <?php echo $this->session->flashdata('blog_error'); ?>
                    </div>
                    <?php
                }
                ?>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Date</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(!empty($blog)){
                    foreach ($blog as $key => $value) { ?>
                      <tr>
                        <td><?php echo $value['title'] ?></td>
                        <td><?php echo $value['description'] ?></td>
                        <td><img src="<?php echo $value['image'] ?>" height="100px" width="100px"></td>
                        <td><?php echo $value['created_date'] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" onclick="deleteDisRecord(<?php echo $value['id']; ?>)" data-target="#deleteRecord"  > <i class="fa fa-trash"></i> Delete</a>
                          |
                          <a href="<?php echo base_url('FrontendContent/blog_edit/'.$value['id']) ?>"> 
                            <i class="fa fa-edit"></i>Edit
                          </a>
                        </td>
                      </tr>
                    <?php } } ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>

      </div>  


      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <section class="content-header">
                <h1>
                  Frequently Asked questions
                </h1>
                <a href="<?php echo base_url('FrontendContent/add_frequently_asked_questions') ?>">
                  <button style="float: right" class="btn btn-primary">Add+</button>
                </a>
              </section><br>
              <div class="active tab-pane" id="settings">

                <?php
                if(!empty($this->session->flashdata('question_success')))
                {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <?php echo $this->session->flashdata('question_success'); ?>
                    </div>
                    <?php
                }
                ?>
                
                <?php
                if(!empty($this->session->flashdata('question_error')))
                {
                    ?>
                    <div class="alert alert-error alert-dismissable">
                        <?php echo $this->session->flashdata('question_error'); ?>
                    </div>
                    <?php
                }
                ?>

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Date</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(!empty($frequently_asked_questions)){
                    foreach ($frequently_asked_questions as $key => $value) { ?>
                      <tr>
                        <td><?php echo $value['title'] ?></td>
                        <td><?php echo $value['description'] ?></td>
                        <td><?php echo $value['created_date'] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" onclick="deleteQuestionsRecordFun(<?php echo $value['id']; ?>)" data-target="#deleteQuestionsRecord"  > <i class="fa fa-trash"></i> Delete</a>
                          |
                          <a href="<?php echo base_url('FrontendContent/frequently_asked_questions_edit/'.$value['id']) ?>"> 
                            <i class="fa fa-edit"></i>Edit
                          </a>
                        </td>
                      </tr>
                    <?php } } ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>

      </div>         

    </section>
  </div>

<script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.2.0.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>

  <script>
    $(function () {
      $("#example1").DataTable();
      $("#example2").DataTable();
    });
  </script> 


    <div class="modal fade" id="deleteRecord" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="alert alert-danger" id="deleteErrorDiv" style="display: none;"></div>
        <div class="alert alert-success" id="deleteSuccessDiv" style="display: none;"></div>
        <form action="<?php echo base_url('FrontendContent/delete_blog') ?>" name='deleteRecord' id="deleteRecord" method="post">
        <div class="modal-body" style="color: black;">
          <input type="hidden" class="form-control" name="id" id="deleteId" required="">
          Are you sure want to delete this record?
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" name="block_country" type="submit">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div> 

     <div class="modal fade" id="deleteQuestionsRecord" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="alert alert-danger" id="deleteErrorDivQues" style="display: none;"></div>
        <div class="alert alert-success" id="deleteSuccessDivQues" style="display: none;"></div>
        <form action="<?php echo base_url('FrontendContent/delete_frequently_asked_questions') ?>" name='deleteQuestionsRecord' id="deleteQuestionsRecord" method="post">
        <div class="modal-body" style="color: black;">
          <input type="hidden" class="form-control" name="id" id="deleteIdQuestion" required="">
          Are you sure want to delete this record?
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" name="block_country" type="submit">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>  

  <script type="text/javascript">
  function deleteDisRecord(id){
    $("#deleteId").val(id);
  }

  $("form[name='deleteRecord']").submit(function(e){
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
       type: "POST",
       url: url,
       data: form.serialize(),
       success: function(response)
       {
          if(response){
              $('#deleteSuccessDiv').html('Record deleted successfully!');
              $('#deleteSuccessDiv').show(0).delay(2000).hide(0);
              setTimeout(function() {
                  var redirecturl = "<?php echo base_url('FrontendContent') ?>";
                  window.location.href = redirecturl;
              }, 1000);
          }else{
              $('#deleteErrorDiv').html('Oops something went wrong please try again');
              $('#deleteErrorDiv').show(0).delay(2000).hide(0);
          }
       }
    });    
});

  function deleteQuestionsRecordFun(id){
    $("#deleteIdQuestion").val(id);
  }

  $("form[name='deleteQuestionsRecord']").submit(function(e){
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
       type: "POST",
       url: url,
       data: form.serialize(),
       success: function(response)
       {
          if(response){
              $('#deleteSuccessDivQues').html('Record deleted successfully!');
              $('#deleteSuccessDivQues').show(0).delay(2000).hide(0);
              setTimeout(function() {
                  var redirecturl = "<?php echo base_url('FrontendContent') ?>";
                  window.location.href = redirecturl;
              }, 1000);
          }else{
              $('#deleteErrorDivQues').html('Oops something went wrong please try again');
              $('#deleteErrorDivQues').show(0).delay(2000).hide(0);
          }
       }
    });    
});

  </script>   