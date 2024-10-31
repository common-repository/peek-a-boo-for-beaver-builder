<?php
/**
 * Plugin Name: Peek-a-boo for Beaver Builder
 * Plugin URI: https://mapsteps.com/en/downloads/
 * Description: This Plugin allows you to preview your changes while the Page Builder is active. No need to save & publish changes to see the results!
 * Version: 1.0
 * Author: MapSteps
 * Author URI: https://mapsteps.com
 * Text Domain: peekaboo
 */

	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Plugin constants
	define( 'EDD_PEEK_A_BOO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
	define( 'EDD_PEEK_A_BOO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

	// Textdomain
	add_action( 'plugins_loaded', 'peek_a_boo_textdomain' );
	function peek_a_boo_textdomain() {
		load_plugin_textdomain( 'peekaboo', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
	}

	// Scripts & Styles
	function bb_peek_a_boo_scripts() {

		if( class_exists('FLBuilderModel') && FLBuilderModel::is_builder_active() ) {

			wp_register_script( 'bb-peek-a-boo', EDD_PEEK_A_BOO_PLUGIN_URL . '/assets/js/bb-peek-a-boo.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'bb-peek-a-boo' );
	
			wp_register_style( 'bb-peek-a-boo', EDD_PEEK_A_BOO_PLUGIN_URL . '/assets/css/bb-peek-a-boo.css' );
			wp_enqueue_style( 'bb-peek-a-boo' );

		}
	}
	add_action( 'wp_enqueue_scripts', 'bb_peek_a_boo_scripts', 99999 );

	// Output
	function bb_peek_a_boo_output() {
		// Check if bb is active
		if( class_exists('FLBuilderModel') && FLBuilderModel::is_builder_active() ) {
			echo '<div id="peek-a-boo-wrapper" class="pab-displaynone">';
				
				echo '<span id="peek-a-boo"><i class="fa fa-eye" aria-hidden="true"></i><div class="pab-tooltip">'. __('Preview', 'peekaboo') .'</div></span>';
			
			echo '</div>';
		}
	}
	add_action( 'wp_head', 'bb_peek_a_boo_output' );