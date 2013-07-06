<?php
// Report status of options update
if ( ! empty( $confirm_update ) && TRUE === $confirm_update ) {
	echo '<div class="updated"><p><strong>';
	_e('Your settings have been saved.', 'wp-resized-image-quality');
	echo '</strong></p></div>';
}
?>
<script type='text/javascript'>
// Inline JS, should run on hook but 'admin_print_scripts' is too late
var jpegQuality = '<?php echo $this->jpeg_quality; ?>';
</script>

<div class="wrap">
        <form method="post">
			<?php if ( function_exists('screen_icon') ) screen_icon(); ?>
			<h2><?php _e( 'Image Quality', 'wp-resized-image-quality' ); ?></h2>
			
			<table class="form-table">
				<tr>
					<td colspan="2">
						<?php $sm_url = admin_url( 'options-media.php' ); ?>
						<h3>Plugin Version 2.0, Update Note:</h3>
						<p>The slider below was added to the <a href="<?php echo $sm_url; ?>">Settings &gt; Media page</a> in version 2.0.
						<br />
						In version 3.0 this screen will be removed and the slider will only be on the <a href="<?php echo $sm_url; ?>">Settings &gt; Media page</a>.</p>
					</td>
				</tr>
				<tr>
					<th>
						<strong><?php _e( 'JPEG Quality %', 'wp-resized-image-quality' ); ?></strong>
					</th>
					<td>
						<div>
							<input type="text" class="riq-amount" id="riq-amount" style="border: 0; font-weight: bold;" />
							<br />
							<?php _e( 'The default compression setting in WordPress is 90%', 'wp-resized-image-quality' ); ?>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="riq-slider" id="riq-slider" style="width:400px;"></div>
						<input type="hidden" name="riq-integer" id="riq-integer" value="<?php echo $this->jpeg_quality; ?>" />
					</td>
				</tr>
			</table>
		<p class="submit">
			<input type="submit" name="riq-submit" id="riq-submit" class="button button-primary" value="Save Changes">
			<input type="submit" name="riq-defaults" id="riq-defaults" class="button button-primary" value="Reset to Default">
		</p>
		
		<?php
			// Add WordPress nonce for security
			wp_nonce_field( 'riq_update_admin_options', 'riq_admin_nonce' );
		?>
        </form>
</div>