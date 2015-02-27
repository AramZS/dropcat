<?php 

class DropCat {

	var $templates;

	public static function init() {
		static $instance;
		if ( ! is_a( $instance, 'DropCat' ) ) {
			$instance = new self();
		}
		return $instance;
	}

	private function __construct() {
		$this->includes();

		$this->set_up_templates();
	}

	function includes() {
		require_once('templates/maker.php');
	}

	function set_up_templates(){
		if ( empty( $this->templates ) ) {
			$this->templates = new Templates;
		}
	}

}

/**
 * Bootstrap
 *
 * You can also use this to get a value out of the global, eg
 *
 *    $foo = dropcat()->bar;
 *
 * @since 0.0.1
 */
function dropcat() {
	return DropCat::init();
}
// Start me up!
dropcat();