<html>
	<?php 
		include 'config.php';
		include 'OEXDAO.php';
		session_start();
		$_SESSION['fname'];
		$_SESSION['lname'];
	 ?>
	 <?php
	 	define('QuestionNumber', 10); 
	 	$num_id = (isset($_POST['num'])) ? $_POST['num']+1 : 1;
	 	$answers = (isset($_POST['answers'])) ? $_POST['answers'] : "";
	 	$choice = (isset($_POST['choice'])) ? $_POST['choice'] : "";
	 	$answers .= $choice;

	 	if ($num_id > QuestionNumber) {
	 		$_SESSION['answers'] = $answers;
	 		$_SESSION['id'];
	 		$_SESSION['fname'];
			$_SESSION['lname'];
	 		header("Location: ResultHidden.php");
	 	}

	 	$sql = OEXDAO::getQuestion($num_id);
	 	$question = $sql['question'];
	 ?>

	<script src="js/jquery.1.10.2.js"></script>	
	 <script type="text/javascript">
	 $(document).ready(function(){
	 	$("#start").on('click', function(){
	 		if($('#a').is(":checked")){
	 			return true;
	 		}else if($('#b').is(":checked")){
	 			return true;
	 		}else if($('#c').is(":checked")){
	 			return true;
	 		}else if($('#d').is(":checked")){
	 			return true;
	 		}else{
	 			alert('Enter your Answer!!');
	 			return false;
	 		}
	 	});
	 });
	 </script>
	<head>
		<title>Online Examination</title>
	</head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<body>
		<?php include "Banner3.php"; ?>

		<div>
			<div id = "back-end" class = "container well span back">
			<form method = "POST" action = "questionaireHidden.php">
				<div id = "title" class = "page-header"><center><font face = "tolkien"><h1>Question <span id = "num"><?= $sql['id'] ?></span></h1></font></center></div><span id = "timer"></span>
					<div id = "div">
						<div class = "page-header" id = "QUEST"><?= $question ?></div>
						<input hidden name = "num" value = "<?= $num_id ?>">
						<input hidden name = "answers" value = "<?= $answers ?>">
						<label><div id = "choice1"><input type = "radio" value ="a" name = "choice" id = "a"/><?= $sql['choiceA']?></div></label>

						<label><div id = "choice2"><input type = "radio" value ="b" name = "choice" id = "b"/><?= $sql['choiceB']?></div></label>
					 	
						<label><div id = "choice3"><input type = "radio" value ="c" name = "choice" id = "c"/><?= $sql['choiceC']?></div></label>		

						<label><div id = "choice4"><input type = "radio" value ="d" name = "choice" id = "d"/><?= $sql['choiceD']?></div></label>
					<div class = "page-header"></div>
					<div>
						<?= $_SESSION['lname']; ?>, <?= $_SESSION['fname']; ?>
						<button class = "btn btn-primary" id = "start">Submit</button>
					</div>
				</div>
			</div>
			</form>		
		</div>
		<div id = "foot">
				<?php include 'footer.php'; ?>
		</div>
	</body>
</html>