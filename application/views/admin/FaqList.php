
<style type="text/css">
  .pull-right {
    float: right;
}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php $msgs = $this->session->flashdata('itcoin_success'); ?>
         <?php $msge = $this->session->flashdata('itcoin_error'); ?>
         <?php if(!empty($msgs)){ ?>
         <div class="container-fluid">
        <div class="panel panel-headline">
          <div class="panel-body">
            <div class="row">
              <!-- class="col-md-12 wow fadeIn" data-wow-delay="0.3s" -->
                <div class="col-md-12">
                  <div class="alert-message alert-success">
                      <?php echo $msgs; ?>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
        <?php } if(!empty($msge)){ ?>
        <div class="container-fluid">
        <div class="panel panel-headline">
          <div class="panel-body">
            <div class="row">
              <!-- class="col-md-12 wow fadeIn" data-wow-delay="0.3s" -->
                <div class="col-md-12">
                  <div class="alert-message alert-danger">
                      <?php echo $msge; ?>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="">FAQ List
                <a href="<?php echo base_url(); ?>admin/home/AddFaq" class="btn btn-primary pull-right">Add Faq</a>
              </h3>
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
                  <th>S.No</th>
                  <th>Category</th>
                  <th>Question</th>
                  <th>Status</th>
                  <th>Reg. Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($faq_list))
                    {
                      $i = 1;
                        foreach ($faq_list as $key => $arr) 
                        {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $arr['cat_name']; ?></td>
                                <td><?php echo $arr['question']; ?></td>
                                <td>
                                  <?php if($arr["status"] == 1){ ?>
                                    <button class="btn btn-primary" type="button" disabled>Active</button>
                                  <?php }else{ ?>
                                    <button class="btn btn-danger" type="button" disabled>Disable</button>
                                  <?php } ?>
                                </td>
                                <td><?php echo $arr['create_date']; ?></td>
                                <td>
                                  
                                  <a href="<?php echo base_url() ?>admin/home/AddFaq/<?php echo $arr['id']; ?>" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                                  &nbsp;
                                  <?php if($arr['status'] == 1){ ?>
                                                    <a href="javascript:void(0)" href-status="0" href-role="faq"  href-id="<?php echo $arr['id']?>" href-act="Disable" class="faq_status" title="Disable faq"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                                    &nbsp;
                                              <?php }else{ ?>
                                                    <a href="javascript:void(0)" href-status="1" href-role="faq"  href-id="<?php echo $arr['id']?>" href-act="Enable" class="faq_status"  title="Enable faq"><i class="fa fa-check-square" aria-hidden="true"></i></a>
                                                    &nbsp;
                                                <?php } ?>  

                                                <a href="javascript:void(0)" href-status="3" href-role="faq" href-id="<?php echo $arr['id']?>" href-act="Delete" class="faq_status" title="Delete faq"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                    <!--<tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td>Win 95+</td>
                      <td> 4</td>
                      <td>X</td>
                    </tr>-->
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  