<?php echo doctype("html5"); echo "\n"; ?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title?></title>

   <link rel="stylesheet" href="<?php echo base_url();?>CSS/jquery-ui.css">
   <link rel="stylesheet" href="<?php echo base_url();?>CSS/styles.css">
   <link rel="stylesheet" href="<?php echo base_url();?>CSS/combobox.css">

   <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>cssui/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>cssui/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>cssui/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  
   <script src = "<?php echo base_url();?>JS/jQuery.js"></script>
   <script src = "<?php echo base_url();?>JS/JqueryUI.js"></script>
   <script src = "<?php echo base_url();?>JS/combobox.js"></script>
   <script src = "<?php echo base_url();?>JS/simple_modal.js"></script>
   <script src = "<?php echo base_url();?>JS/script.js"></script>
   
</head>
<body>


    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
                <a class="navbar-brand" href="<?php echo base_url();?>dashboard/">
                <img src="http://localhost/afgym/members/Images/adrenaline.jpg" alt="logo" style="display: initial !important;
                	width: 133px;
                	height: 31px;">
                	IGym
                </a>
            </div>
            <div>
            <!-- For the  right -->
                 <ul class="nav navbar-right top-nav pull-right" id="gone-when-small">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                            <?php 
                                $firstname = $this->session->userdata('first_name');
                                $lastname = $this->session->userdata('last_name');
                                echo $firstname . " " . $lastname;
                                echo "<!--<span class='usertype-header'>";
                                $usertype = $this->session->userdata('user_type');
                                switch($usertype){
                                case '1': echo "Super Admin"; break;
                                case '2': echo "Admin"; break;
                                case '3': echo "Management"; break;
                                case '4': echo "Staff"; break;
                                case '5': echo "Warehouse Staff"; break;
                                default: echo "Developer"; break;
                            }
                            echo "</span>-->";?>

                         <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" onClick="osxProfile()"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#" onClick="osxPassword()"><i class="fa fa-fw fa-gear"></i> Change Password</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url();?>login/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
           
            <div class="collapse navbar-ex1-collapse"> <!-- collapse navbar-collapse -->
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?=base_url()?>dashboard/">
                         Dashboard <i class="pull-right fa fa-fw fa-dashboard"></i>
                         </a>
                    </li>
                    <li>
                        <a href="#">
                       Graphs  <i class="pull-right fa fa-fw fa-bar-chart-o"></i></a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>users/">
                       Members  <i class="pull-right fa fa-fw fa-table"></i></a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>employees/">
                        Staff <i class="pull-right fa fa-fw fa-table"></i></a>
                    </li>
                    <span>More</span>
                    </hr>
                    <li>
                        <a href="#">
                        Calendar <i class="pull-right fa fa-fw fa-table"></i></a>
                    </li>
                    <li>
                        <a href="http://localhost/afgym/admin">
                        Front End Admin <i class="pull-right fa fa-fw fa-desktop"></i></a>
                    </li>
                    <li>
                        <a href="http://localhost/afgym">
                       Gym Web Site  <i class="pull-right fa fa-fw fa-desktop"></i></a>
                    </li>
                    <li class="toggle-link" id="sidenav-toggle">
                        <a href="#">
                        Collapse  <i class="pull-right fa fa-fw fa-arrow-circle-left fa-fw"></i> </a>
                    </li>
                    <li class="dropdown" id="gone-when-big">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                		<?php 
							$firstname = $this->session->userdata('first_name');
							$lastname = $this->session->userdata('last_name');
							echo $firstname . " " . $lastname;
							echo "<!--<span class='usertype-header'>";
							switch($usertype){
							case '1': echo "Super Admin"; break;
							case '2': echo "Admin"; break;
							case '3': echo "Management"; break;
							case '4': echo "Staff"; break;
							case '5': echo "Warehouse Staff"; break;
							default: echo "Developer"; break;
						}
						echo "</span>-->";?>

                     <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" onClick="osxProfile()"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#" onClick="osxPassword()"><i class="fa fa-fw fa-gear"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url();?>login/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <!-- End of New UI -->
     <!--    
	<header class="main_header">
		<div class = "logo">
			<img src="<?php echo base_url(); ?>Images/adrenaline.jpg" alt="logo">
		</div>
		<div class="username">
		<img src="<?php echo base_url();?>/Images/icon_user_white.png" alt="user">
		
		<p><strong><?php 
			$firstname = $this->session->userdata('first_name');
			$lastname = $this->session->userdata('last_name');
			echo $firstname . " " . $lastname;?></strong><br>
		<?php 
			$usertype = $this->session->userdata('user_type');
			switch($usertype){
			case '1': echo "Super Admin"; break;
			case '2': echo "Admin"; break;
			case '3': echo "Management"; break;
			case '4': echo "Staff"; break;
			case '5': echo "Warehouse Staff"; break;
			default: echo "Developer"; break;
		}?>
		</p>
		<ul class = "user-sub_menu sub_menu">
			<a href="#"><li onClick="osxProfile()">User Profile</li></a>
			<a href="#"><li onClick="osxPassword()">Change Password</li></a>
			<a href="<?php echo base_url();?>login/logout"><li>Logout</li></a>
		</ul>
		</div>
	</header>

		<nav class="main_nav">
			<ul>
           	 	<a href="<?=base_url()?>users/"><li class="nav_button">User Account</li></a>
            	<a href="<?=base_url()?>employees/"><li class="nav_button">Employees</li></a>
            	<a href="<?=base_url()?>members/"><li class="nav_button">Members</li></a> -->
                <!--<li class="nav_button"><a href="<?=base_url()?>inventory/">Inventory</a></li>
                <li class="nav_button"><a>Logistics &#x25BE;</a>
					<ul class = "sub_menu">
						<a href="<?php echo base_url();?>wa/"><li>Withdrawal</li></a>
						<a href="<?php echo base_url();?>ra/"><li>Receiving</li></a>
					</ul>
				</li>
				<li class="nav_button"><a>Lists &#x25BE;</a>
					<ul class = "sub_menu">
						<a href="<?php echo base_url();?>users/"><li>Users</li></a>
						<a href="<?php echo base_url();?>customers/"><li>Customers</li></a>
						<a href="<?php echo base_url();?>suppliers/"><li>Suppliers</li></a>
						<a href="<?php echo base_url();?>products/"><li>Products</li></a>
						<a href="<?php echo base_url();?>warehouses/"><li>Warehouses</li></a>
						<a href="<?php echo base_url();?>vessels/"><li>Vessels</li></a>
						<a href="<?php echo base_url();?>trucks/"><li>Trucks</li></a>
						<a href="<?php echo base_url();?>operators/"><li>Operators</li></a>
					</ul>
				</li>-->
			</ul>
		</nav>

		<!-- MODAL CONTAINERS -->
		<div id="osx_view">
			<div class = "osx_title display_none" id="osx_view_title"></div>
			<div class="close display_none"><a href="#" class="simplemodal-close">x</a></div>
			<div class = "osx_data display_none" id="osx_view_data"></div>
		</div>

		<script>
			function osxProfile(){
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("cPanel/view_profile");?>',
					success: function(msg){
						$('#osx_view_title').html("View Profile");
						$('#osx_view_data').html(msg);
					}
				});
				OSX2.init();
			}
			function osxPassword(){
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url("cPanel/password");?>',
					success: function(msg){
						$('#osx_view_title').html("Change Password");
						$('#osx_view_data').html(msg);
					}
				});
				OSX2.init();
			}
		</script>

      <div id="page-content-wrapper">
       
        <div class="page-content inset">