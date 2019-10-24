<?php
/**
 * Custom functionality for the Easy Writer theme.
 */

namespace NathanRice\EasyWriter;

spl_autoload_register( function( $class_name ) {
	$class_name  = str_replace( [ 'NathanRice\\', 'EasyWriter\\', '\\' ], [ '', '', '/' ], $class_name );
	$include_dir = dirname( __FILE__ ) . '/includes/';
	$file        = $include_dir . $class_name . '.php';
	if ( file_exists( $file ) ) {
 		require_once( $file );
	}
} );

add_action( 'genesis_setup', function() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	add_filter( 'xmlrpc_enabled', '__return_false' );

	add_theme_support(
		'html5',
		[
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption'
		]
	);
	add_theme_support(
		'genesis-accessibility',
		[
			'drop-down-menu',
			'headings',
			'search-form',
			'skip-links',
		]
	);

	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );
	genesis_unregister_layout( 'sidebar-content' );
	genesis_unregister_layout( 'content-sidebar' );

	add_theme_support( 'genesis-structural-wraps', [] );

	front_styles();
} );

/**
 * Register the modular CSS for this theme.
 */
function front_styles() {
	$styles_registry = new Styles\Registry(
		genesis_get_config( 'css' )
	);

	add_action( 'wp_enqueue_scripts', [ $styles_registry, 'register_front_styles' ] );

	foreach ( $styles_registry->modules as $name => $module ) {
		add_action( $module['hook'], function() use ( $name ) {
			wp_print_styles( $name );
		} );
	}
}
