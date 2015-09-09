<div class="osx_form">
	<h3 class="errors" id="error_field"></h3>
	 <?php echo form_open("materials/add_material");?> 
	<table style="width: 100%; table-layout:fixed;">
		<tr>
			<i style="font-size:12px;"> <span class="denote">*</span> denotes required field</i>
			<td><label for="name">Item Code: <span class="denote">*</span></label></td>
			<td><input required="required" type="text" name="code" id="code"></td>
		</tr>
		</tr>
		<tr>
			<td><label for="name">Description: <span class="denote">*</span></label></td>
			<td><input required="required" type="text" name="description" id="description"></td>
		</tr>
		<tr>
			<td><label for="description">Measurement: </label></td>
			<td><input type="text" name="measurement" id="measurement"></td>
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