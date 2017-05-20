<?php
	$mysqli = new mysqli("localhost", "root", "" ,"littlethings");
	if($mysqli->connect_error){
		die('connect error:'.$mysqli->connect_error);
	}
	$fname = mysqli_real_escape_string($mysqli , $_POST['fname']);
	$lname = mysqli_real_escape_string($mysqli , $_POST['lname']);
	$email = mysqli_real_escape_string($mysqli , $_POST['email']); 
	$phone = mysqli_real_escape_string($mysqli , $_POST['phone']); 
	$pass =  mysqli_real_escape_string($mysqli , $_POST['pass1']);
	
	$flag =0;
	if(!@preg_match("/^[a-zA-Z]*$/" , $_POST["fname"])){
		$errMsg[] =" only A-Z letters are allowed for firstname!! register fail :( ";
		$flag =1;
		for($i =0; $i<sizeof($errMsg) ; $i++){
			$msg = " ".$errMsg[$i];
		}
		
	}
	if(!@preg_match("/^[a-zA-Z]*$/" , $_POST["lname"])){
		$errMsg[] =" only A-Z letters are allowed for lastName!! register fail :( ";
		$flag =1;
		for($i =0; $i<sizeof($errMsg) ; $i++){
			$msg = " ".$errMsg[$i];
		}
		
	}
	
	if( $flag == 0){
		$q = "SELECT * FROM user WHERE firstName ='$fname' lastName='$lname' ";
		$row = mysql_fetch_array($q);
		if($row['firstName'] == $fname && $row['lastName'] == $lname){
			echo  $fname." ".$lname." is already exist!!";
		}else{
		$sql = "INSERT INTO user (firstName, lastName , email, phoneNumber , password) VALUES ( '$fname' , '$lname','$email','$phone','$pass')";
		$insert = $mysqli->query($sql);
		
		if($insert === TRUE){	
			echo "Data successfully insert!!";
			
		}else{
		  echo "Error".$mysqli->error;
			}
		}
	  }else{
		echo $msg;
	}
	
	
	$mysqli->close();
	
	?>