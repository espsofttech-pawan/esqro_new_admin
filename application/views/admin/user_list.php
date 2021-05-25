  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">  
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              
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

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>DOB</th>
                  <th>Contact Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($user_list))
                    {
                    	$i = 1;
                        foreach ($user_list as $key => $arr) 
                        {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $arr['first_name'].' '.$arr['last_name']; ?></td>
                                <td><?php echo $arr['email']; ?></td>
                                <td><?php echo $arr['dob']; ?></td>
                                <td><?php echo $arr['mobile']; ?></td>
                                <td>
                                  <?php if($arr['isVerified'] == 1){ ?>
                                    <button class="btn btn-primary">Active</button>
                                  <?php }else if($arr['isVerified'] == 2){ ?>
                                    <button class="btn btn-danger btn-sm">Block</button>
                                  <?php }else{ ?>
                                    <button class="btn btn-danger btn-sm">Inactive</button>
                                  <?php } ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Action</button>
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                          <span class="caret"></span>
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">

                                          <li> <a href="<?php echo site_url().'home/user_profile/'.base64_encode($arr['id']); ?>"> <i class="fa fa-eye"></i> View</a></li>

                                          <li> <a href="#" data-toggle="modal" onclick="deleteDisRecord(<?php echo $arr['id']; ?>)" data-target="#deleteRecord"  > <i class="fa fa-trash"></i> Delete</a></li>
                                        </ul>
                                      </div>
                                      </td>
                            </tr>
                            <?php
                        $i++; }
                    }
                    ?>
                </tbody>
              </table>
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
        <form action="<?php echo base_url('home/deleteUsers') ?>" name='deleteRecord' id="deleteRecord" method="post">
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
                  var redirecturl = "<?php echo base_url('home/user_list') ?>";
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