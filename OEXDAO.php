<?php 
	class OEXDAO{

		public static function insertExamineeData($_fname, $_lname, $_email, $_pass){
			try{
				global $db;
				if(!$_email) return false;
				if(!$_pass) return false;
				$query = "select * from examinee where email in('$_email') and pass in('$_pass')";
				$value = $db->query($query);
				if($value){
					if($value->num_rows>0){
						return false;
					}else{
						$sql = "Insert into examinee(fname, lname, email, pass, score, date) value('$_fname','$_lname', '$_email', '$_pass','0', current_date)";
						$result = $db->query($sql);
						return $result;
					}
				}else{
					echo "error";
				}
			}
			catch(Exception $e){
            	error_log($e->getMessage());
        	}
        	return false;
		}

		public static function loginInfo($_user, $_pass){
		try{
			global $db;
			$sql = "SELECT id, fname, lname FROM examinee WHERE email = '$_user' AND pass = '$_pass'";
			$result = $db->query($sql);
			if($result){
				if ($result->num_rows>0) {
               		return $result->fetch_assoc();
	            } else {
	                return false;
	            }
	        }else{
				echo "<script>alert('Error');window.location.href='Login.php'</script>";
					return false;
	        }
		}
		catch(Exception $e){
            	echo "error";
        	}
		}

		public static function Email($_email){
			try{
				global $db;
				if (!$email) return false;
				$query = "SELECT * FROM examinee WHERE email = '{$_email}'";
				$result = $db->query($query);
				if($result->num_rows > 0){
					return true;
				}else{
					return false;
				}
			}catch(Exception $e){
				echo "error";
			}
			
		}
		public static function getQuestion($num){
			try{
				global $db;
				$sql = "Select id, question, choiceA, choiceB, choiceC, choiceD, result from questions where id = '$num'";
				$result = $db->query($sql);
				return $result->fetch_assoc();
			}catch(Exception $e){
				echo "error";
			}
		}
		public static function getResult($num, $answer){
			try{
				global $db;
				$sql = "Select id, question, choiceA, choiceB, choiceC, choiceD, result from questions where id = '$num' and result = '$answer'";
				$res = $db->query($sql);
				if($res->num_rows>0){
					return 1;
				}else{
					return 0;
				}
			}catch(Exception $e){
				echo "error";
			}
		}
		public static function getForms()
		{
			try{
				global $db;
				$sql = "Select * from questions";
				$result = $db->query($sql);
				if ($result->num_rows > 0) {
					$array = array();
					while ($row =$result->fetch_assoc()) {
						$array[] = $row;
					}
				}
				return $array;
			}catch(Exception $e){
				echo "error";
			}
		}
		public static function computeScore($Id, $score){
			try{
				global $db;
				$sql = "UPDATE examinee SET score = ('$score') where id = '$Id'";
				$result = $db->query($sql);
				return $result;
			}catch(Exception $e){
				echo "error";
			}
		}
		public static function getANSWERS(){
			try{
				global $db;
				$sql = "SELECT result FROM questions ORDER BY id";
				$result = $db->query($sql);
				$answer = array();
				while($rows = $result->fetch_assoc()){
					$answer[] = $rows['result'];
				}
				return $answer;
			}catch(Exception $e){
				error_log($e->getMessage());
			}
			return false;
		}

		public static function checkAnswer($answer){
			try{
				$correct = self::getANSWERS();
				if($correct === false){
					error_log("Answers are not ready!!");
					return false;
				}if(count($correct) != strlen($answer)){
					error_log("Your answer are not valid");
					return false;
				}
				$val = 0;
				for($a = 0; $a < 10 ;$a++){
					if($answer[$a] == $correct[$a]){
						$val++;
					}
				}
				return $val;
			}catch(Exception $e){
				error_log($e->getMessage());
			}
			return false;
		}
		public static function GenerateReport(){
			try{
				global $db;
				$sql = "Select * from examinee";
				$result = $db->query($sql);
				if ($result->num_rows > 0) {
					$array = array();
					while ($row =$result->fetch_assoc()) {
						$array[] = $row;
					}
				}
				return $array;
			}catch(Exception $e){
				echo "error";
			}
		}
	}
 ?>