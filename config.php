<?php 
	$config = array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'examwebapp'
	);

	mysql_connect(
		$config['host'],
		 $config['username'], 
		 $config['password']
		 );

	mysql_select_db(
		$config['database']
		);

	$db = new mysqli(
		$config['host'],
		$config['username'],
		$config['password'],
		$config['database']
	);

	if (mysqli_connect_errno()) {
		echo 'An error occured. Please try again later.';
		exit;
	}
 ?>