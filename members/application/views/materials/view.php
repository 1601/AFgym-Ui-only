	<script>
		$('input').keyup(function(){
			$(this).css('background-color', '#FFF');
		});
		$('select').change(function(){
			$(this).css('background-color', '#FFF');
		});

		function enable_edit(){
			$('#enable').css('display', 'none');
			$("#edit").css('display', 'inline-block');
			$("#cancel").css('display', 'inline-block');
			$('.editable').attr('disabled',false);
			$('#add_loc').css('display', 'block');
		}
	</script>
	<div class = "osx_form">
		<h2> Raw Materials <?php echo $id;?></h2>
		<?php echo form_open("materials/edit_material/" . $id);?>
			<?php foreach($material as $row):?>
				<table>
					<tr>
						<td>Item Code</td>
						<td><input type="text" required = "required" name="company_name" id="itemCode" class="editable" value="<?php echo $row->rm_itemCode;?>" disabled="true"></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><input type="text" required = "required" name="company_address" id="description" class="editable" value="<?php echo $row->rm_description;?>" disabled="true"></td>
					</tr>
					<tr>
						<td>Measurement</td>
						<td><input type="text" name="contact_person" id="measurement" class="editable" value="<?php echo $row->rm_measurement;?>" disabled="true"></td>
					</tr>
							<tr>
						<td colspan = "2" style="text-align: right;" id="buttons">
							<input type="submit" value="OK" style="display:none;" id="edit">
							<input type="button" class="osx_button" onclick="enable_edit()" value="Edit" id="enable" tyle="display:none;" id="edit">
							<input type="button" class="osx_button" onclick="disable_edit()" value="Cancel" style="display:none;" id="cancel">
						<a href="<?php echo base_url();?>users/deactivate_user/<?php echo $id;?>" > <input type="button" class="osx_button" value="Deactivate"></a>
						</td>
					</tr>
				</table>
			<?php endforeach;?>
		<?php echo form_close();?>
	</div>

	<script>
	
		function disable_edit(){
			$('#edit').css('display', 'none');
			$('#cancel').css('display', 'none');
			$("#enable").css('display', 'inline-block');
			$('.editable').attr('disabled',true);
			
			<?php foreach ($user as $row):?>
				document.getElementById('itemCode').value = "<?php echo $row->rm_itemCode;?>";
				document.getElementById('description').value = "<?php echo $row->rm_description;?>";
				document.getElementById('measurement').value = "<?php echo $row->rm_measurement;?>";
			<?php endforeach;?>
			
			$('.editable').attr('disabled',true);
		}		
	</script>