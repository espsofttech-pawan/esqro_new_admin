<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>"> 
<div class="content-wrapper">
  <section class="content">
      <div class="row">
          <div class="col-lg-12 col-xs-12">
              <h2>KYC Management</h2>
              <div class="box">
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
                             <th>User Name</th>
                             <th>Country</th>
                             <th>Passport</th>
                             <th>National Front</th>
                             <th>National Back</th>
                             <th>Driving Licence</th>
                             <th>Action</th>
                          </tr>
                       </thead>
                       <tbody>
                       <?php $i = 1; foreach ($allDocument as $key => $value) { ?>
                          <tr>
                            <td><?php echo $i ?></td>

                            <td><?php echo $value['username'] ?></td>

                            <td><?php echo $value['countryName'] ?></td>

                            <td>
                              <a target="_blank" href="<?php echo getSiteUrl().$value['passport_file'] ?>">
                                <img height="50px" width="80px" src="<?php echo getSiteUrl().$value['passport_file'] ?>">
                              </a>
                            </td>

                            <td>
                              <a target="_blank" href="<?php echo getSiteUrl().$value['national_card_front'] ?>">
                                  <img height="50px" width="80px" src="<?php echo getSiteUrl().$value['national_card_front'] ?>">
                              </a>
                            </td>

                            <td>
                              <a target="_blank" href="<?php echo getSiteUrl().$value['national_card_back'] ?>">
                                  <img height="50px" width="80px" src="<?php echo getSiteUrl().$value['national_card_back'] ?>">
                                </a>
                            </td>

                            <td>
                              <a target="_blank" href="<?php echo getSiteUrl().$value['driving_licence'] ?>">
                                  <img height="50px" width="80px" src="<?php echo getSiteUrl().$value['driving_licence'] ?>">
                                </a>
                            </td>

                            <td>

                              <?php
                                if($value['isapproved'] == 1){
                                  echo "Approved";
                                }else if($value['isapproved'] == 2){
                                  echo "Rejected";
                                }else{
                              ?>

                              <a href="#" data-toggle="modal" onclick="approve_kyc(<?php echo $value['id']; ?>)" data-target="#approveKyc"  >Approve</a>
                              |
                              
                              <a href="#" data-toggle="modal" onclick="reject_kyc(<?php echo $value['id']; ?>)" data-target="#rejectKyc"  >Rejected</a>

                              <?php } ?>                            
                            </td>

                          </tr>
                       <?php $i++; } ?>
                       </tbody>
                    </table>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.2.0.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>

  <script>
    $(function () {
      $("#example1").DataTable();
    });
  </script>

    <div class="modal fade" id="approveKyc" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="alert alert-danger" id="kycapproveErrorDiv" style="display: none;"></div>
        <div class="alert alert-success" id="kycapproveSuccessDiv" style="display: none;"></div>
        <form action="<?php echo base_url('kycManagement/approveKyc') ?>" name='approveKyc' id="approveKyc" method="post">
        <div class="modal-body" style="color: black;">
          <input type="hidden" class="form-control" name="id" id="approveid" required="">
          Are you sure want to approve this record?
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" name="block_country" type="submit">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>  

    <div class="modal fade" id="rejectKyc" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="alert alert-danger" id="kycrejectErrorDiv" style="display: none;"></div>
        <div class="alert alert-success" id="kycrejectSuccessDiv" style="display: none;"></div>
        <form action="<?php echo base_url('kycManagement/rejectKyc') ?>" name='rejectKyc' id="rejectKyc" method="post">
        <div class="modal-body" style="color: black;">
          <input type="hidden" class="form-control" name="id" id="rejectid" required="">
          Are you sure want to reject this record?
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" name="block_country" type="submit">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>       

  <script type="text/javascript">
    function approve_kyc(id){
      $("#approveid").val(id);
    }

    $("form[name='approveKyc']").submit(function(e){
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
                $('#kycapproveSuccessDiv').html('Kyc approved successfully!');
                $('#kycapproveSuccessDiv').show(0).delay(2000).hide(0);
                setTimeout(function() {
                    var redirecturl = "<?php echo base_url('kycManagement') ?>";
                    window.location.href = redirecturl;
                }, 1000);
              }else{
                  $('#kycapproveErrorDiv').html('Oops something went wrong please try again');
                  $('#kycapproveErrorDiv').show(0).delay(2000).hide(0);
              }
           }
        });    
    });

    function reject_kyc(id){
      $("#rejectid").val(id);
    }

    $("form[name='rejectKyc']").submit(function(e){
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
                $('#kycrejectSuccessDiv').html('Kyc rejected successfully!');
                $('#kycrejectSuccessDiv').show(0).delay(2000).hide(0);
                setTimeout(function() {
                    var redirecturl = "<?php echo base_url('kycManagement') ?>";
                    window.location.href = redirecturl;
                }, 1000);
              }else{
                  $('#kycrejectErrorDiv').html('Oops something went wrong please try again');
                  $('#kycrejectErrorDiv').show(0).delay(2000).hide(0);
              }
           }
        });    
    });    

  </script>  