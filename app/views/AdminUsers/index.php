<?php
if (isset($tpl['status']))
{
	switch ($tpl['status'])
	{
		case 1:
			?><p class="status_err"><span>&nbsp;</span><?php echo $YPL_LANG['status'][1]; ?></p><?php
			break;
		case 2:
			?><p class="status_err"><span>&nbsp;</span><?php echo $YPL_LANG['status'][2]; ?></p><?php
			break;
	}
} else {

	if (isset($_GET['err']))
	{
		switch ($_GET['err'])
		{
			case 0:
				?><p class="status_success"><?php echo $YPL_LANG['u_err_0']; ?></p><?php
				break;
			case 1:
				?><p class="status_err"><span>&nbsp;</span><?php echo $YPL_LANG['u_err_1']; ?></p><?php
				break;
			case 2:
				?><p class="status_err"><span>&nbsp;</span><?php echo $YPL_LANG['u_err_2']; ?></p><?php
				break;
			case 3:
				?><p class="status_err"><span>&nbsp;</span><?php echo $YPL_LANG['u_err_3']; ?></p><?php
				break;
			case 7:
				?><p class="status_err"><span>&nbsp;</span><?php echo $YPL_LANG['status'][7]; ?></p><?php
				break;
		}
	}
	?>
	
	<div class="middle_right_box_top"><span>&nbsp;</span><?php echo $YPL_LANG['u_list']; ?></div>
	<div class="middle_right_box_content">
	
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
			<input type="hidden" name="controller" value="AdminUsers" />
			<input type="hidden" name="action" value="create" />
			<input type="submit" class="button button_add" value="" />
			<p>&nbsp;</p>
		</form>
	
	<?php
	if (isset($tpl['arr']))
	{
		if (is_array($tpl['arr']))
		{
			$count = count($tpl['arr']);
			if ($count > 0)
			{
				?>
				<table class="middle_table">
					<thead>
						<tr>
							<th><?php echo $YPL_LANG['u_role']; ?></th>
							<th><?php echo $YPL_LANG['u_username']; ?></th>
							<th style="width: 5%"></th>
							<th style="width: 10%"></th>
							<th style="width: 10%"></th>
						</tr>
					</thead>
					<tbody>
				<?php
				for ($i = 0; $i < $count; $i++)
				{
					?>
					<tr>
						<td><span class="<?php echo $tpl['arr'][$i]['role']; ?>"><?php echo $tpl['arr'][$i]['role']; ?></span></td>
						<td><?php echo stripslashes($tpl['arr'][$i]['username']); ?></td>
						<td><a class="status" title="<?php echo $YPL_LANG['_switch']; ?>" href="<?php echo $_SERVER['PHP_SELF']; ?>?controller=AdminUsers&amp;action=index" rev="<?php echo $tpl['arr'][$i]['id']; ?>"><img src="<?php echo IMG_PATH; ?>icons/<?php echo ($tpl['arr'][$i]['status'] == 'T' ? 'accept.png' : 'delete.png'); ?>" alt="<?php echo $YPL_LANG['_switch']; ?>" /></a></td>
						<td><a class="icon icon_edit" href="<?php echo $_SERVER['PHP_SELF']; ?>?controller=AdminUsers&amp;action=update&amp;id=<?php echo $tpl['arr'][$i]['id']; ?>"><?php echo $YPL_LANG['_edit']; ?></a></td>
						<td><a class="icon icon_delete" href="#" onclick="var q = confirm('<?php echo htmlspecialchars($YPL_LANG['_sure']); ?>'); if (q) { window.location = '<?php echo $_SERVER['PHP_SELF']; ?>?controller=AdminUsers&amp;action=delete&amp;id=<?php echo $tpl['arr'][$i]['id']; ?>';}"><?php echo $YPL_LANG['_delete']; ?></a></td>
					</tr>
					<?php
				}
				?>
					</tbody>
				</table>
				<?php
			} else {
				echo $YPL_LANG['u_empty'];
			}
		}
	}
	
	?>
	</div>
	<div class="middle_right_box_bottom"><span>&nbsp;</span></div>
	<?php
	if (isset($tpl['paginator']))
	{
		?>
		<ul class="paginator">
		<?php
		for ($i = 1; $i <= $tpl['paginator']['pages']; $i++)
		{
			if (isset($_GET['page']) && $_GET['page'] == $i)
			{
				?><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?controller=<?php echo $_GET['controller']; ?>&amp;action=index&amp;page=<?php echo $i; ?>" class="focus"><?php echo $i; ?></a></li><?php
			} else {
				?><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?controller=<?php echo $_GET['controller']; ?>&amp;action=index&amp;page=<?php echo $i; ?>"><?php echo $i; ?></a></li><?php
			}
		}
		?>
		</ul>
		<?php
	}
}
?>