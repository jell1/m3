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


$ev = new EmailValidator();
$nv = new NameValidator();
$pv = new PhoneValidator();
$pwv = new PasswordValidator();
$uv = new UserValidator();

if (isset($_POST['txtName'], $_POST['txtEmail'], $_POST['txtPhone'], $_POST['txtUser'], $_POST['txtPass'])) {
	$nv->isValid($name);
	$ev->isValid($email);
	$pv->isValid($phone);
	$uv->isValid($user);
	$pwv->isValid($pass);
}

?>

