<section class="main_container">
	<aside class = "sidebar">
		<h3><?php echo $page_header;?></h3>
		<ul>
			<a href="<?php echo base_url();?>users/"><li class="aside_button">&#x25B8; Users</li></a>
			<a href="<?php echo base_url();?>roles/display"><li class="aside_button">&#x25B8; All (<?php echo $count_all;?>)</li></a>
				<form onsubmit="window.location = '<?php echo base_url();?>roles/display/?search_string=' + $('#search-str').val();  return false;">
					<input type = 'text' id="search-str" placeholder="Search Roles" name="search_string" class="input-search">
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
		
	</script>