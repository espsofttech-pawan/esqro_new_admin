<?php
    $user_role = $this->session->userdata("user_role");
    $method = $this->router->fetch_class();
    $user_id = $this->session->userdata("user_id");
?>

    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">

                <li id="dashboard" class="<?php if($method=='index'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url().'home'; ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard </span>
                    </a>
                </li>

                <li id="dashboard" class="<?php if($method=='user_list'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url().'home/user_list'; ?>">
                        <i class="fa fa-users"></i> <span>Users List </span>
                    </a>
                </li>

                <li class="<?php if($method=='my_profile'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url().'home/my_profile/'.base64_encode($user_id); ?>">
                        <i class="fa fa-th"></i> <span>My Profile</span>
                    </a>
                </li>

                 <li id="trade_advertisement" class="<?php if($method=='all_trade_advertisement'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url().'trade/all_trade_advertisement'; ?>">
                        <i class="fa fa-area-chart"></i> <span>Offers</span>
                    </a>
                </li>

                <li id="page_management" class="treeview <?php if($method=='open_trades_buy' || $method=='ongoing_trades_buy' || $method=='completed_trade_buy' || $method=='cancelled_trade_buy' ){ echo 'active'; } ?>">
                    <a href="#">
                        <i class="fa fa-exchange"></i>
                        <span>Buy Requests</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($method=='open_trades_buy'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>trade/open_trades_buy"><i class="fa fa-circle-o"></i>Open Trades</a></li>

                        <li class="<?php if($method=='ongoing_trades_buy'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>trade/ongoing_trades_buy"><i class="fa fa-circle-o"></i>Ongoing Trades</a></li>

                        <li class="<?php if($method=='completed_trade_buy'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>trade/completed_trade_buy"><i class="fa fa-circle-o"></i>Completed Trades</a></li>

                        <li class="<?php if($method=='cancelled_trade_buy'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>trade/cancelled_trade_buy"><i class="fa fa-circle-o"></i>Cancelled Trades</a></li>

                    </ul>
                </li>   

                <li id="page_management" class="treeview <?php if($method=='open_trades_sell' || $method=='ongoing_trades_sell' || $method=='completed_trade_sell' || $method=='cancelled_trade_sell' ){ echo 'active'; } ?>">
                    <a href="#">
                        <i class="fa fa-exchange"></i>
                        <span>Sell Requests</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($method=='open_trades_sell'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>trade/open_trades_sell"><i class="fa fa-circle-o"></i>Open Trades</a></li>

                        <li class="<?php if($method=='ongoing_trades_sell'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>trade/ongoing_trades_sell"><i class="fa fa-circle-o"></i>Ongoing Trades</a></li>

                        <li class="<?php if($method=='completed_trade_sell'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>trade/completed_trade_sell"><i class="fa fa-circle-o"></i>Completed Trades</a></li>

                        <li class="<?php if($method=='cancelled_trade_sell'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>trade/cancelled_trade_sell"><i class="fa fa-circle-o"></i>Cancelled Trades</a></li>

                    </ul>
                </li>

                <li class="<?php if($method=='kycManagement'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url().'kycManagement'; ?>">
                        <i class="fa fa-file-image-o"></i> <span>KYC Management </span>
                    </a>
                </li>

                <li class="<?php if($method=='setting'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url().'setting'; ?>">
                        <i class="fa fa-cog"></i> <span>Setting</span>
                    </a>
                </li>

                <li class="<?php if($method=='newsletter'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url().'support/newsletter'; ?>">
                        <i class="fa fa-mobile"></i> <span>Newsletter</span>
                    </a>
                </li>                

                <li class="<?php if($method=='support/contact_us'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url().'support/contact_us'; ?>">
                        <i class="fa fa-th"></i> <span>Contact Us</span>
                    </a>
                </li>

                <li class="<?php if($method=='support/index'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url().'support'; ?>">
                        <i class="fa fa-th"></i> <span>Support Requests</span>
                    </a>
                </li>


                <li id="page_management" class="treeview <?php if($method=='FrontendContent'){ echo 'active'; } ?>">
                    <a href="#">
                        <i class="fa fa-caret-square-o-left"></i>
                        <span>Content Management</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($method=='FrontendContent'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>FrontendContent"><i class="fa fa-circle-o"></i>Home</a></li>

                        <li class="<?php if($method=='support_category'){ echo 'active'; } ?>"><a href="<?php echo base_url();?>frontendContent/support_category"><i class="fa fa-circle-o"></i>Support Category</a></li>

                    </ul>
                </li>

                <li class="<?php if($method=='logout'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url().'home/logout'; ?>">
                        <i class="fa fa-sign-out"></i> <span>Logout</span>
                    </a>
                </li>

            </ul>
        </section>
    </aside>