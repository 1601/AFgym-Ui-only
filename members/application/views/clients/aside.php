<section class="main_container">
	<aside class = "sidebar">
		<h3><?php echo $page_header;?></h3>
		<ul>
			<a href="<?php echo base_url();?>Clients/display"><li class="aside_button">&#x25B8; All (<?php echo $count_all;?>)</li></a>
			<li class="aside_button" onclick = "initializeModal()" >&#x25B8; Create Clients</li>
			<li class="aside_button" id="trigger_deactivate">&#x25B8; Deactivate Clients</li>
				<div class="aside_sublist" id="deactivate">
					<h1> DEACTIVATE Client </h1>
					<p class = "prompt">Client ID:</p>
					
					<?php
						echo form_open('Clients/deactivate_Client');
						echo form_dropdown('Client_id', $Client_ids, "0", "id='id'");?>
				
						<p class = "prompt">Company Name:</p>
					
					<?php	
						echo form_dropdown('company_name', $company_names, "0", "id='name'");
						echo form_checkbox('sure', '', FALSE, 'id ="sure"');?>
					
					<p class="sure">Are you sure?</p>
					
					<?php
						echo form_submit('deactivate', 'Deactivate', 'disabled id="deactivate_button"');
						echo form_close();?>
				</div>
				<form onsubmit="window.location = '<?php echo base_url();?>Clients/display/?search_string=' + $('#search-str').val();  return false;">
					<input type = 'text' id="search-str" placeholder="Search Client" name="search_string" class="input-search">
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
			url: '<?php echo site_url("clients/add");?>',
			success: function(msg){
				$('#osx_view_title').html("Create Client");
				$('#osx_view_data').html(msg);
			}
		});
		OSX2.init();
	}
		
	</script>