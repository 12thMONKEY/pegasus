<?php
require_once ('utils/connect_db.php');

if (!isset($_SESSION['date'])) {
	$timestamp = time();
	$_SESSION['date'] = date('H:i:s', $timestamp);
}

if (!isset($_SESSION['login'])) {
	$_SESSION['login'] = 0;
}
?>

<!doctype html>

<html>
	<head>
		
		<title>Pegasus</title>
		<link rel="stylesheet" href="design/design.css" type="text/css">
		<script src="http://code.jquery.com/jquery-latest.pack.js" type="text/javascript"></script>
		<script src="js/md5.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="PGS_wrapper">
			<?php
	
			if ($_SESSION['login'] == 1) {
				include ('content/user_interface.php');
			} else {
				include ('content/login_screen.php');
			}
			?>
		</div>
	</body>
</html>
<?php
mysql_close($link);
?>