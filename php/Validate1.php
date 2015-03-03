<?php 

require_once 'Validate2.php';

$msg = 'hi';
$name = '';

if (isset($_POST['name'])) {
	if ($type == 'name') {
		if ($validator->isValid) {
			$msg = 'Valid';
		} else {
			$msg = 'Not Valid: Name can only consist of letters';
		}
	}
}










?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SuperValidator</title>
</head>
<body>
	SUPER VALIDATOR <br><br>
	<form action="" method="POST">
	<?php echo $html;?>
	<button>GO</button>
	</form>
</body>
</html>