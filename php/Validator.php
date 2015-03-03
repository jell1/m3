<?php

// Validator: this is the parent class of all the "concrete" validator sub-classes
// EmailValidator: validate an email address
// UsernameValidator: validate a username
// PasswordValidator: validate a password
// PhoneValidator: validate a phone number
// NumberValidator: validate a number
// ValidatorFactory: create an appropriate Validator for a given input type

// ********************************************************************************
// class Validate {
// 	protected $regex = '';

// 	public function isValid($input) {
// 		if(strlen($this->regex) == 0) {
// 			throw new Exception("called w empty regex");
// 		}
// 		return preg_match($regex, $input);
// 	}
// }
// class Email extends Validate {
// 	protected $regex = '';
// 	}
// }
//************************************************************************************
//************************************************************************************
// or

// 	class Validate {
// 		public function isValid($input) {
// 			throw new Exception("should call a subclass");
// 		}
// 	}

// 	class email {
// 		public function isValid($input) {
// 			return preg_match(pattern, $input); 
// 		}
// 	}
//**************************************************************************************


class Validate {
	
	public $errorMessage = [];

	

	public function emailValid($email) {
		if (!preg_match('/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', $email)) {
			$this->errorMessage[] = 'Invalid: Email';
		} 
	}

	public function zipCode($zip) {
		if (!preg_match('/^[0-9]{5}$/', $zip)) {
			$this->errorMessage[] = 'Invalid Zip Code';
		} 
	}


	public function nameValid($text) {
		if (!preg_match('/^[A-Za-z]+$/', $text)) {
			$this->errorMessage[] = 'Invalid Name';
		} 
	}

	public function numberValid($num) {
		if (!preg_match('/^-?[0-9]+$/', $num)) {
			$this->errorMessage[] = 'Invalid Number';
		} 
	}

	public function phoneValid($phone) {
		if (!preg_match('/^\(\d{3}\) \d{3}-\d{4}$/', $phone)) {
			$this->errorMessage[] = 'Invalid Phonenumber';
		} 
	}


//  consist of alpha-numeric (a-z, A-Z, 0-9), underscores, and has minimum 5 character and maximum 20 character
	public function userValid($user) {
		if (!preg_match('/^[a-z\d_]{5,20}$/i', $user)) {
			$this->errorMessage[] = 'Invalid Username';
		} 
	}

//  At least 8 char, at lease 1 lowercase, at least 1 uppercase, at least 1 number, at least 1 special char 
	public function passValid($pass) {
	if (!preg_match('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $pass)) {
		$this->errorMessage[] = 'Invalid Password';
	} 
}

}

$validate = new Validate();

if (isset($_POST['text'], $_POST['text2'], $_POST['zip'], $_POST['email'], $_POST['num'], $_POST['phonenum'], $_POST['user'], $_POST['pass'])) {
	
	$validate->nameValid($_POST['text']);
	$validate->nameValid($_POST['text2']);
	$validate->zipCode($_POST['zip']);
	$validate->emailValid($_POST['email']);
	$validate->numberValid($_POST['num']);
	$validate->phoneValid($_POST['phonenum']);
	$validate->userValid($_POST['user']);
	$validate->passValid($_POST['pass']);

} else {
	echo "";
}

if (count($validate->errorMessage) <= 0) {
	echo 'Welcome, Please fill out form: ';
}

if (count($validate->errorMessage) > 0) {
	echo 'Please fill out form Properly: ';
	foreach ($validate->errorMessage as $key => $value) {
			echo " " . $value;
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validator</title>
	
	<style>
	
	body {
		background-color: #eee;
		color: blue;
		background-size; cover;
		background-repeat: no-repeat;
	}
	
	div {
		background-color: #ddd;
		padding: 5px;
		margin: 5px;
	}

	</style>

</head>
<body>
	<div>
 	<form action="" method="POST" onSubmit="alert('Thank you!');">
 		<label>First Name: <input type="text" name="text"></label>
 		<label>Last Name: <input type="text" name="text2"></label>
 		<label>Zip Code: <input type="text" name="zip" placeholder="5 digits"></label>
 		<label>Email: <input type="text" name="email"></label>
 		<label>Age: <input type="text" name="num"></label>
 		<label>Phone Number: <input type="text" name="phonenum" placeholder="(xxx) xxx-xxxx"></label>
 		<label>Username: <input type="text" name="user" placeholder="min 5 characters"></label>
 		<label>Password: <input type="text" name="pass" placeholder="Aa1*8charactermin"></label>
		<button>Submit</button>
		<input type="reset" value="Clear form" />
 	</form>	
 	</div>
</body>
</html>

// $inputs = [
// 	'name' => $_POST['name'],
// 	'email' => $_POST['email'],
// 	'phonenumber' => $_POST['phonenumber'],
// 	'username' => $_POST['username'],
// 	'password' => $_POST['password']
// ];


// foreach ($inputs as $key => $value) {
// 	echo $key, $value;
// }

// $inputs = [
// 	[	
// 		'name' => 'email',
// 		'type' => 'email',
// 		'error' => 'Email must contain "@"',
// 		'isValid' => false,
// 		'value' => '',
// 		'label' => 'email'
// 	],
// 	[
// 		'name' => 'name',
// 		'type' => 'name',
// 		'error' => 'must contain only letters',
// 		'isValid' => false,
// 		'value' => '',
// 		'label' => 'name'
// 	]

// ];

// $vf = new ValidatorFactory();


// foreach ($inputs as $name => $field_attrs) {
// 	if (isset($_POST[$name])) {		
// 		$value = $_POST[$name];		
// 		echo $value;
// 		$validator = $vf->getValidator($field_attrs['type']);
		
// 		$field_attrs['value'] = $value;
// 		$field_attrs['isValid'] = $validator->isValid($value);
// 	} else {
// 		$field_attrs['error'] = 'no input value';
// 	}
// }

// $html_inputs = [];
// foreach ($fields as $field_attrs) {
// 	$html = $field_attrs['label'] . ': <input type="text" name="' . $field_attrs['name'] . " " . 
// 		' value="' . $field_attrs['value'] . '">'
// 	$html_inputs[]= $html;

// }




// function validate($type, $value) {
// 	$vf = new ValidatorFactory();
// 	$validator = $vf->getValidator($type);
// 	return $validator->isValid($value);

// }


