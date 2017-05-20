<?php

	$conn = mysql_connect("localhost" , "root" , "" ) or die("could not connect");
	$selected = mysql_select_db("littlethings" , $conn);
	
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	
	$result = mysql_query("select * from user where firstName='$uname' and password = '$pass'");
	$row = mysql_fetch_array($result);
	if(($row['firstName'] == $uname) && $row['password']== $pass){
		echo "Login success!! welcome ".$row['firstName']." your email is ".$row['email']." refresh the page !!";
		header('location:HomeMadhuri.html');		
	}else{
		echo "Login fail!!! ";
	}
	mysql_close();


?>