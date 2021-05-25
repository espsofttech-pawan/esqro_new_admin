<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LocalCoinTrade</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'; ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'; ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'; ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('admin/header'); ?>

  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('admin/side_bar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Trade
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <!--<div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
              <h3 class="profile-username text-center">Nina Mcintire</h3>
              <p class="text-muted text-center">Software Engineer</p>
            </div>
          </div>
        </div>-->



        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <!--<li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>-->
              <li class="active"><a href="#settings" data-toggle="tab">Edit Trade</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="settings">

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

                <form class="form-horizontal" method="post" action="">
                  <input type="hidden" name="post_id" value="<?php if($trade['id']){ echo $trade['id']; } ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __webtxt("Trade type"); ?></label>
                    <div class="col-sm-6">
                        <select class="select form-control" id="id_ad-online_provider" onchange="getTradType(this.value);" name="ad_trade_type" >
                           <option <?php echo($trade['trade_type'] == 2)?'selected':''; ?>  required id="id_ad-trade_type_1" value="2" class="add-adform-radio "><?php echo __webtxt("Sell Currency"); ?></option>

                           <option <?php echo($trade['trade_type'] == 1)?'selected':''; ?>  required id="id_ad-trade_type_2" value="1" class="add-adform-radio"><span style="color: #333333;"><?php echo __webtxt("Buy Currency"); ?></span></option>

                        </select>
                    </div>
                    <div class="col-sm-4">
                      <?php echo __webtxt("What kind of trade advertisement do you wish to create ?"); ?>
                    </div>
                  </div>

<!--                   <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __webtxt("Country"); ?></label>
                    <div class="col-sm-6">
                         <select class="select form-control countryId" id="" name="country_name" >
                            <option value="">Select Country</option>
                            <?php
                               foreach($countrys as $country)
                               {
                            ?>
                            <option value="<?= $country['name']; ?>" data-cid="<?= $country['id']; ?>" <?php echo (!empty($trade['location']) ? ($trade['location'] == $country['name'] ? 'selected' : '') : ''); ?> ><?= $country['name']; ?></option>
                            <?php } ?>
                         </select>
                    </div>
                    <div class="col-sm-4"></div>
                  </div> -->

<!--                   <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __webtxt("State"); ?></label>
                    <div class="col-sm-6">
                         <select class="select form-control" id="" name="state_name" >
                            <option value="">Select States</option>
                            <?php
                              $stateQry = "SELECT * FROM states";
                              $stateRes = $this->db->query($stateQry)->result_array();
                               foreach($stateRes as $sValue)
                               {
                            ?>
                            <option value="<?= $sValue['name']; ?>" data-cid="<?= $sValue['id']; ?>" <?php echo (!empty($trade['stateId']) ? ($trade['stateId'] == $sValue['id'] ? 'selected' : '') : ''); ?> ><?= $sValue['name']; ?></option>
                            <?php } ?>
                         </select>
                    </div>
                    <div class="col-sm-4"></div>
                  </div>  -->

<!--                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __webtxt("City"); ?></label>
                    <div class="col-sm-6">
                         <select class="select form-control" id="" name="city_name" >
                            <option value="">Select City</option>
                            <?php
                              $cityQry = "SELECT * FROM cities";
                              $cityRes = $this->db->query($cityQry)->result_array();
                               foreach($cityRes as $cValues)
                               {
                            ?>
                            <option value="<?= $cValues['name']; ?>" data-cid="<?= $cValues['id']; ?>" <?php echo (!empty($trade['cityId']) ? ($trade['cityId'] == $cValues['idate(format)'] ? 'selected' : '') : ''); ?> ><?= $cValues['name']; ?></option>
                            <?php } ?>
                         </select>
                    </div>
                    <div class="col-sm-4"></div>
                  </div>  -->

                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __webtxt("Price"); ?></label>
                    <div class="col-sm-6">
                        <input type="text" name="price" class="form-control" value="<?php echo (!empty($trade['per_btc_currency_price']) ? $trade['per_btc_currency_price'] : ''); ?>">
                    </div>
                    <div class="col-sm-4">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __webtxt("Min Transaction limit"); ?></label>
                    <div class="col-sm-6">
                        <input type="text" name="min_transac_limit" class="form-control" value="<?php echo (!empty($trade['min_transac_limit']) ? $trade['min_transac_limit'] : ''); ?>">
                    </div>
                    <div class="col-sm-4">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __webtxt("Max Transaction limit"); ?></label>
                    <div class="col-sm-6">
                        <input type="text" name="max_transac_limit" class="form-control" value="<?php echo (!empty($trade['max_transac_limit']) ? $trade['max_transac_limit'] : ''); ?>">
                    </div>
                    <div class="col-sm-4">
                    </div>
                  </div>

                  <?php
                  if(!empty($postTradeInfo['stateId']))
                  {
                  ?>
                    <input type="hidden" value="<?= $postTradeInfo['stateId']; ?>" id="get_stateId" name="stateId">
                    <input type="hidden" value="<?= $postTradeInfo['cityId']; ?>" id="get_cityId" name="cityId">
                  <?php }else{ ?>
                    <input type="hidden" value="" id="get_stateId" name="stateId">
                    <input type="hidden" value="" id="get_cityId" name="cityId">
                  <?php } ?>

                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __webtxt("Payment method"); ?></label>
                    <div class="col-sm-6">
                        <?php 
                           $payment_methods = array("Cash Hand To Hand"=>"Cash Hand To Hand", "CCP/BARIDI MOB"=>"CCP/BARIDI MOB","SQUARE_ALGERIA_ONLINE_PAYMENT"=>"Square Algeria Online Payment","NATIONAL_BANK"=>"National bank transfer","SEPA"=>"SEPA (EU) bank transfer","SPECIFIC_BANK"=>"Transfers with specific bank","INTERNATIONAL_WIRE_SWIFT"=>"International Wire (SWIFT)","OTHER"=>"Other online payment","ECOCASH"=>"EcoCash","HAL_CASH"=>"Hal-cash","SWISH"=>"Swish","VIPPS"=>"Vipps","MOBILEPAY_DANSKE_BANK"=>"MobilePay FI","QIWI"=>"QIWI","CASH_BY_MAIL"=>"Cash by mail","BANK_TRANSFER_IMPS"=>"IMPS Bank Transfer India","PAYTM"=>"PayTM","LYDIA"=>"Lydia","INTERAC"=>"Interac e-transfer","PINGIT"=>"Pingit","PAYM"=>"Paym","PYC"=>"PYC","ALIPAY"=>"Alipay","SUPERFLASH"=>"Superflash","CHASE_QUICKPAY"=>"Chase Quickpay","OKPAY"=>"OKPay","PAYPAL"=>"Paypal","WEBMONEY"=>"WebMoney","MONEYBOOKERS"=>"Moneybookers / Skrill","NETELLER"=>"Neteller","WU"=>"Western Union","PostePay"=>"PostePay","MONEYGRAM"=>"Moneygram","POSTAL_ORDER"=>"Postal order","CASHIERS_CHECK"=>"Cashier's check","VENMO"=>"Venmo","DWOLLA"=>"Dwolla","PERFECT_MONEY"=>"Perfect Money","CASHU"=>"CashU","PAYSAFECARD"=>"PaySafeCard","PAYZA"=>"Payza","ASTROPAY"=>"AstroPay","MPESA_KENYA"=>"M-PESA Kenya (Safaricom)","MPESA_TANZANIA"=>"M-PESA Tanzania (Vodacom)","BPAY"=>"BPAY Bill Payment","GIFT_CARD_CODE"=>"Gift Card Code","GIFT_CARD_CODE_GLOBAL"=>"Gift Card Code (Global)","OTHER_ONLINE_WALLET"=>"Other Online Wallet","OTHER_ONLINE_WALLET_GLOBAL"=>"Other Online Wallet (Global)","OTHER_REMITTANCE"=>"Other Remittance","OTHER_PRE_PAID_DEBIT"=>"Other Pre-Paid Debit Card","GOOGLEWALLET"=>"Google Wallet","GIFT_CARD_CODE_AMAZON"=>"Amazon Gift Card Code","VANILLA"=>"Vanilla","TRANSFERWISE"=>"Transferwise","PAYPALMYCASH"=>"PayPal My Cash","RIA"=>"RIA Money Transfer","SOLIDTRUSTPAY"=>"SolidTrustPay","XOOM"=>"Xoom","MOBILEPAY_DANSKE_BANK_DK"=>"MobilePay","TELEGRAMATIC_ORDER"=>"Telegramatic Order","PAYEER"=>"Payeer","ADVCASH"=>"advcash","GIFT_CARD_CODE_APPLE_STORE"=>"Apple Store Gift Card Code","NETSPEND"=>"NetSpend Reload Pack","HYPERWALLET"=>"hyperWALLET","GIFT_CARD_CODE_STEAM"=>"Steam Gift Card Code","MOBILEPAY_DANSKE_BANK_NO"=>"MobilePay NO","TIGOPESA_TANZANIA"=>"Tigo-Pesa Tanzania","ALTCOIN_DASH"=>"Dash altcoin","ALTCOIN_XRP"=>"Ripple altcoin","PAYONEER"=>"Payoneer","ONECARD"=>"OneCard","SQUARE_CASH"=>"Square Cash","PAXUM"=>"Paxum","CASH_AT_ATM"=>"Cash at ATM","ALTCOIN_LTC"=>"Litecoin altcoin","CREDITCARD"=>"Credit card","ALTCOIN_XMR"=>"Monero altcoin","WECHAT"=>"WeChat","RELOADIT"=>"Reloadit","WALMART2WALMART"=>"Walmart 2 Walmart","GIFT_CARD_CODE_WALMART"=>"Walmart Gift Card Code","EASYPAISA"=>"Easypaisa","SERVE2SERVE"=>"Serve2Serve","WORLDREMIT"=>"Worldremit","ALTCOIN_ETH"=>"Ethereum altcoin","GIFT_CARD_CODE_EBAY"=>"Ebay Gift Card Code","GIFT_CARD_CODE_STARBUCKS"=>"Starbucks Gift Card Code","YANDEXMONEY"=>"Yandex Money");
                        ?>
                        <select class="select form-control" id="payment_method" name="payment_method"><!-- name="ad_online_provider" -->
                           <?php 
                              foreach ($payment_methods as $key => $value) 
                                 { ?>
                            <option value="<?= $key; ?>" <?php if(!empty($trade['payment_method'])) { if($trade['payment_method'] == $value ){ echo "selected"; }} ?> ><?= $value; ?></option>
                        <?php }
                           ?>
                        </select>
                    </div>
                    <div class="col-sm-4"></div>
                  </div>
    
                 <script type="text/javascript">
                      $('#payment_method').on('change', function(){
                         var payment_method = $(this).val();
                         if(payment_method != "Cash Hand To Hand")
                         {
                            $('#denomination_div').hide();
                            $('#ad_denomination').find($('option')).attr('selected',false);
                         }
                         else{
                            $('#denomination_div').show();
                         }
                      }).trigger('change')
                   </script>


                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __webtxt("Opening hours"); ?></label>
                    <div class="col-sm-6">
                      <div class="col-sm-2">
                        Sun
                      </div>
                      <div class="col-sm-2">
                        <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_0" name="ad_opening_hours_sun_start" style="width: auto;">
                                 <option value=""><?php echo __webtxt("start"); ?></option>
                                 <?php 
                                    timings('sun','start', @$trade['sun_start']);
                                  ?>
                              </select>
                      </div>
                      <div class="col-sm-2">
                              <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_1" name="ad_opening_hours_sun_end" style="width: auto;" >
                                 <option value="" ><?php echo __webtxt("end"); ?></option>
                                 <?php 
                                    timings('sun','end', @$trade['sun_end']);
                                  ?>
                              </select>
                      </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <div class="col-sm-2">
                        Mon
                      </div>
                      <div class="col-sm-2">
                        <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_0" name="ad_opening_hours_mon_start" style="width: auto;">
                                 <option value=""><?php echo __webtxt("start"); ?></option>
                                 <?php 
                                    timings('mon','start', @$trade['mon_end']);
                                  ?>
                              </select>
                      </div>
                      <div class="col-sm-2">
                              <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_1" name="ad_opening_hours_mon_end" style="width: auto;" >
                                 <option value="" ><?php echo __webtxt("end"); ?></option>
                                 <?php 
                                    timings('mon','end', @$trade['mon_end']);
                                  ?>
                              </select>
                      </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <div class="col-sm-2">
                        Tue
                      </div>
                      <div class="col-sm-2">
                        <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_0" name="ad_opening_hours_tue_start" style="width: auto;">
                                 <option value=""><?php echo __webtxt("start"); ?></option>
                                 <?php 
                                    timings('tue','start', @$trade['tue_start']);
                                  ?>
                              </select>
                      </div>
                      <div class="col-sm-2">
                              <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_1" name="ad_opening_hours_tue_end" style="width: auto;" >
                                 <option value="" ><?php echo __webtxt("end"); ?></option>
                                 <?php 
                                    timings('tue','end', @$trade['tue_end']);
                                  ?>
                              </select>
                      </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <div class="col-sm-2">
                        Wed
                      </div>
                      <div class="col-sm-2">
                        <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_0" name="ad_opening_hours_wed_start" style="width: auto;">
                                 <option value=""><?php echo __webtxt("start"); ?></option>
                                 <?php 
                                    timings('wed','start', @$trade['wed_start']);
                                  ?>
                              </select>
                      </div>
                      <div class="col-sm-2">
                              <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_1" name="ad_opening_hours_wed_end" style="width: auto;" >
                                 <option value="" ><?php echo __webtxt("end"); ?></option>
                                 <?php 
                                    timings('wed','end', @$trade['wed_end']);
                                  ?>
                              </select>
                      </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <div class="col-sm-2">
                        Thu
                      </div>
                      <div class="col-sm-2">
                        <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_0" name="ad_opening_hours_thu_start" style="width: auto;">
                                 <option value=""><?php echo __webtxt("start"); ?></option>
                                 <?php 
                                    timings('thu','start', @$trade['thu_start']);
                                  ?>
                              </select>
                      </div>
                      <div class="col-sm-2">
                              <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_1" name="ad_opening_hours_thu_end" style="width: auto;" >
                                 <option value="" ><?php echo __webtxt("end"); ?></option>
                                 <?php 
                                    timings('thu','end', @$trade['thu_end']);
                                  ?>
                              </select>
                      </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <div class="col-sm-2">
                        Fri
                      </div>
                      <div class="col-sm-2">
                        <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_0" name="ad_opening_hours_fri_start" style="width: auto;">
                                 <option value=""><?php echo __webtxt("start"); ?></option>
                                 <?php 
                                    timings('fri','start', @$trade['fri_start']);
                                  ?>
                              </select>
                      </div>
                      <div class="col-sm-2">
                              <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_1" name="ad_opening_hours_fri_end" style="width: auto;" >
                                 <option value="" ><?php echo __webtxt("end"); ?></option>
                                 <?php 
                                    timings('fri','end', @$trade['fri_end']);
                                  ?>
                              </select>
                      </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <div class="col-sm-2">
                        Sat
                      </div>
                      <div class="col-sm-2">
                        <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_0" name="ad_opening_hours_sat_start" style="width: auto;">
                                 <option value=""><?php echo __webtxt("start"); ?></option>
                                 <?php 
                                    timings('sat','start', @$trade['sat_start']);
                                  ?>
                              </select>
                      </div>
                      <div class="col-sm-2">
                              <select class="hoursofdaywidget form-control" required id="id_ad-opening_hours_0_1" name="ad_opening_hours_sat_end" style="width: auto;" >
                                 <option value="" ><?php echo __webtxt("end"); ?></option>
                                 <?php 
                                    timings('sat','end', @$trade['sat_end']);
                                  ?>
                              </select>
                      </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __webtxt("Denomination"); ?></label>
                    <div class="col-sm-6">
                       <select class="select form-control" id="ad_denomination" name="ad_denomination" >
                        <option value="" selected="">- Select -</option>
                           <option <?php echo (!empty($trade['denomination']) ? ($trade['denomination'] == 'High'  ? 'selected' : '') : ''); ?>  required id="id_ad-trade_type_1" value="High" class="add-adform-radio "><?php echo __webtxt("High"); ?></option>

                           <option <?php echo (!empty($trade['denomination']) ? ($trade['denomination'] == 'Small' ? 'selected' : '') : ''); ?>  required id="id_ad-trade_type_1" value="Small" class="add-adform-radio "><?php echo __webtxt("Small"); ?></option>

                           <option <?php echo (!empty($trade['denomination']) ? ($trade['denomination'] == 'Panachée' ? 'selected' : '') : ''); ?>  required id="id_ad-trade_type_1" value="Panachée" class="add-adform-radio "><?php echo __webtxt("Panachée"); ?></option>

                            <option <?php echo (!empty($trade['denomination']) ? ($trade['denomination'] == 'Coins' ? 'selected' : '') : ''); ?>  required id="id_ad-trade_type_1" value="Coins" class="add-adform-radio "><?php echo __webtxt("Coins"); ?></option>

                           
                        </select>
                    </div>
                    <div class="col-sm-4">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo __webtxt("Terms of trade"); ?></label>
                    <div class="col-sm-6">
                      <textarea required class="textarea form-control" cols="40" id="id_ad-other_info" name="ad_other_info" rows="10"><?php echo (!empty($trade['term_of_trad']) ? $trade['term_of_trad'] : ''); ?></textarea>
                    </div>
                    <div class="col-sm-4">
                       
                    </div>
                  </div>
                  <input type="hidden" name="form_submit" value="1">
                  <button type="submit" name="updateTrade" class="btn btn-info">Update</button>

                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

  <?php $this->load->view('admin/footer'); ?>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- <script src="<?php echo base_url().'assets/bootstrap/'; ?>js/jquery.min.js"></script>  -->


</body>
</html>
