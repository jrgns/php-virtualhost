<?php
$host   = $_SERVER['HTTP_HOST'];
$folder = getcwd() . '/' . $host . '/';
if (!file_exists($folder)) {
	no_host();
	die;
}
if (empty($_REQUEST['f'])) {
	$indexes = array(
		'index.php', 'index.html', 'index.htm', 'main.php'
	);
	foreach($indexes as $index) {
		if (file_exists($folder . $index)) {
			chdir($folder);
			include($folder . $index);
			die;
		}
	}
} else {
	$file = $_REQUEST['f'];
	//TODO Security
	if (file_exists($folder . $file)) {
		//TODO Security
		$info = explode('.', $file);
		switch(end($info)) {
		case 'js':
			header('Content-Type: text/javascript');
			break;
		case 'css':
			header('Content-Type: text/css');
			break;
		}
		readfile($folder . $file);
		die;
	}
}

function no_host() {
	global $host;
?><!DOCTYPE html>
<html>
	<head>
		<title>Unknown Domain: <?php echo $host ?></title>
	</head>
	<body>
		<div style="text-align: center;">
			<h1>Unknown Domain: <?php echo $host ?></h1>
		</div>
		<div>
			This domain has not been setup correctly. Please contact the owner.</a>
		</div>
	</body>
</html>

<?php
}
no_host();
