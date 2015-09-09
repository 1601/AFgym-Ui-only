<?php echo doctype("html5"); echo "\n"; ?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>

   <link rel="stylesheet" href="<?php echo base_url();?>CSS/jquery-ui.css">
   <link rel="stylesheet" href="<?php echo base_url();?>CSS/styles.css">
   <link rel="stylesheet" href="<?php echo base_url();?>CSS/combobox.css">
  
   <script src = "<?php echo base_url();?>JS/jQuery.js"></script>
   <script src = "<?php echo base_url();?>JS/JqueryUI.js"></script>
   <script src = "<?php echo base_url();?>JS/combobox.js"></script>
   <script src = "<?php echo base_url();?>JS/simple_modal.js"></script>
   <script src = "<?php echo base_url();?>JS/script.js"></script>
   
</head>
<body>

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
            	<a href="<?=base_url()?>members/"><li class="nav_button">Members</li></a>
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

