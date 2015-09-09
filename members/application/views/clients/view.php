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
		<h2> Customer <?php echo $id;?></h2>
		<?php echo form_open("customers/edit_customer/" . $id);?>
			<?php foreach($customer as $row):?>
				<table>
					<tr>
						<td>Company Name:</td>
						<td><input type="text" required = "required" name="company_name" id="company_name" class="editable" value="<?php echo $row->company_name;?>" disabled="true"></td>
					</tr>
					<tr>
						<td>Company Address:</td>
						<td><input type="text" required = "required" name="company_address" id="company_address" class="editable" value="<?php echo $row->company_address;?>" disabled="true"></td>
					</tr>
					<tr>
						<td>Contact Number:</td>
						<td><input type="text" name="contact_number" id="contact_number" class="editable" value="<?php echo $row->contact_number;?>" disabled="true"></td>
					</tr>
					<tr>
						<td>Contact Person:</td>
						<td><input type="text" name="contact_person" id="contact_person" class="editable" value="<?php echo $row->contact_person;?>" disabled="true"></td>
					</tr>
					<tr>
						<td>Email Address:</td>
						<td><input type="email" required = "required" name="email" id="email" class="editable" value="<?php echo $row->email_address;?>" disabled="true"></td>
					</tr>
					<tr>
						<td>Tin Number:</td>
						<td><input type="text" name="tin_number" id="tin_number" class="editable" value="<?php echo $row->tin_number;?>" disabled="true"></td>
					</tr>
					<tr>
						<td colspan="2" style="border-bottom: 1px solid black"><center>LOCATIONS</center></td>
						<input type="hidden" id="count" name="count" value="1">
					</tr>
					<tr>
						<td colspan="2">
						<script> var index = 0;</script>
							
								
							

								<table id="locations" style="width: 100%">
									<?php if($locations == 0):?>
									<tr><td colspan="5"><center>No Locations</center></td></tr>
									<?php else:?>
										<tr>
											<th style="width: 20%" align="left">Name</th>
											<th style="width: 35%" align="left">Address</th>
											<th style="width: 20%" align="left">Contact Number</th>
											<th style="width: 20%" align="left">Contact Person</th>	
											<th style="width: 5%" align="left">-</th>																		
										</tr>
										<?php $ind = 1; foreach($locations as $rows):?>
											<tr>
												<td><input type="text" required="required" name="locName<?php echo $ind;?>" class="editable" id="locName<?php echo $ind;?>" style="width: 97%" value="<?php echo $rows->name;?>" disabled="true"></td>
												<td><input type="text" required="required" name="locAddress<?php echo $ind;?>" class="editable" id="locAddress<?php echo $ind;?>" style="width: 98%" value="<?php echo $rows->address;?>" disabled="true"></td>
												<td><input type="text" required="required" name="locNumber<?php echo $ind;?>" class="editable" id="locNumber<?php echo $ind;?>" style="width: 97%" value="<?php echo $rows->contact_number;?>" disabled="true"></td>
												<td><input type="text" required="required" name="locPerson<?php echo $ind;?>" class="editable" id="locPerson<?php echo $ind;?>" style="width: 97%" value="<?php echo $rows->contact_person;?>" disabled="true"></td>
												<td><input type="button" style="width: 97%" id="<?php echo $ind;?>" class="editable" disabled onclick="remove_row(this.id);" value="x"></td>																								
											</tr>
											<script>index++;</script>
											<?php $ind = $ind + 1;?>
										<?php endforeach;?>
									<?php endif;?>
									<tr>
										<td colspan="5"><center><input type="button" class="osx_button" id="add_loc" style="width: 97%; display:none;" value="Add Location" onclick="insert_row();"></center></td>
									</tr>
								</table>

						</td>
					</tr>
					<tr>
						<td>Last Modified: :</td>
						<td><input type="text" value="<?php echo $row->date_modified;?>" disabled="true"></td>
					</tr>
					<tr>
						<td>Date Added:</td>
						<td><input type="text" value="<?php echo $row->date_added;?>" disabled="true"></td>
					</tr>
					<tr>
						<td>Created By:</td>
						<td><input type="text" value="<?php echo $row->added_by;?>" disabled="true"></td>
					</tr>
					<tr>
						<td colspan = "2" style="text-align: right;" id="buttons">
							<input type="submit" value="OK" style="display:none;" id="edit">
							<input type="button" class="osx_button" onclick="enable_edit()" value="Edit" id="enable" <?php if ($showedit===false){?>style="display:none"<?php } ?>>
							<input type="button" class="osx_button" onclick="disable_edit()" value="Cancel" style="display:none;" id="cancel">
						<a href="<?php echo base_url();?>customers/deactivate_customer/<?php echo $id;?>" > <input type="button" class="osx_button" value="Deactivate" <?php if ($showdeactivate===false){?>style="display:none"<?php } ?>></a>
						</td>
					</tr>
				</table>
			<?php endforeach;?>
		<?php echo form_close();?>
	</div>

	<script>
		function disable_edit(){
			
			<?php foreach ($customer as $row):?>
				document.getElementById('company_name').value = "<?php echo $row->company_name;?>";
				document.getElementById('company_address').value = "<?php echo $row->company_address;?>";
				document.getElementById('contact_number').value = "<?php echo $row->contact_number;?>";
				document.getElementById('contact_person').value = "<?php echo $row->contact_person;?>";
				document.getElementById('email').value = "<?php echo $row->email_address;?>";
				document.getElementById('tin_number').value = "<?php echo $row->tin_number;?>";
			<?php endforeach;?>
			
			while(index > 0){
				document.getElementById("locations").deleteRow(index);
				index--;			
			}
			
			<?php foreach($locations as $rows):?>
				insert_row();
				$('#locName' + index).val('<?php echo $rows->name;?>');
				$('#locAddress' + index).val('<?php echo $rows->address;?>');
				$('#locNumber' + index).val('<?php echo $rows->contact_number;?>');
				$('#locPerson' + index).val('<?php echo $rows->contact_person;?>');												
				$('#locName' + index).attr('disabled',true);
				$('#locAddress' + index).attr('disabled',true);
				$('#locNumber' + index).attr('disabled',true);
				$('#locPerson' + index).attr('disabled',true);
				$('#' + index).attr('disabled',true);															
			<?php endforeach;?>
			
			$('#edit').css('display', 'none');
			$('#cancel').css('display', 'none');
			$("#enable").css('display', 'inline-block');
			$('#add_loc').css('display', 'none');
			$('.editable').attr('disabled',true);
		}
		
		function insert_row(){
			index++;
			var table = document.getElementById("locations");
			var row = table.insertRow(index);
			row.setAttribute("id", "row" + index);
			
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			
			cell1.innerHTML = '<input type="text" required="required" name="locName' + index + '" id="locName' + index + '" class="editable" style="width: 97%">';
			cell2.innerHTML = '<input type="text" required="required" name="locAddress' + index + '" id="locAddress' + index + '" class="editable" style="width: 97%">';
			cell3.innerHTML = '<input type="text" required="required" name="locNumber' + index + '" id="locNumber' + index + '" class="editable" style="width: 97%">';
			cell4.innerHTML = '<input type="text" required="required" name="locPerson' + index + '" id="locPerson' + index + '" class="editable" style="width: 97%">';
			cell5.innerHTML = '<input type="button" style="width: 97%" id="' + index + '" class="editable" onclick="remove_row(this.id);" value="x">';
			$('#count').val(index);						
		}
		
		function remove_row(id){
			var nums = id; nums++; nums--;	
			var next = 0;
			
			if(index == 1){
				alert("Required to have at least 1 location.");
				return false;
			}		
				
			while(nums < index){
				next = 1 + nums;

				data = document.getElementById("locName" + next).value;
				document.getElementById("locName" + nums).value = data;
				
				data = document.getElementById("locAddress" + next).value;
				document.getElementById("locAddress" + nums).value = data;
				
				data = document.getElementById("locNumber" + next).value;
				document.getElementById("locNumber" + nums).value = data;
				
				data = document.getElementById("locPerson" + next).value;
				document.getElementById("locPerson" + nums).value = data;
				nums++;
			}

			document.getElementById("locations").deleteRow(index);
			index--;
			
			$('#count').val(index);
			return false;
		}		
	</script>