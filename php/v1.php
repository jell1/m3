<?php 
require_once 'classValidator.php';
require_once 'classEmailValidator.php';
require_once 'classNameValidator.php';
require_once 'classPhoneValidator.php';
require_once 'classPasswordValidator.php';
require_once 'classUserValidator.php';


$name = $_POST['txtName'];
$email = $_POST['txtEmail'];
$phone = $_POST['txtPhone'];
$user = $_POST['txtUser'];
$pass = $_POST['txtPass'];


$emailValidator = new EmailValidator();
$nameValidator = new NameValidator();
$phoneValidator = new PhoneValidator();
$passwordValidator = new PasswordValidator();
$userValidator = new UserValidator();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if($nameValidator->isValid($name)) {
		$msg1 = "Valid";
	} else {
		$msg1 = "Invalid: Must contain letters only";
	}
	if($emailValidator->isValid($email)) {
		$msg2 = "Valid";
	} else {
		$msg2 = "Invalid: Must contain @ symbol";
	}
	if($phoneValidator->isValid($phone)) {
		$msg3 = "Valid";
	} else {
		$msg3 = "Invalid: Must be in (xxx) xxx-xxxx format";
	}
	if($userValidator->isValid($user)) {
		$msg4 = "Valid";
	} else {
		$msg4 = "Invalid: Must contain 6 characters";
	}
	if($passwordValidator->isValid($pass)) {
		$msg5 = "Valid"; 
	} else {
		$msg5 = "Invalid: must contain Uppercase, Lowercase, number, special char, at least 8 chars";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>V1</title>
</head>
<body>
	
	<form action=" " method="POST">
		<div>		
		Name: <input type="text" name="txtName" value="<?php echo $_POST['txtName'];?>"> <?php echo $msg1;?>
		</div>
		<div>
		Email: <input type="text" name="txtEmail" value="<?php echo $_POST['txtEmail'];?>"> <?php echo $msg2;?>
		</div>
		<div>
		Phonenumber: <input type="text" name="txtPhone" value="<?php echo $_POST['txtPhone'];?>"> <?php echo $msg3;?>
		</div>
		<div>
		Username: <input type="text" name="txtUser" value="<?php echo $_POST['txtUser'];?>"> <?php echo $msg4;?>
		</div>
		<div>
		Password: <input type="text" name="txtPass" value="<?php echo $_POST['txtPass']?>"> <?php echo $msg5;?>
		</div>
		<button type="submit" value="Submit">Submit</button> 
 	</form>
	
</body>
</html>