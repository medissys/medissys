<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Errors {

	//private $CI;
	
	private $cle = '';
	private $value = '';

	public function __construct(){

		//$CI =& get_instance();
	}

	public function set_message( $key , $val ){
		
		$cle = $key;
		$value = $val;
	}

	public function getMessage( $cle ){

		echo $this->cle;
		echo $this->value;
		//return $CI->$value;
		return $this->value;
	}
}

/* Code igniter Error class. */
/* path: base_url().'/librairies/Errors.php */

?>