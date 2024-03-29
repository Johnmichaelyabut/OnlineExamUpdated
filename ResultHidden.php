<?php 
	include 'config.php';
	include 'OEXDAO.php';
	session_start();
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$answer = (isset($_SESSION['answers'])) ? $_SESSION['answers']: false;
	$result = OEXDAO::checkAnswer($answer); 
	$score = $result * 10;	
 ?>	


<?php
	$id = (isset($_SESSION['id'])) ? $_SESSION['id']:false;
	$sql = OEXDAO::computeScore($id, $score);
?>

<html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<head>
		<title></title>
	</head>
	<body>
		<?php include "Banner3.php"; ?>
		<script src="js/jquery.1.10.2.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#start').click(function(){
					$('#R_esult').slideDown(1000).fadeIn(1000);
					$('#back-end').slideUp(1000).fadeOut(1000);
				});
				$('#view').click(function(){
					$('#R_esult').slideUp(2000).fadeOut(1000);
					$('#Report').slideDown(1000).fadein(1000);
				});
			});
		</script>
			<div id = "back-end" class = "container well span back">
					<div id = "title" class = "page-header"><center><font face = "tolkien">
						<?php if($result >7):?>
						<h1>Congratulation!!! you passed!!</h1>
						<?php else:?>
						<h1>Congratulation!! you failed!!</h1>
						<?php endif;?>
						</font></center>
					</div>
					<div id = "div">
						<div class = "page-header" id = "QUEST">
							<h3><center><u><?= $lname ?>, <?= $fname?></u></center></h3>
						</div>	
					</div>
					<div class = "page-header">
						<div>
							<span id = "output">Score: <?= $result ?></span>
							<span id = "output1">Equivalent: <?= $score ?></span>
						</div>
					</div>
					
					<div>
						<button class = "btn btn-info" id = "start" style = "font-size:1.5em">View Answer</button>
					</div>
				</div>
			</div>
		</div>
		<div class = "container span well hide" id = "R_esult">
			<div class = "page-header"><h2>Examination Review</h2><button class = "btn btn-info" style = "float:right;margin-top:-50px;margin-right:100px;" id = "view">View Records</button><a href="Logout.php"><button class = "btn btn-danger" style = "float:right;margin-top:-50px;margin-right:20px;">Logout</button></a></div>
			<?php 
			$rows = OEXDAO::getForms();
			foreach ($rows as $key ):
			 ?>
			<div><h4><span id = "Question"><?=$key['id']?>. <?=$key['question']?></span></h4></div>
			<div>
				<span id = "answerA">A. <?=$key['choiceA']?></span><br>
				<span id = "answerB">B. <?=$key['choiceB']?></span><br>
				<span id = "answerC">C. <?=$key['choiceC']?></span><br>
				<span id = "answerD">D. <?=$key['choiceD']?></span><br>
			</div>
			<div><span id = "Correct" style = "float:right;color:red">Answer: <?=$key['result']?></span></div>
			<div class = "page-Header"></div>
			<?php endforeach;?>
		</div>
		<div class = "container span well hide" id = "Report">
			<div class = "page-header"><h2>Examinee Report</h2><a href="Logout.php"><button class = "btn btn-danger" style = "float:right;margin-top:-50px;margin-right:20px;">Logout</button></a></div>
			<?php 
			$rows = OEXDAO::GenerateReport();
			foreach ($rows as $key ):
			 ?>
			<div><h4><span id = "Question"><?=$key['id']?>. <?=$key['fname']?> <?=$key['lname']?></span></h4></div>
			<div>
				<span id = "answerA">Email: <?=$key['email']?></span><br>
				<span id = "answerB">Score: <?=$key['score']?></span><br>
				<span id = "answerC">Date: <?=$key['date']?></span><br>
			</div>
			<div class = "page-Header"></div>
			<?php endforeach;?>
		</div>
	</body>
	<div id = "foot">
		<?php include 'footer.php'; ?>
	</div>
</html>