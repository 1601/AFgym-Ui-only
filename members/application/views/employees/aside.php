<section class="main_container">
	<aside class = "sidebar">
		<h3><?php echo $page_header;?></h3>
		<ul>
			<!-- <a href="<?php echo base_url();?>roles/"><li class="aside_button">&#x25B8; Roles</li></a> -->
			<a href="<?php echo base_url();?>employees/display"><li class="aside_button">&#x25B8; All (<?php echo $count_all;?>)</li></a>
			<li class="aside_button" onclick = "initializeModal()">&#x25B8; Add Employee</li>
			<li class="aside_button" id="trigger_deactivate">&#x25B8; Deactivate Employee</li>
				<div class="aside_sublist" id="deactivate">
					<h1> DEACTIVATE USER </h1>
					<p class = "prompt">Employee ID:</p>
					
					<?php
						echo form_open('employees/deactivate_employee');
						echo form_dropdown('employee_id', $employee_ids, "0", "id='id'");?>
				
						<p class = "prompt">Username:</p>
					
					<?php	
						echo form_dropdown('Username', $lastnames, "0", "id='name'");
						echo form_checkbox('sure', '', FALSE, 'id ="sure"');?>
					
					<p class="sure">Are you sure?</p>
					
					<?php
						echo form_submit('deactivate', 'Deactivate', 'disabled id="deactivate_button"');
						echo form_close();?>
				</div>
				<form onsubmit="window.location = '<?php echo base_url();?>employees/display/?search_string=' + $('#search-str').val();  return false;">
					<input type = 'text' id="search-str" placeholder="Search user" name="search_string" class="input-search">
					<input type = 'submit'  class="submit-enter">
				</form>

			<li class="aside_button" onclick = "initializePayroll()" style="margin-top: 5px; font-weight: bold">&#x25B8; Show Payroll History</li>
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
			url: '<?php echo site_url("employees/add");?>',
			success: function(msg){
				$('#osx_view_title').html("Add Employee");
				$('#osx_view_data').html(msg);
			}
		});
		OSX2.init();
	}

	function initializePayroll(){
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url("employees/pr");?>',
			success: function(msg){
				$('#osx_view_title').html("Payroll");
				$('#osx_view_data').html(msg);
			}
		});
		OSX2.init();
	}
			
	</script>