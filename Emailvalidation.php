<?php
	require_once("OEXDAO.php");
	$_email = $_POST['email'];
	$check = OEXDAO::Email($_email);

	if($check){
		echo "meron na";
	}else{
		echo "tama na";
	}

?>
















