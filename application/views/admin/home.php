        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Dashboard
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
                        <!-- small box -->
                        <h2 style="text-align: center;">Welcome ! EsqroCrypto </h2>
                    </div>
                </div>

                <div class="row">
                    <a href="<?php echo base_url('home/user_list') ?>">
                        <div class="col-lg-3 col-xs-3">
                            <div style="height: 140px;background: #4475ec;color: white;" class="panel panel-success">
                              <div class="panel-body">
                                <h3><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;Total Users</h3>
                                <h2><?php if(!empty($totalUsers)){ echo $totalUsers; } ?></h2>
                              </div>
                            </div>                    
                        </div>
                    </a>

                    <a href="<?php echo base_url('trade/open_trades_buy') ?>">
                        <div class="col-lg-3 col-xs-3">
                            <div style="height: 140px;background: #001548;color: white;" class="panel panel-success">
                              <div class="panel-body">
                                <h3><i class="fa fa-industry" aria-hidden="true"></i>&nbsp;&nbsp;Total Trades</h3>
                                <h2><?php if(!empty($tradeRequest)){ echo $tradeRequest; } ?></h2>
                              </div>
                            </div>                    
                        </div>
                    </a>

                        <div class="col-lg-3 col-xs-3">
                            <div style="height: 140px;background: #508db9;color: white;" class="panel panel-success">
                              <div class="panel-body">
                                <h3><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Total Buy</h3>
                                <h2><?php if(!empty($totalBuy['token_amount'])){ echo $totalBuy['token_amount']; }else{ echo "0"; } ?> Qoin</h2>
                              </div>
                            </div>                    
                        </div>

                        <div class="col-lg-3 col-xs-3">
                            <div style="height: 140px;background: #15ce70;color: white;" class="panel panel-success">
                              <div class="panel-body">
                                <h3><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Total Sell</h3>
                                <h2><?php if(!empty($totalSell['token_amount'])){ echo $totalSell['token_amount']; }else{ echo "0"; } ?> Qoin</h2>
                              </div>
                            </div>                    
                        </div>
                </div>
            </section>
        </div>
        <script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.2.0.min.js'; ?>"></script>