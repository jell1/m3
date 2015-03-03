<?php 

require_once 'classValidatorFactory.php';
require_once 'classValidator.php';
require_once 'classEmailValidator.php';
require_once 'classNameValidator.php';
require_once 'classPhoneValidator.php';
require_once 'classPasswordValidator.php';
require_once 'classUserValidator.php';


$inputs = [
	[
	'name' => 'email',
	'type' => 'email',
	'value' => '',
	'error' => 'Invalid: Must use @ symbol'
	
	],	
	[

	'name' => 'name',
	'type' => 'name',
	'value' => '',
	'error' => 'Invalid: Must contain only letters'

	],
	
	[

	'name' => 'phonenumber',
	'type' => 'phonenumber',
	'value' => '',
	'error' => 'Invalid: Must be in (xxx) xxx-xxxx format'

	],
	[

	'name' => 'username',
	'type' => 'username',
	'value' => '',
	'error' => 'Invalid: Must contain at least 6 characters'

	],
	[

	'name' => 'password',
	'type' => 'password',
	'value' => '',
	'error' => 'Invalid: Must contain 1upper, 1lower, 1number, 1special, at least 8 char'

	]

];

$hmtl = '';
$msg = '';
$name = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	foreach ($inputs as $idx => $fields) {
		$name = $fields['name'];
		$type = $fields['type'];
		$value = $_POST[$name];
		$fields['value'] = $value;
		$v = '';

		$vf = new ValidatorFactory();
		$validator = $vf->getValidator($type);
		$valid = $validator->isValid($value);

			if (isset($value)) {
				if ($valid) {
					$msg = 'Valid';
					$v = 'valid';
				} else {
					$msg = $fields['error'];
					$v = 'invalid';
				}
			}

		
	$html .= "$name: <input type=\"text\" name=\"$name\" value=\"$value\" class=\"$v\"> $msg <br>";

	}
} else {
	foreach ($inputs as $idx => $fields) {
		$html .= "{$fields['name']}: <input type=\"text\" name=\"{$fields['name']}\"> <br>";
	}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SuperValidator</title>
	<style>

	.valid {
		color: green;
	}	
	
	.invalid {
		color: red;
	}

	</style>
</head>
<body>
	SUPER VALIDATOR <br><br>
	<form action="" method="POST">
	<?php echo $html;?>
	<button>GO</button>
	</form>
</body>
</html>