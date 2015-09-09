<div class="osx_form">
	 <?php echo form_open("clients/add_client");?> 
	<table style="width: 100%; table-layout:fixed;">
		<tr>
			<i style="font-size:12px;"> <span class="denote">*</span> denotes required field</i>
			<td style="width:25%"><label for="code">Clients Code: <span class="denote">*</span></label></td>
			<td style="width:75%"><input required="required" type="text" name="code" id="code"></td>
		</tr>
		<tr>
			<td><label for="name">Name: <span class="denote">*</span></label></td>
			<td><input required="required" type="text" name="name" id="name"></td>
		</tr>
		<tr>
			<td><label for="description">Description:</label></td>
			<td><input type="text" name="description" id="description"></td>
		</tr>
		<tr>
			<td><label for="contact_details">Contact Details</label></td>
			<td><input type="text" name="contact_details" id="contact_details"></td>
		</tr>
		<tr>
			<td colspan = "2" style="text-align: right;">
				<p class = "escape"> Press ESC to cancel</p>
				<?php echo form_submit("submit", "Submit", "id='submitForm'");?>
			</td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>