<?php
/**
 * Style Registery.
 */

namespace NathanRice\EasyWriter\Styles;

class Registry {
	/**
	 * The modules to register CSS for.
	 */
	public $modules;

	/**
	 * The constructor.
	 *
	 * Assigns the modules property.
	 *
	 * @since 1.0.0
	 */
	public function __construct( array $modules ) {
		$this->modules = $modules;
	}

	/**
	 * Register the stylesheet for each module.
	 */
	public function register_front_styles() {
		foreach ( $this->modules as $name => $module ) {
			wp_register_style(
				$name,
				$module['path'],
				$module['deps'],
				$module['version']
			);
		}
	}
}
