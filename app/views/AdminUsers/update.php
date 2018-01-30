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
?>
<div class="middle_right_box_top"><span>&nbsp;</span><?php echo $YPL_LANG['u_update']; ?></div>
<div class="middle_right_box_content">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=AdminUsers&amp;action=update&amp;id=<?php echo $tpl['arr']['id']; ?>" method="post" id="frmUpdateUser" class="middle_form">
	<input type="hidden" name="user_update" value="1" />
	<input type="hidden" name="id" value="<?php echo $tpl['arr']['id']; ?>" />
	<p><label class="title"><?php echo $YPL_LANG['u_role']; ?></label>
		<select name="role_id" id="role_id" class="select_large required">
		<?php
		foreach ($tpl['role_arr'] as $v)
		{
			if ($tpl['arr']['role_id'] == $v['id'])
			{
				?><option value="<?php echo $v['id']; ?>" selected="selected"><?php echo stripslashes($v['role']); ?></option><?php
			} else {
				?><option value="<?php echo $v['id']; ?>"><?php echo stripslashes($v['role']); ?></option><?php
			}
		}
		?>
		</select>
	</p>
	<p><label class="title"><?php echo $YPL_LANG['u_username']; ?></label><input type="text" name="username" id="username" value="<?php echo htmlspecialchars(stripslashes($tpl['arr']['username'])); ?>" class="text_large required" /></p>
	<p><label class="title"><?php echo $YPL_LANG['u_password']; ?></label><input type="password" name="password" id="password" value="password" class="text_large required" /></p>
	<p><label class="title"><?php echo $YPL_LANG['u_status']; ?></label>
		<select name="status" id="status" class="select_large">
		<?php
		foreach ($YPL_LANG['u_statarr'] as $k => $v)
		{
			if ($k == $tpl['arr']['status'])
			{
				echo '<option value="'.$k.'" selected="selected">'.$v.'</option>';
			} else {
				echo '<option value="'.$k.'">'.$v.'</option>';
			}
		}
		?>
		</select>
	</p>
	<p>
		<label class="title">&nbsp;</label>
		<input type="submit" value="" class="button button_save" />
	</p>
</form>

</div>
<div class="middle_right_box_bottom"><span>&nbsp;</span></div>
<?php
}
?>