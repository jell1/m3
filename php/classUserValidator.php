<?php 

class UserValidator extends Validator {
	protected $regex = '/^[a-z\d_]{5,20}$/i';
			 	
}


?>