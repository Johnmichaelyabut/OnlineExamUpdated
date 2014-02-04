<?php 
	include 'config.php';
	include 'OEXDAO.php';

	$total = $_POST['total1'];
	$id = $_POST['id1'];
	$insert = OEXDAO::computeScore($id, $total);
 ?>