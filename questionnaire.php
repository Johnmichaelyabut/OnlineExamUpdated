<html>
	<?php 
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$id = $_POST['id'];
	 ?>
	<head>
		<title>Online Examination</title>
	</head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<body>
		<?php include "Banner3.php"; ?>

		<div>
			<div id = "back-end" class = "container well span hide">
				<div id = "title" class = "page-header"><center><font face = "tolkien"><h1>Question <span id = "num"></span></h1></font></center></div><span id = "timer"></span>
					<div id = "div">
						<div class = "page-header" id = "QUEST"></div>

						<label><div id = "choice1"><input type = "radio" value ="a" name = "choice" id = "a"/></div></label>

						<label><div id = "choice2"><input type = "radio" value ="b" name = "choice" id = "b"/></div></label>
					 	
						<label><div id = "choice3"><input type = "radio" value ="c" name = "choice" id = "c"/></div></label>		

						<label><div id = "choice4"><input type = "radio" value ="d" name = "choice" id = "d"/></div></label>
						<div id = "answer"><input type = "hidden" value = '<?php echo 0; ?>' id = "ans"></div>
					<div class = "page-header"></div>
					<div>
						<?=$lname?>, <?=$fname?>
						<button class = "btn btn-primary" id = "start1">Submit</button>
					</div>
				</div>
			</div>
			<div class="container well span" id = "submit">
				<div id = "exam"><h3>Click the submit Button to Start the Examination</h3></div>
				<div><h4>Finished it in alloted <font color = "red">10 minutes</font></h4></div>
				<div><h4>Your timer already moving</h4></div>
				<button class = "btn btn-primary " id = "start">Submit</button>
						<input type ="hidden" value = '<?=$id?>' id = "idko">
			</div>
			<div class = "container well span hide" id = "result">
				<h2><center>Exam Result</center></h2><span style = "float:left;"><h4 style = "margin-right:20px;margin-top:-15px">Examinee: <?=$fname?> <?=$lname?></h4></span><button class = "btn btn-info" id = "view" style = "float:right;margin-top:-50px">View Answers</button>
				<div class = "page-header"></div>
				<div class = "span" ><h3>Score:</h3><span id = "score"></span></div>
				<div class = "span offset2" ><h3>Total:</h3><span id = "total"></span></div><br>
			</div>
			<div class = "container span well hide" id = "R_esult">
				<div class = "page-header"><h2>Examination Review</h2><a href="ExamineePage.php"><button class = "btn btn-danger" style = "float:right;margin-top:-50px;margin-right:20px;">Logout</button></a></div>
				<?php 
				include 'config.php';
				include 'OEXDAO.php';

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
		</div>

		<div id = "foot">
				<?php include 'footer.php'; ?>
		</div>
		
	</body>
	<script src="js/jquery.1.10.2.js"></script>
	<script type="text/javascript" src = "question.js"></script>
	<script type="text/javascript" src = "result.js"></script>
</html>