<?php
	if($_POST['zaparena_hidden'] == 'Y') {
		//Form data sent
		$widgetid = $_POST['zaparena_widgetid'];
		update_option('zaparena_widgetid', $widgetid);
		?>
		<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		<?php
	} else {
		//Normal page display
		$widgetid = get_option('zaparena_widgetid');  
	}
?>
			
		
		
		<div class="wrap">
			<?php    echo "<h2>" . __( 'zaparena Options', 'zaparena_trdom' ) . "</h2>"; ?>

			<form name="zaparena_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
				<input type="hidden" name="zaparena_hidden" value="Y">
				<?php    echo "<h4>" . __( 'Widget Options', 'zaparena_trdom' ) . "</h4>"; ?>
				<p><?php _e("Widget ID: " ); ?><input type="text" name="zaparena_widgetid" value="<?php echo $widgetid; ?>" size="20"></p>

				<p class="submit">
				<input type="submit" name="Submit" value="<?php _e('Update Options', 'zaparena_trdom' ) ?>" />
				</p>
			</form>
		</div>
	