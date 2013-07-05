<?php
/************************************************************************
Plugin Name: WP Resized Image Quality
Plugin URI: http://www.geekcoded.com/plugin/wp-resized-image-quality/
Description: Change the compression-level of uploaded images and thumbnails. Get better image quality or save bandwidth.
Version: 2.0
Author: Mike Bijon, GeekCoded
Author URI: http://www.mbijon.com/about-mike-bijon/
License: GPLv2

************************************************************************

    Copyright 2013 Mike Bijon, Etch Software LLC (mike@etchsoftware.com)
    
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2, 
    as published by the Free Software Foundation. 
    
    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    The license for this software can likely be found here: 
    http://www.gnu.org/licenses/gpl-2.0.html

************************************************************************/

if ( ! class_exists('WP_Resized_Image_Quality') ) :

class WP_Resized_Image_Quality {
	/**
	 * Plugin settings/options values. Will store an array()
	 */
	public $riq_options;
	
	/**
	 * Plugin settings/options values. Will store an array()
	 */
	public $jpeg_quality;
	
	/**
	 * Error holder
	 */
	public $error = '';
	
	/**
	 * Vesrion # of WP-Resized-Image-Quality
	 */
	const RIQ_PLUGIN_VERSION = '1.0';
	
	
	/**
	 * Constructor: Actions setup
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'wp_init' ) );
		add_action( 'admin_menu', array( $this, 'admin_page_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_page_statics' ) );
	}

	/**
	 * Plugin setup, post-construct. Fires on 'init' hook
	 */
	public function wp_init() {
		// Setup data/array once
		if ( ! is_array( $this->riq_options ) && false === ( get_transient( 'riq_jpeg_quality' ) ) )
			add_option( 'riq_options', array(), false, false );
			
		// The whole reason we're here
		add_filter( 'jpeg_quality', array( $this, 'get_jpeg_quality_setting' ) );
		
		load_plugin_textdomain( 'wp-resized-image-quality', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
		if ( '' != WPLANG )
			setlocale( LC_ALL, WPLANG . '.UTF-8' );
		
		// Custom scripts & styles
		wp_register_script(
			'riq-admin',
			plugins_url( 'js/riq-admin.js', __FILE__ ),
			array( 'jquery', 'jquery-ui-slider' ),
			'riq_' . self::RIQ_PLUGIN_VERSION, //microtime(),
			true
		);
		wp_register_style(
			'riq-jquery-ui',
			plugins_url( 'css/jquery-ui.css', __FILE__ ),
			false,
			'riq_' . self::RIQ_PLUGIN_VERSION,
			'all'
		);
	}
	
	// Add submenu under Settings in WP-Admin		
	public function admin_page_menu() {
		$options_page = add_options_page(
					'Image Quality',
					'Image Quality',
					'manage_options',
					'riq-admin',
					array( $this, 'render_options_page' )
				);
		
		// Add contextual help menu in WP-admin
		//add_action("load-$admin_page", 'add_help_menu');
	}
	
	// For admin-only scripts
	public function admin_page_statics() {
		if ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] == 'riq-admin' ) {
			// JS
			wp_enqueue_script( 'jquery-ui-slider' );
			wp_enqueue_script( 'riq-admin' );
			
			// CSS
			wp_enqueue_style( 'riq-jquery-ui' );
		}
	}
	
	// HTML output for WP-Admin: Settings > Image Quality
	public function render_options_page() {
		// Security: Check that the user has the required capability 
		if ( ! current_user_can( 'manage_options' ) )
			wp_die( __( 'You do not have sufficient permissions to access this page. Please check your login and try again.', 'wp-resized-image-quality' ) );
		
		// Security: Check WP nonce to prevent external use
		if ( ! empty( $_POST['riq-integer'] ) && check_admin_referer( 'riq_update_admin_options', 'riq_admin_nonce' ) ) {
			if ( ! empty( $_POST['riq-defaults'] ) && 'Reset to Default' == $_POST['riq-defaults'] )
				$confirm_update = $this->update_plugin_settings( (int)90 );
			else
				$confirm_update = $this->update_plugin_settings( $_POST['riq-integer'] );
			
		} elseif ( ! empty( $_POST['riq-integer'] ) ) {
			wp_die( __( 'Invalid: Update without permissions. Please check your login and try again.', 'wp-resized-image-quality' ) );
		}
		
		// Get the whole reason this plugin exists
		if ( false === ( $jpeg_quality = get_transient( 'riq_jpeg_quality' ) ) ) {
			$this->riq_options = get_option( 'riq_options' );
			
			if ( array_key_exists( 'jpeg_quality', $this->riq_options ) )
				$jpeg_quality = $this->riq_options['jpeg_quality'];
			else
				$jpeg_quality = (int)90;
			
			set_transient( 'riq_jpeg_quality', $jpeg_quality, 60 * 60 * 24 );
		}
		$this->jpeg_quality = $this->get_jpeg_quality_setting();
		
		// Include admin page/HTML output from separate file
		require_once( 'templates/riq-admin-page-template.php' );
	}
	
	// The whole reason this plugin exists
	public function get_jpeg_quality_setting() {
		if ( false === ( $jpeg_quality = get_transient( 'riq_jpeg_quality' ) ) ) {
			$this->riq_options = get_option( 'riq_options' );
			
			if ( array_key_exists( 'jpeg_quality', $this->riq_options ) )
				$jpeg_quality = $this->riq_options['jpeg_quality'];
			else
				$jpeg_quality = (int)90;
			
			set_transient( 'riq_jpeg_quality', $jpeg_quality, 60 * 60 * 24 );
		}
		
		return $jpeg_quality;
	}
	
	public function update_plugin_settings( $jpeg_quality = 90 ) {
		$this->riq_options['jpeg_quality'] = intval( $jpeg_quality );
		update_option( 'riq_options', $this->riq_options );
		
		$this->jpeg_quality = intval( $jpeg_quality );
		set_transient( 'riq_jpeg_quality', intval( $jpeg_quality ), 60 * 60 * 24 );
		
		return true;
	}
	
	// Contextual help menu
	public function add_help_menu() {
		
	}
	
	/**
	 * Deletes all plugin options
	 */
	public function plugin_deactivation( $network_wide ) {
		delete_option( 'riq_options' );
	}
}
$riq = new WP_Resized_Image_Quality();


register_deactivation_hook( __FILE__, array( $riq, 'plugin_deactivation' ) );


endif;