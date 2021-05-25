  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <h2>Support Request List</h2>
                <div class="box">
                    <div class="box-body">
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
                               <th>token</th>
                               <th>Username</th>
                               <th>Subject</th>
                               <th>create_date</th>
                               <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                         <?php
                         $j = 1;
                         if(!empty($support_tkn_list))
                         {
                            foreach ($support_tkn_list as $key => $arr)
                            {
                               ?>
                               <tr>
                                  <td><?php echo $j; ?></td>
                                  <td><a href="<?php echo base_url();?>support/supportchat?token=<?php echo $arr['token'];?>"><?php echo $arr['token']; ?></a></td>
                                  <td>
                                    <a href="<?php echo base_url('home/user_profile/'.base64_encode($arr['user_id'])) ?>">
                                      <?php echo $arr['username']; ?>
                                    </a>
                                  </td>
                                  <td><?php echo $arr['subject']; ?></td>
                                  <td><?php echo $arr['create_date']; ?></td>
                                  <td>
                                     <a href="<?php echo base_url();?>support/supportchat?token=<?php echo $arr['token'];?>">View</a>
                                  </td>
                               </tr>
                               <?php
                            }
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