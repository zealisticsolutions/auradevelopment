<?php
if (isset($_GET['err']))
{
	switch ($_GET['err'])
	{
		case 7:
			?><p class="status_err"><span>&nbsp;</span><?php echo $YPL_LANG['status'][7]; ?></p><?php
			break;
	}
}
	
if (count($tpl['gallery_arr']) > 0)
{
	$pi = 0;
	foreach ($tpl['gallery_arr'] as $v)
	{
		$closed = false;
		?>
		<span style="margin: 0; padding: 0; width: auto; float: left; margin: 0 5px 5px 0">
			<a href="<?php echo $v['large_path']; ?>" class="fancybox" rel="group"><img src="<?php echo $v['small_path']; ?>" alt="<?php echo htmlspecialchars(stripslashes($v['title'])); ?>" class="gallery" /></a><br />
			<a href="<?php echo $_SERVER['PHP_SELF']; ?>?controller=Admin&amp;action=setPicture" class="status-pic" title="<?php echo $YPL_LANG['_switch']; ?>" rel="#pictureGallery" rev="<?php echo $v['id'], "-", $v['foreign_id']; ?>"><img src="<?php echo IMG_PATH . 'icons/' . ($v['status'] == 'T' ? 'accept.png' : 'delete.png'); ?>" alt="<?php echo $YPL_LANG['_switch']; ?>" /></a>
			<a href="<?php echo $_SERVER['PHP_SELF']; ?>?controller=Admin&amp;action=deletePicture" class="del-pic" title="<?php echo $YPL_LANG['_delete']; ?>" rel="#pictureGallery" rev="<?php echo $v['id'], "-", $v['foreign_id']; ?>"><img src="<?php echo IMG_PATH . 'icon_delete.png'; ?>" alt="<?php echo $YPL_LANG['_delete']; ?>" /> <?php echo $YPL_LANG['_delete']; ?></a>
		</span>
		<?php
		$pi++;
		if ($pi % 5 == 0)
		{
			$closed = true;
			?><br style="clear: left" /><?php
		}
	}
	
	if (!$closed)
	{
		?><br style="clear: left" /><?php
	}
} else {
	?>
	<label class="title"><?php echo $YPL_LANG['listing_image']; ?></label><input type="text" name="title[]" class="text_medium" /> <input type="file" name="images[]" />
	<p class="status_notice"><?php echo $YPL_LANG['listing_image_empty']; ?></p><?php
}
?>