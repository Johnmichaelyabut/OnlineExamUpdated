<?php 
	require_once 'OEXDAO.php';
	include 'config.php';
	$num = $_GET['num_ques'];
	$rows = OEXDAO::getQuestion($num);
	echo json_encode(
		array(
			'id_no'=>$rows['id'],
			'tanong'=> $rows['question'],
			'choiceA'=>$rows['choiceA'],
			'choiceB'=>$rows['choiceB'],
			'choiceC'=>$rows['choiceC'],
			'choiceD'=>$rows['choiceD']
			)
	);
 ?>