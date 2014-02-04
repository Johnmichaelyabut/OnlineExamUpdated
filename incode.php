<?php 
	require_once 'config.php';
	require_once 'OEXDAO.php';

	$_fname = $_POST['fname'];
	$_lname = $_POST['lname'];
	$_email = $_POST['email'];
	$_pass = sha1($_POST['pass']);

	$insert = OEXDAO::insertExamineeData($_fname, $_lname, $_email, $_pass);
		if($insert){
			echo "<script>alert('You may now login!!');window.location.href='ExamineePage.php'</script>";
		}else{
			echo "<script>alert('Your Email or Password already exist..');window.location.href='ExamineePage.php'</script>";
		}
 ?>