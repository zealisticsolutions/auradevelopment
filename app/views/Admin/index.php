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
	
<!--
	<div class="middle_right_box_top"><span>&nbsp;</span><?php echo $YPL_LANG['dashboard_title']; ?></div>
	<div class="middle_right_box_content">
	
	<div class="middle_form">
	<p>
		<label class="title"><?php echo $YPL_LANG['dashboard_last_login']; ?></label>
		<?php echo !empty($_SESSION[$controller->default_user]['last_login']) ? date("l jS F Y, H:i:s A", strtotime($_SESSION[$controller->default_user]['last_login'])) : $YPL_LANG['_never']; ?>
	</p>
	
	<p>
		<label class="title"><?php echo $YPL_LANG['dashboard_total']; ?></label>
		<?php echo $tpl['listing_count']; ?>
	</p>
	
	<p>
		<label class="title"><?php echo $YPL_LANG['dashboard_popular']; ?></label>
		<?php
		foreach ($tpl['arr'] as $v)
		{
			?>
			<span class="most_popular">
				<a class="img" href="<?php echo $_SERVER['PHP_SELF']; ?>?controller=AdminListings&amp;action=update&amp;id=<?php echo $v['id']; ?>"><img src="<?php echo !empty($v['pic']) ? $v['pic'] : BASE_PATH . IMG_PATH . 'no-image.gif'; ?>" alt="" /></a>
				<a class="lnk" href="<?php echo $_SERVER['PHP_SELF']; ?>?controller=AdminListings&amp;action=update&amp;id=<?php echo $v['id']; ?>"><?php echo stripslashes($v['listing_title']); ?></a>
			</span>
			<?php
		}
		?>
	</p>
	</div>
	
	</div>
	<div class="middle_right_box_bottom"><span>&nbsp;</span></div>
-->
<?php
}
?>
