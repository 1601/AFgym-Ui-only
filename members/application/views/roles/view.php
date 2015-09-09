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
		}
	</script>
	<div class = "osx_form">
		<h2> Role: <?php echo $description;?></h2>
		<?php echo form_open("roles/edit_role/" . $id);?>
			<?php foreach($role as $row): $type = $row->role_id;?>
				<table>
					<tr>
						<td><label><input type="checkbox" name="operator_name[]" id="controlpanel" class="editable" 
							value="1" disabled="true"  <?php if (array_key_exists(1, $available)) echo 'checked'?> > Control Panel </label></td>
					</tr>
					<tr>
						<td><label><input type="checkbox" name="operator_name[]" id="inventory" class="editable" 
							value="35" disabled="true"  <?php if (array_key_exists(35, $available)) echo 'checked'?> > Inventory </label></td>
					</tr>
					<tr>
						<td>
							<h4>Costumer</h4>
							<ul>
								<li><label><input type="checkbox" name="operator_name[]" id="addcust" class="editable" 
								value="2" disabled="true"  <?php if (array_key_exists(2, $available)) echo 'checked'?> > Add </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="editcust" class="editable" 
								value="3" disabled="true"  <?php if (array_key_exists(3, $available)) echo 'checked'?> > Edit </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="deaccust" class="editable" 
								value="4" disabled="true"  <?php if (array_key_exists(4, $available)) echo 'checked'?> > Deactivate </label></li>
							<ul>
						</td>
						<td>
							<h4>Products</h4>
							<ul>
								<li><label><input type="checkbox" name="operator_name[]" id="addprod" class="editable" 
								value="5" disabled="true"  <?php if (array_key_exists(5, $available)) echo 'checked'?> > Add </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="editprod" class="editable" 
								value="6" disabled="true"  <?php if (array_key_exists(6, $available)) echo 'checked'?> > Edit </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="deacprod" class="editable" 
								value="7" disabled="true"  <?php if (array_key_exists(7, $available)) echo 'checked'?> > Deactivate </label></li>
							<ul>
						</td>
						<td>
							<h4>Operator</h4>
							<ul>
								<li><label><input type="checkbox" name="operator_name[]" id="addoper" class="editable" 
								value="8" disabled="true"  <?php if (array_key_exists(8, $available)) echo 'checked'?> > Add </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="editoper" class="editable" 
								value="9" disabled="true"  <?php if (array_key_exists(9, $available)) echo 'checked'?> > Edit </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="deacoper" class="editable" 
								value="10" disabled="true"  <?php if (array_key_exists(10, $available)) echo 'checked'?> > Deactivate </label></li>
							<ul>
						</td>
					</tr>
					<tr>
						<td>
							<h4>Warehouse</h4>
							<ul>
								<li><label><input type="checkbox" name="operator_name[]" id="addware" class="editable" 
								value="11" disabled="true"  <?php if (array_key_exists(11, $available)) echo 'checked'?> > Add </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="editware" class="editable" 
								value="12" disabled="true"  <?php if (array_key_exists(12, $available)) echo 'checked'?> > Edit </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="deacware" class="editable" 
								value="13" disabled="true"  <?php if (array_key_exists(13, $available)) echo 'checked'?> > Deactivate </label></li>
							<ul>
						</td>
						<td>
							<h4>Vessel</h4>
							<ul>
								<li><label><input type="checkbox" name="operator_name[]" id="addvess" class="editable" 
								value="14" disabled="true"  <?php if (array_key_exists(14, $available)) echo 'checked'?> > Add </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="editvess" class="editable" 
								value="15" disabled="true"  <?php if (array_key_exists(15, $available)) echo 'checked'?> > Edit </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="deacvess" class="editable" 
								value="16" disabled="true"  <?php if (array_key_exists(16, $available)) echo 'checked'?> > Deactivate </label></li>
							<ul>
						</td>
						<td>
							<h4>Trucks</h4>
							<ul>
								<li><label><input type="checkbox" name="operator_name[]" id="addtruck" class="editable" 
								value="17" disabled="true"  <?php if (array_key_exists(17, $available)) echo 'checked'?> > Add </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="edittruck" class="editable" 
								value="18" disabled="true"  <?php if (array_key_exists(18, $available)) echo 'checked'?> > Edit </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="deactruck" class="editable" 
								value="19" disabled="true"  <?php if (array_key_exists(19, $available)) echo 'checked'?> > Deactivate </label></li>
							<ul>
						</td>
					</tr>
					<tr>
						<td>
							<h4>User</h4>
							<ul>
								<li><label><input type="checkbox" name="operator_name[]" id="adduser" class="editable" 
								value="20" disabled="true"  <?php if (array_key_exists(20, $available)) echo 'checked'?> > Add </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="edituser" class="editable" 
								value="21" disabled="true"  <?php if (array_key_exists(21, $available)) echo 'checked'?> > Edit </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="deacuser" class="editable" 
								value="22" disabled="true"  <?php if (array_key_exists(22, $available)) echo 'checked'?> > Deactivate </label></li>
							<ul>
						</td>	
						<td>
							<h4>Suppliers</h4>
							<ul>
								<li><label><input type="checkbox" name="operator_name[]" id="addsupp" class="editable" 
								value="36" disabled="true"  <?php if (array_key_exists(36, $available)) echo 'checked'?> > Add </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="editsupp" class="editable" 
								value="37" disabled="true"  <?php if (array_key_exists(37, $available)) echo 'checked'?> > Edit </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="deacsupp" class="editable" 
								value="38" disabled="true"  <?php if (array_key_exists(38, $available)) echo 'checked'?> > Deactivate </label></li>
							<ul>
						</td>
						<td>
							<h4>Purchasing</h4>
							<ul>
								<li><label><input type="checkbox" name="operator_name[]" id="createpurch" class="editable" 
								value="23" disabled="true"  <?php if (array_key_exists(23, $available)) echo 'checked'?> > Create </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="apppurch" class="editable" 
								value="24" disabled="true"  <?php if (array_key_exists(24, $available)) echo 'checked'?> > Approve </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="cwapurch" class="editable" 
								value="25" disabled="true"  <?php if (array_key_exists(25, $available)) echo 'checked'?> > Create Withdrawal Authority </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="macpurch" class="editable" 
								value="26" disabled="true"  <?php if (array_key_exists(26, $available)) echo 'checked'?> > Mark as Complete </label></li>
							<ul>
						</td>
						
					</tr>
					<tr>
						<td>
							<h4>Sales</h4>
							<ul>
								<li><label><input type="checkbox" name="operator_name[]" id="createsales" class="editable" 
								value="27" disabled="true"  <?php if (array_key_exists(27, $available)) echo 'checked'?> > Create </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="appsales" class="editable" 
								value="28" disabled="true"  <?php if (array_key_exists(28, $available)) echo 'checked'?> > Approve </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="cwasales" class="editable" 
								value="29" disabled="true"  <?php if (array_key_exists(29, $available)) echo 'checked'?> > Create Withdrawal Authority </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="macsales" class="editable" 
								value="30" disabled="true"  <?php if (array_key_exists(30, $available)) echo 'checked'?> > Mark as Complete </label></li>
							<ul>
						</td>
						<td>
							<h4>Withdrawal Authorities</h4>
							<ul>
								<li><label><input type="checkbox" name="operator_name[]" id="createwa" class="editable" 
								value="31" disabled="true"  <?php if (array_key_exists(31, $available)) echo 'checked'?> > Create </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="releasewa" class="editable" 
								value="32" disabled="true"  <?php if (array_key_exists(32, $available)) echo 'checked'?> > Release </label></li>
							<ul>
						</td>
						<td>
							<h4>Receiving Report</h4>
							<ul>
								<li><label><input type="checkbox" name="operator_name[]" id="createrr" class="editable" 
								value="33" disabled="true"  <?php if (array_key_exists(33, $available)) echo 'checked'?> > Create </label></li>
								<li><label><input type="checkbox" name="operator_name[]" id="receiverr" class="editable" 
								value="34" disabled="true"  <?php if (array_key_exists(34, $available)) echo 'checked'?> > Receive </label></li>
							<ul>
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td colspan = "2" style="text-align: right;" id="buttons">
							<input type="submit" value="OK" style="display:none;" id="edit">
							<input type="button" class="osx_button" onclick="enable_edit()" value="Edit" id="enable">
							<input type="button" class="osx_button" onclick="disable_edit()" value="Cancel" style="display:none;" id="cancel">
						</td>
					</tr>
				</table>
	</div>
	<?php endforeach;?>
	<?php echo form_close();?>
	<style>
		td ul li {
			list-style: none;
		}
		
		td {
			vertical-align: top;
		}
		
		td ul {
			padding: 0 0 0 15px;
			margin-top: 0;
		}
	</style>
	<script>
		document.getElementById('type').value = "<?php echo $type;?>";
	
		function disable_edit(){
			$('#edit').css('display', 'none');
			$('#cancel').css('display', 'none');
			$("#enable").css('display', 'inline-block');
			$('.editable').attr('disabled',true);
		}		
	</script>