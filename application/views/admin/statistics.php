<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Square Algeria | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'; ?>">
    

<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.class">


      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'; ?>">
      <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'; ?>">

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php $this->load->view('admin/header'); ?>

        <?php $this->load->view('admin/side_bar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Statistics Management
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12 col-xs-12">


                        <!-- Table code start -->
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Statistics Management</h3>
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

                      <form class="form-horizontal" method="post" action="" id="formId" autocomplete="off">
                          <div class="row">
                      
                          <script type="text/javascript" src="<?php echo base_url() ?>assets/datepicker/lib/bootstrap-datepicker.js"></script>
                          <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datepicker/lib/bootstrap-datepicker.css" />


                              <div class="col-md-3">
                                  <div class="form-group">
                                    <div class="col-sm-11">
                                      <p id="datepairExample1">
                                              <input type="text" id="start_date" name="start_date" placeholder="Start Date" class="date start" />
                                            </p>
                                            <script>
                                            $('#datepairExample1 .date').datepicker({
                                              'format': 'm/d/yyyy',
                                              'autoclose': true
                                            });
                                            </script>
                                    </div>
                                  </div>
                              </div>

                              <div class="col-md-3">
                                  <div class="form-group">
                                    <div class="col-sm-11">
                                      <p id="datepairExample1">
                                              <input type="text" id="end_date" name="end_date" placeholder="End Date" class="date start" />
                                            </p>
                                            <script>
                                            $('#datepairExample1 .date').datepicker({
                                              'format': 'm/d/yyyy',
                                              'autoclose': true
                                            });
                                            </script>
                                    </div>
                                  </div>
                              </div>

                              <div class="col-md-3">
                                  <div class="form-group">
                                    <div class="col-sm-11">
                                      <select name="country" class="form-control">
                                        <option value="">Select Country</option>
                                        <?php foreach ($countries as $key => $value) { ?>
                                            <option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
                                        <?php  } ?>
                                      </select>
                                    </div>
                                  </div>
                              </div>

                              <div class="col-md-3">
                                  <div class="form-group">
                                    <div class="col-sm-11">
                                      <select name="state" class="form-control">
                                        <option  value="">Select State</option>
                                        <?php foreach ($states as $key => $value) { ?>
                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                        <?php  } ?>
                                      </select>
                                    </div>
                                  </div>
                              </div>

                              <div class="col-md-3">
                                  <div class="form-group">
                                    <div class="col-sm-11">
                                      <select name="city" class="form-control">
                                        <option  value="">Select City </option>
                                        <?php foreach ($cities as $key => $value) { ?>
                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                        <?php  } ?>
                                      </select>
                                    </div>
                                  </div>
                              </div>

                              <div class="col-md-3">
                                  <div class="form-group">
                                    <div class="col-sm-11">
                                      <select name="status" class="form-control">
                                        <option  value="">Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Complete">Complete</option>
                                        <option value="Cancelled">Cancelled</option>
                                      </select>
                                    </div>
                                  </div>
                              </div>


                              <div class="col-md-3">
                                  <div class="form-group">
                                    <div class="col-sm-11">
                                      <button style="" type="submit" id="subbtn" value="update reseller profile" class="btn btn-info" name="searchData">Search</button> 
                                    </div>
                                  </div>
                              </div>
                          </div>    
                      </form>

                      <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                          <tr>
                            <th>S.No</th>
                            <th>Date</th>
                            <th>Trade Type</th>
                            <th>Buyer & Seller</th>
                            <th>Price</th>
                            <th>Trade Limits</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Status</th>
                            <!-- <th>Payment Method</th> -->
                            <th width="300px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if(!empty($all_trade))
                          {
                            // echo "<pre>";
                            // print_r($all_trade);
                          $i = 1;
                          foreach ($all_trade as $key => $arr)
                          {
                            if($arr['trade_type'] == "1")
                            {
                              $trade_type = "Buy";
                            }
                            else{
                              $trade_type = "Sell";
                            }
                          ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?= $arr['created_date']; ?></td>
                            <td><?= $trade_type; ?></td>
                            <td><?= $arr['user_name']; ?></td>
                            <td><?= $arr['per_btc_currency_price']; ?></td>
                            <td><?= $arr['min_transac_limit']." - ".$arr['max_transac_limit']; ?></td>
                            <td><?= $arr['location']; ?></td>
                            <td><?php $stateID = $arr['stateId'];
                                  if($stateID){
                                      $stateQry = "SELECT * FROM states WHERE id = '$stateID' ";
                                      $stateRes = $this->db->query($stateQry)->row_array();
                                      if($stateRes){
                                        echo $stateRes['name'];
                                      }
                                  }
                             ?></td>
                            <td><?php $cityId = $arr['cityId'];
                                  if($cityId){
                                      $cityQry = "SELECT * FROM states WHERE id = '$cityId' ";
                                      $cityRes = $this->db->query($cityQry)->row_array();
                                      if($cityRes){
                                        echo $cityRes['name'];
                                      }
                                  }
                             ?></td>
                            <!-- <td><?= $arr['payment_method']; ?></td> -->
                            <td><?php if($arr['status'] == 0 ){
                                echo "INACTIVE";
                            }else if($arr['status'] == 1 ){
                                echo "ACTIVE";
                            }else if($arr['status'] == 2 ){
                                echo "COMPLETE";
                            }else if($arr['status'] == 3 ){
                                echo "CANCELLED";
                            } ?></td>
                            <td>
                              <a type="button" href="javascript:void(0);" class="preview_this" data-toggle="modal" data-target="#tradePreview<?php echo $arr['id'] ?>" value="<?= base64_encode($arr['id']); ?>" >Preview</a> 
                            </td>
                          </tr>
                          <?php
                          $i++;
                          }
                          }
                          ?>
                          
                        </tbody>
                      </table>

                      <script type="text/javascript">
                      $(document).ready(function() {
                          $('#example').DataTable( {
                              dom: 'Bfrtip',
                              buttons: [
                                  'excel'
                              ]
                          } );
                      } );
                      </script>

                    </div>
                  </div>
                        <!-- Table code close -->

                    </div>
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>
        

    <?php if(!empty($all_trade)){
            $timing_Arr = array(
              '0' => '00:00',
              '1' => '00:30',
              '2' => '01:00',
              '3' => '01:30',
              '4' => '02:00',
              '5' => '02:30',
              '6' => '03:00',
              '7' => '03:30',
              '8' => '04:00',
              '9' => '04:30',
              '10' => '05:00',
              '11' =>'05:30',
              '12' =>'06:00',
              '13' =>'06:30',
              '14' =>'07:00',
              '15' =>'07:30',
              '16' =>'08:00',
              '17' =>'08:30',
              '18' =>'09:00',
              '19' =>'09:30',
              '20' =>'10:00',
              '21' =>'10:30',
              '22' =>'11:00',
              '23' =>'11:30',
              '24' =>'12:00',
              '25' => '12:30',
              '26' => '13:00',
              '27' => '13:30',
              '28' => '14:00',
              '29' => '14:30',
              '30' => '15:00',
              '31' => '15:30',
              '32' => '16:00',
              '33' => '16:30',
              '34' =>'17:00',
              '35' => '17:30',
              '36' => '18:00',
              '37' => '18:30',
              '38' =>'19:00',
              '39' => '19:30',
              '40' => '20:00',
              '41' => '20:30',
              '42' => '21:00',
              '43' => '21:30',
              '44' => '22:00',
              '45' => '22:30',
              '46' => '23:00',
              '47' => '23:30'
            );

            function get_start_end_time($time_id, $time_arr)
            {
              for($i=0; $i<sizeof($time_arr); $i++)
              {
                if($time_id == $i)
                {
                  return $time_arr[$i];
                }
              }
            }

      foreach ($all_trade as $key => $arr){ ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="tradePreview<?php echo $arr['id'] ?>">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="modal_heading">Trade Preview</h4>
          </div>
          <input type="hidden" name="trad_id" id="trad_id">
          <div class="modal-body" id="preview_div">
            <table class="table table-bordered">
              <tr>
                <th>Username</th>
                <td><?php echo $arr['user_name'] ?></td>
              </tr>
               <tr>
                <th>Email</th>
                <td><?php echo $arr['email'] ?></td>
              </tr>
               <tr>
                <th>Trade Type</th>
                <td><?php echo($arr['trade_type']==1)?'BUY':'SELL'; ?></td>
              </tr>
               <tr>
                <th>Trade Category</th>
                <td><?php echo($arr['trade_category']==1)?'Online':'Offline';  ?></td>
              </tr>
               <tr>
                <th>Location</th>
                <td><?php echo $arr['location'] ?></td>
              </tr>
               <tr>
                <th>Currency</th>
                <td><?php echo $arr['currency'] ?></td>
              </tr>
               <tr>
                <th>Currency Price</th>
                <td><?php echo $arr['per_btc_currency_price'] ?></td>
              </tr>
               <tr>
                <th>Payment Method</th>
                <td><?php echo $arr['payment_method'] ?></td>
              </tr>
               <tr>
                <th>Min Transaction Limit</th>
                <td><?php echo $arr['min_transac_limit'] ?></td>
              </tr>
               <tr>
                <th>Max Transaction Limit</th>
                <td><?php echo $arr['max_transac_limit'] ?></td>
              </tr>
               <tr>
                <th>Terms of trade</th>
                <td><?php echo $arr['term_of_trad'] ?></td>
              </tr>
            </table>

            <center><h4><b>Opening Time</b></h4></center>
            <table class="table">
              <tr>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
              </tr>
              <tr>
                <td>Sun</td>
                <td><?= get_start_end_time($arr['sun_start'], $timing_Arr); ?></td>
                <td><?= get_start_end_time($arr['sun_end'], $timing_Arr); ?></td>
              </tr>
              <tr>
                <td>Mon</td>
                <td><?= get_start_end_time($arr['mon_start'], $timing_Arr); ?></td>
                <td><?= get_start_end_time($arr['mon_start'], $timing_Arr); ?></td>
              </tr>
              <tr>
                <td>Tue</td>
                <td><?= get_start_end_time($arr['tue_start'], $timing_Arr); ?></td>
                <td><?= get_start_end_time($arr['tue_start'], $timing_Arr); ?></td>
              </tr>
              <tr>
                <td>Wed</td>
                <td><?= get_start_end_time($arr['wed_start'], $timing_Arr); ?></td>
                <td><?= get_start_end_time($arr['wed_start'], $timing_Arr); ?></td>
              </tr>
              <tr>
                <td>Thu</td>
                <td><?= get_start_end_time($arr['thu_start'], $timing_Arr); ?></td>
                <td><?= get_start_end_time($arr['thu_start'], $timing_Arr); ?></td>
              </tr>
              <tr>
                <td>Fri</td>
                <td><?= get_start_end_time($arr['fri_start'], $timing_Arr); ?></td>
                <td><?= get_start_end_time($arr['fri_start'], $timing_Arr); ?></td>
              </tr>
              <tr>
                <td>Sat</td>
                <td><?= get_start_end_time($arr['sat_start'], $timing_Arr); ?></td>
                <td><?= get_start_end_time($arr['sat_start'], $timing_Arr); ?></td>
              </tr>
            </table>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <!-- <a class="btn btn-primary">Modify</a> -->
          </div>
        </div>
      </div>
    </div>
    <?php } } ?>

        <?php $this->load->view('admin/footer'); ?>


        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.0 -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.2.0.min.js'; ?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

    <!-- SlimScroll -->
    <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'; ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/dist/js/app.min.js'; ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url().'assets/dist/js/demo.js'; ?>"></script>

    <script type="text/javascript">
      $('#trade_advertisement').addClass('active');
    </script>

    <script type="text/javascript">

  $('.preview_this').click(function()
      {
        var trad_id = $(this).val();
        $.ajax({
            method:'POST',
            url:'<?= base_url("admin/getThisPartyDetail"); ?>',
            data:{
                  trad_id:trad_id,
            },
            // dataType : 'json',
            success:function(data)
            {
              console.clear();
              // console.log(data);
              if(data)
              {
                $('#submit_btn').html('Update Party');
                $('#submit_btn').attr('name', 'update_record');
              }
            }
        });
      });
</script>

<script type="text/javascript">
    $('input[type="date"]').change(function(){
            $("#start_date").attr("required", "true");
            $("#end_date").attr("required", "true");
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            if(start_date && end_date ){
                $("#subbtn").click()
            }
        });
</script>
</body>

</html>

