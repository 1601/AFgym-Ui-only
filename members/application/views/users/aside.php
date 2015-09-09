<section class="main_container">
	<aside class = "sidebar">
		<h3><?php echo $page_header;?></h3>
		<ul>
			<!-- <a href="<?php echo base_url();?>roles/"><li class="aside_button">&#x25B8; Roles</li></a> -->
			<a href="<?php echo base_url();?>users/display"><li class="aside_button">&#x25B8; All (<?php echo $count_all;?>)</li></a>
			<li class="aside_button" onclick = "initializeModal()">&#x25B8; Create User</li>
			<li class="aside_button" id="trigger_deactivate">&#x25B8; Deactivate User</li>
				<div class="aside_sublist" id="deactivate">
					<h1> DEACTIVATE USER </h1>
					<p class = "prompt">User ID:</p>
					
					<?php
						echo form_open('users/deactivate_user');
						echo form_dropdown('UserID', $user_ids, "0", "id='id'");?>
				
						<p class = "prompt">Username:</p>
					
					<?php	
						echo form_dropdown('Username', $user_names, "0", "id='name'");
						echo form_checkbox('sure', '', FALSE, 'id ="sure"');?>
					
					<p class="sure">Are you sure?</p>
					
					<?php
						echo form_submit('deactivate', 'Deactivate', 'disabled id="deactivate_button"');
						echo form_close();?>
				</div>
				<form onsubmit="window.location = '<?php echo base_url();?>users/display/?search_string=' + $('#search-str').val();  return false;">
					<input type = 'text' id="search-str" placeholder="Search user" name="search_string" class="input-search">
					<input type = 'submit'  class="submit-enter">
				</form>
		</ul>
	</aside>
	
	
	<script>
		$("#sure").click(function(){
			$("#deactivate_button").attr("disabled", !this.checked);
		});
		
		$("#id").change(function () {
			var value = $(this).val();
			$("#name").val(value);
		});
		
		$("#name").change(function () {
			var value = $(this).val();
			$("#id").val(value);
		});
		
		var opened = false;
		$("#trigger_deactivate").click(function(){
			if (!opened){
				$("#deactivate").css("display", "block");
				opened = true;
			}else{
				$("#deactivate").css("display", "none");
				opened = false;
			}
		});
		
		
	function initializeModal(){
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url("users/add");?>',
			success: function(msg){
				$('#osx_view_title').html("Create user");
				$('#osx_view_data').html(msg);
			}
		});
		OSX2.init();
	}
			
	</script>