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
			$('.hide').css('display', 'block');
		}

		function disable_edit(){
			$('#edit').css('display', 'none');
			$('#cancel').css('display', 'none');
			$("#enable").css('display', 'inline-block');
			$('.editable').attr('disabled',true);
			$('.hide').css('display','none');

			
			<?php foreach ($employee as $row):?>
				document.getElementById('Username').value = "<?php echo $row->Username;?>";
				document.getElementById('FirstName').value = "<?php echo $row->FirstName;?>";
				document.getElementById('LastName').value = "<?php echo $row->LastName;?>";
				document.getElementById('Address').value = "<?php echo $row->Address;?>";
				document.getElementById('ContactNumber').value = "<?php echo $row->ContactNumber;?>";
			<?php endforeach;?>
			
			$('.editable').attr('disabled',true);
		}	

		function show_payroll(){
			$('#payroll').css('display', 'block');
			$('#hide').css('display', 'block');
			$('#show').css('display', 'none');
		}
		function hide_payroll(){
			$('#payroll').css('display', 'none');
			$('#show').css('display', 'block');
			$('#hide').css('display', 'none');
		}
	</script>
	<div class = "osx_form">
		<h2 style="color: blue;"> Employee <?php echo $id;?></h2>
		<?php echo form_open("employees/edit_employee/" . $id);?>
			<?php foreach($employee as $row):?>
				<table>
					<col width="160px">
					<tr>
						<td>First name:</td>
						<td><input type="text" required = "required" name="FirstName" id="FirstName" class="editable" value="<?php echo $row->FirstName;?>" disabled="true"></td>
					</tr>
					<tr>
						<td>Last name:</td>
						<td><input type="text" required = "required" name="LastName" id="LastName" class="editable" value="<?php echo $row->LastName;?>" disabled="true"></td>
					</tr>					
					<tr>
						<td>Address:</td>
						<td><input type="text" required = "required" name="Address" id="Address" class="editable" value="<?php echo $row->Address;?>" disabled="true"></td>
					</tr>
					<tr>
						<td>Contact Number:</td>
						<td><input type="text" required = "required" name="ContactNumber" id="ContactNumber" class="editable" value="<?php echo $row->ContactNumber;?>" disabled="true"></td>
					</tr>
					<tr>
						<td><span class = "hide" style="display: none;">Username:</span></td>
						<td><input type="text" required = "required" name="Username" id="Username" class = "hide" style="display: none;" value="<?php echo $row->Username;?>"></td>
					</tr>
					<tr>
						<td><span class = "hide" style="display: none;">Password</span></td>
						<td><input type="password" name="Password" id="Password" class = "hide" style="display: none;" value=""></td>
					</tr>
					<tr>
						<td colspan = "2" style="text-align: right;" id="buttons">
							<input type="submit" value="OK" style="display:none;" id="edit">
							<input type="button" class="osx_button" onclick="enable_edit()" value="Edit" style="display:inline-block;" id="edit">
							<input type="button" class="osx_button" onclick="disable_edit()" value="Cancel" style="display:none;" id="cancel">
						<a href="<?php echo base_url();?>users/deactivate_user/<?php echo $id;?>" > <input type="button" class="osx_button" value="Deactivate"></a>
						</td>
					</tr>
				</table>
			<?php endforeach;?>
		<?php echo form_close();?>
		<button id = "show" onClick = "show_payroll()" style="font-size: 12px; display: block; color: blue;">Show Payroll>></button>
		<button id = "hide" onClick = "hide_payroll()" style="font-size: 12px; display: none; color: red">Hide Payroll<<</button>
	</div>

	<div class = "osx_form" id="payroll" style="display: none; border-top: 1px solid black;">
		<h2 style="color: blue;"> Payroll</h2>
		<?php echo form_open("employees/payroll/" . $id);?>
				<table>
					<tr>
						<td>SALARY </td>
						<td><input type="number" required = "required" name="Salary" id="Salary"></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td style="color: red;">(DEDUCTIONS) </td>
						<td><input type="number" required = "required" name="Deduction" id="Deduction"></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td style="color: red;">Admin </td>
						<td><input type="text" name="pr_password" id="pr_password"></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td colspan = "2" style="text-align: right;" id="buttons">
							<input type="submit" value="Release" style="display:inline-block;" id="edit">
						</td>
					</tr>
				</table>
		<?php echo form_close();?>
	</div>