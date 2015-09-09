<div class="osx_form" id = "payroll_list">
		<?php if($message != ""){echo "<h5 class='message'>".$message."</h5>";}?>
		
		<div class="table_top">
			<div class = "links">
				<h4 class = "num_result"> 
					<?php if($string != ''):?>
						Search Query: "<?php echo $string?>"<br/>
					<?php endif;?>
					Found:
						<?php if ($num_rows == "0"):?>
							<b><u>No Results Found</u></b>
						<?php else:?>
							&nbsp;<u><?php echo $num_rows;?></u><br> Showing <?php echo $showing;?> results
						<?php endif;?>
				</h4>
				
				<?php 
					$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
					if(count($segments) <= 4) $current_page = 0;
					else $current_page = ceil($segments[2] / $limit);
					
				?>
				<?php if($num_pages > 1):?>
					<div class = "pagination">
						<h4 class="num_result">Page <?php echo ($current_page + 1);?> of <?php echo $num_pages;?></h4>
						
						<h4 class="num_result">Go to: </h4>
						<select id = "pages">
							<option></option>
							<?php for($i = 0; $i < $num_pages; $i++):?>
								<option value="<?php echo base_url();?>payrolls/<?php echo $function?>/<?php echo ($i * $limit).'/'.$sort_by .'/'. $sort_order .'/' .$limit . '/' .$match;?>" <?php if($i == $current_page) echo 'disabled'?>><?php echo ($i + 1);?></option>
							<?php endfor;?>
						</select>

						<!--next, prev buttons-->
						<a href = "<?php echo base_url();?>payrolls/<?php echo $function?>/<?php echo (($current_page - 1) * $limit).'/'.$sort_by .'/'. $sort_order .'/' .$limit . '/' . $match;?>"><button class="pagination-button" <?php if($current_page <= 0) echo "style='display:none;'";?> ><</button></a>
						<a href = "<?php echo base_url();?>payrolls/<?php echo $function?>/<?php echo (($current_page + 1) * $limit).'/'.$sort_by .'/'. $sort_order .'/' . $limit . '/' . $match;?>"><button class="pagination-button" <?php if($current_page + 1 >= $num_pages) echo "style='display:none;'";?>>></button></a>
						
					</div>
				<?php endif;?>
			</div>
		</div>
		
		<?php if($num_rows != 0):?>
			<table class="table_list">
				<tr>
					<?php foreach($fields as $field_name => $field_display):?>
					<th class="<?php if ($sort_by == $field_name){ echo "sorter sort_" .$sort_order;}?>">
						<?php 
							if (in_array($field_name, $sort_columns)){
								echo anchor('payrolls/display/0/' .$field_name. '/' . (($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc') . '/' . $limit . '/' . $match
									,$field_display);
							}else{
								echo $field_display;
							}
						?>
					</th>
					<?php endforeach;?>
				</tr> 
				
				<?php foreach($table as $row): ?>
				<tr id = "<?php echo $row->payroll_id;?>">
					<?php foreach($fields as $field_name => $field_display):?>
						<td class="<?php if ($sort_by == $field_name){ echo "sort_col";}?>">
							<?php echo $row->$field_name;?>
						</td>
					<?php endforeach;?>
				</tr>
				<?php endforeach;?>		
			</table>	
		<?php endif;?>
</div>


