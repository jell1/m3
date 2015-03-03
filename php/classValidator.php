<?php 

class Validator {
	public function isValid($input) {
		return preg_match($this->regex, $input);
	}

}
?>