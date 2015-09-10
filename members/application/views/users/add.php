<div class="osx_form table-responsive">
	<h3 class="errors" id="error_field"></h3>
	 <?php echo form_open("users/add_users");?> 
	<table>
		<tr>
			<i style="font-size:12px;"> <span class="denote">*</span> denotes required field </i>
		</tr>
		<tr>
			<td><label for="FirstName">First name <span class="denote">*</span></label></td>
			<td><input required="required" type="text" name="FirstName" id="FirstName"></td>
		</tr>
		<tr>
			<td><label for="LastName">Last name <span class="denote">*</span></label></td>
			<td><input required="required" type="text" name="LastName" id="LastName"></td>
		</tr>
		<tr>
			<td><label for="Username">Username <span class="denote">*</span></label></td>
			<td><input type="text" name="Username" id="Username"></td>
		</tr>
		<tr>
			<td><label for="Password">Password<span class="denote">*</span></label></td>
			<td><input type="text" name="Password" id="Password"></td>
		</tr>
		<tr>
			<td><label for="Password">Contact Number<span class="denote">*</span></label></td>
			<td><input required="required"type="text" name="Contact" id="ContactNumnber"></td>
		</tr>
		<tr>
			<td><label for="Password">Address<span class="denote">*</span></label></td>
			<td><input type="text" name="Address" id="Address"></td>
		</tr>
		<tr>
			<td></td>
			<td><button onClick = "pw()" type="button" name="Password" id="Generate" >Generate Random Password</button></td>
		</tr>
		<tr>
			<td colspan = "2" class="submit-add-user">
				<p class = "escape"> Press ESC to cancel</p>
				<?php echo form_submit("submit", "Submit", "id='submitForm'");?>
			</td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>

<script>
		function pw()
		{
			var length = Math.round((Math.random()*3)+8);
			var str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_?/:(){}[]0123456789';
			var max = str.length;
			var password = '';
			for (var i = 0; i<length; i++){
				password = password.concat(str.charAt(Math.round((Math.random()*max))-1));
			}
			document.getElementById("Password").value = password;
		}		
</script>