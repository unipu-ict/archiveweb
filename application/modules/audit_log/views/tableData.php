<!-- Audit_log - lista - 01.04.2017. -->
<?php
$tablename="audit_log";
$tab_id=$tablename.'_id';
if(isset($view_data) && is_array($view_data) && !empty($view_data)) {
	foreach ($view_data as $key => $value) {?>
		<tr>
			<td><?php echo $value->table; ?></td>
			<td><?php echo $value->action; ?></td>
			<td><?php echo $value->data_id; ?></td>
			<td><?php echo $value->field; ?></td>
			<td><?php echo $value->old_value; ?></td>
			<td><?php echo $value->new_value; ?></td>
			<td><?php echo $value->modified; ?></td>
			<td><?php echo $value->executed; ?></td>
	</tr>
<?php } } ?>
