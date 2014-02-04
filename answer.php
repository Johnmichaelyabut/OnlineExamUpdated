<?php 
	require_once 'OEXDAO.php';
	include 'config.php';
	$answer = (isset($_GET['Answer1'])) ? $_GET['Answer1'] : false;
	$num = (isset($_GET['num_ques'])) ? $_GET['num_ques'] : false;
	$isCor = OEXDAO::getResult($num-1, $answer);

	echo json_encode(
		array(
			'is_correct'=> $isCor,
			'answer'=> $answer,
			'num'=> $num
			)
		);

 ?>