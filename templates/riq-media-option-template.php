	<script type='text/javascript'>
	// Inline JS, should run on hook but 'admin_print_scripts' is too late
	var jpegQuality = '<?php echo $this->jpeg_quality; ?>';
	</script>

	<div>
		Current Compression %: <input type="text" class="riq-amount" id="riq-amount" style="border: 0; font-weight: bold;" />
		<br />
		
		<div class="riq-slider" id="riq-slider" style="width:400px;"></div>
		<input type="hidden" name="riq-integer" id="riq-integer" value="<?php echo $this->jpeg_quality; ?>" />
		<br />
		
		<?php _e( 'The default JPEG compression setting in WordPress is 90%', 'wp-resized-image-quality' ); ?>
	</div>