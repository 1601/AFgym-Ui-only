<html>
	<head>
		<title><?php echo $title;?></title>
	</head>
	<body>
		<h3><?php echo $header?></h3>
		<h5><?php echo Date();?></h5>
		<table>
			<tr>
				<?php foreach($fields as $field_name => $field_display):?>
					<th>
						<?php echo $field_display;?>
					</th>
				<?php endforeach;?>
			</tr>
			<?php foreach($element as $row):?>
				<?php foreach($fields as $field_name => $field_display):?>
					<tr>
						<td><?php echo $row->$field_display;?></td>
					</tr>
				<?php endforeach;?>
			<?php endforeach;?>
		</table>
	</body>
</html>