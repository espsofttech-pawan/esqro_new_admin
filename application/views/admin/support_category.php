  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>"> 

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Support Category
      </h1>
    </section>

    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <section class="content-header">
                <h1>
                  Support Category
                </h1>
                <a href="<?php echo base_url('FrontendContent/add_support_category') ?>">
                  <button style="float: right" class="btn btn-primary">Add+</button>
                </a>
              </section><br>
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

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Created Date</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(!empty($category)){
                    foreach ($category as $key => $value) { ?>
                      <tr>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['created_date'] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" onclick="deleteDisRecord(<?php echo $value['id']; ?>)" data-target="#deleteRecord"  > <i class="fa fa-trash"></i> Delete</a>
                          |
                          <a href="<?php echo base_url('FrontendContent/add_support_category/'.$value['id']) ?>"> 
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
        <form action="<?php echo base_url('FrontendContent/delete_support_category') ?>" name='deleteRecord' id="deleteRecord" method="post">
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
                  var redirecturl = "<?php echo base_url('FrontendContent/support_category') ?>";
                  window.location.href = redirecturl;
              }, 1000);
          }else{
              $('#deleteErrorDiv').html('Oops something went wrong please try again');
              $('#deleteErrorDiv').show(0).delay(2000).hide(0);
          }
       }
    });    
});

  </script>   