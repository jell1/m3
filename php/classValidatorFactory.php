<?php 

require_once 'classEmailValidator.php';
require_once 'classNameValidator.php';
require_once 'classPhoneValidator.php';
require_once 'classValidator.php';
require_once 'classPasswordValidator.php';
require_once 'classUserValidator.php';


class ValidatorFactory {

	public function getValidator($type) {
		if($type == 'email') {
			return new EmailValidator();
		} elseif ($type == 'name') {
			return new NameValidator();
		} elseif ($type == 'phonenumber') {
			return new PhoneValidator();
		} elseif ($type == 'username') {
			return new UserValidator();
		} elseif ($type == 'password') {
			return new PasswordValidator();
		} else {
			throw new Exception("unknown validator");
		}
	}
}

?>