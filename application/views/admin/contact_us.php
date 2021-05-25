  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">  
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Contact Us</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Comment</th>
                  <th>Created Date</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($contact_us))
                    {
                    	$i = 1;
                        foreach ($contact_us as $key => $arr) 
                        {
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $arr['name']; ?></td>
                                <td><?php echo $arr['email']; ?></td>
                                <td><?php echo $arr['mobile']; ?></td>
                                <td><?php echo $arr['comment']; ?></td>
                                <td><?php echo $arr['created_date']; ?></td>
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