<?php 


class PhoneValidator extends Validator {
	protected $regex = '/^\(\d{3}\) \d{3}-\d{4}$/';
	
}


?>