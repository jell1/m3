<?php 

require_once 'classValidator.php';

	class EmailValidator extends Validator {
		public function isValid($input) {
			return preg_match('/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', $input); 
	}
}

?>