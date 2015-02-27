<?php 

class Templates {
	
	public function __construct() {
		$this->parts = $this->build_path(array("templates","parts"), false);
	}

	/**
	 * Build file paths.
	 *
	 * Build paths with arrays Call out of static function class_name->build_path
	 * or self::build_path. Use like:
	 *
	 * 		build_path(array("home", "alice", "Documents", "example.txt"));
	 *
	 * @see http://php.net/manual/en/dir.constants.php
	 * @global string DIRECTORY_SEPARATOR Called from class definition, system variable
	 *
	 * @param array $segments The pieces of the URL, should be array of strings. Default null Accepts string.
	 * @param bool $leading Optional If the returned path should have a leading slash. Default true.
	 * @param bool $url Optional If the returned path should use web URL style pathing or system style. Default false
	 * @return string The composed path.
	 *
	 */
	public function build_path($segments=array(), $leading = true, $url = false) {
		if ($url){
            $slash = '/';
        } else {
            $slash = DIRECTORY_SEPARATOR;
        }
        $string = join($slash, $segments);
		if ($leading){
			$string = $slash . $string;
		}
		# Let's make sure eh?
		if ('/' != $slash){
			$string = str_replace('/', $slash, $string);
		}
		return $string;
	}

	/**
	 * Get a given view (if it exists)
	 * 
	 * @param string     $view      The slug of the view
	 * @return string
	 */
	public function get_view( $view, $vars = array() ) {
		$view_file = $this->build_path(array($this->parts, $view.'.tpl.php'), false);
		#if (WP_DEBUG){ var_dump( $view_file ); }
		if ( ! file_exists( $view_file ) ){
			if (WP_DEBUG){ var_dump( $view_file ); }
			return ' ';
		}
		extract( $vars, EXTR_SKIP );
		ob_start();
		include $view_file;
		return ob_get_clean();
	}

	public function the_view_for($view, $vars = array()){
		echo $this->get_view($view, $vars);
	}

}