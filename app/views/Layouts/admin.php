<?php require VIEWS_PATH . 'Layouts/elements/header.php'; 
// echo $_GET['controller'];
?>
				
<div id="middle_wrap" <?php /*if(($_GET['controller'] == "User") and (($_GET['action'] == "index") or ($_GET['action'] == "home") or ($_GET['action'] == "search"))) { echo 'class = "login-form"';}*/ ?>>

	<?php
	if(($_GET['controller'] == "AuraAdmin") and ($_GET['action'] == "index")){
	} else{
		?>
		
	
			<?php require VIEWS_PATH . 'Layouts/elements/leftmenu.php'; ?>
	
		
		<?php
	}
	?>

	<?php require $content_tpl; ?>

	
				
	<div class="clear_left"></div>
	
</div> <!-- middle_wrap -->

<?php require VIEWS_PATH . 'Layouts/elements/footer.php'; ?>