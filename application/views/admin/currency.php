<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LocalCoinTrade</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'; ?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'; ?>">
      <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'; ?>">
      <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'; ?>">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/header'); ?>
        <?php $this->load->view('admin/side_bar'); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Currency
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Currency</li>
                </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Currency</h3>
                    </div>
                      <button style="margin-left: 8px" data-toggle="modal" data-target="#addModal" class="btn btn-success">Add</button>
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
                            <th>Name</th>
                            <th>Created Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if(!empty($currency))
                          {
                          $i = 1;
                          foreach ($currency as $key => $arr)
                          {
                            $id = base64_encode($arr['id']);
                          ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $arr['name']; ?></td>
                            <td><?php echo $arr['created_date']; ?></td>
                            <td>
                                <button  data-toggle="modal" data-target="#editModal<?php echo $arr['id'] ?>" class="btn btn-success">Edit</button>
                              <a href="<?php echo base_url('admin/home/delete_web_currency/'.$id) ?>" onclick="return confirm('Are you sure?')">
                                <button class="btn btn-danger">Delete</button>
                              </a>
                            </td>
                          </tr>
                          <?php
                          $i++;
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

            <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Add Currency</h4>
                  </div>
                  <form role="form" action="<?= base_url('admin/home/currency'); ?>" method="POST" id="add_form" enctype="multipart/form-data">
                    <div class="modal-body">

                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="brand_name">Name</label>
                          <input type="text" class="form-control" id="title" name="name" placeholder="Name" autocomplete="off" required="" >
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" name="add_currency" class="btn btn-primary">Add</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <?php

              foreach ($currency as $key => $arr)
              { ?>

                <div class="modal fade" tabindex="-1" role="dialog" id="editModal<?php echo $arr['id'] ?>">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Edit Currency</h4>
                      </div>
                      <form role="form" action="<?= base_url('admin/home/currency'); ?>" method="POST" id="add_form" enctype="multipart/form-data">
                        <div class="modal-body">

                          <div class="row">
                            <div class="form-group col-md-12">
                              <label for="brand_name">Name</label>
                              <input type="text" class="form-control" id="title" value="<?php echo $arr['name'] ?>" name="name" placeholder="Name" autocomplete="off" required="" >
                              <input type="hidden" value="<?php echo $arr['id'] ?>" name="id">
                            </div>
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" name="edit_category" class="btn btn-primary" >Update</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              <?php }

            ?>

        </div>        
        <?php $this->load->view('admin/footer'); ?>
        <div class="control-sidebar-bg"></div>
    </div>
    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.2.0.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/dist/js/app.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/dist/js/demo.js'; ?>"></script>

    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
</body>

</html>