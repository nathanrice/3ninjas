<?php
$css_dir = get_stylesheet_directory_uri() . '/css/';

return [
	'pt-mono'        => [
		'path'     => 'https://fonts.googleapis.com/css?family=PT+Mono&display=swap',
		'version'  => '1.0.0',
		'deps'     => [],
		'hook'     => 'genesis_header',
	],
	'theme-header'   => [
		'path'     => $css_dir . 'header.css',
		'version'  => '1.0.0',
		'deps'     => [ genesis_get_theme_handle() ],
		'hook'     => 'genesis_header',
	],
	'theme-footer'   => [
		'path'     => $css_dir . 'footer.css',
		'version'  => '1.0.0',
		'deps'     => [ genesis_get_theme_handle() ],
		'hook'     => 'genesis_footer',
	],
	'theme-main'     => [
		'path'     => $css_dir . 'main.css',
		'version'  => '1.0.0',
		'deps'     => [ genesis_get_theme_handle() ],
		'hook'     => 'genesis_before_content',
	],
	'theme-sidebar'  => [
		'path'     => $css_dir . 'sidebar.css',
		'version'  => '1.0.0',
		'deps'     => [ genesis_get_theme_handle() ],
		'hook'     => 'genesis_sidebar',
	],
	'theme-entry'    => [
		'path'     => $css_dir . 'entry.css',
		'version'  => '1.0.0',
		'deps'     => [ genesis_get_theme_handle() ],
		'hook'     => 'genesis_before_entry',
	],
	'theme-comments' => [
		'path'     => $css_dir . 'comments.css',
		'version'  => '1.0.0',
		'deps'     => [ genesis_get_theme_handle() ],
		'hook'     => 'genesis_comments',
	],
];
