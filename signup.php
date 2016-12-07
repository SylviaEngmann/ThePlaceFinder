<?php
if(!isset($_REQUEST['firstname'])){
			echo '{"result":0,"message":"firstname is not provided"}';
			return;
		}
		//otherwise set  all the values entered into variables
		$firstname=$_REQUEST['firstname'];
		$email=$_REQUEST['email'];
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		$telephone=$_REQUEST['phonenumber'];
		
		include_once("users.php");
		$obj=new user();

		$r=$obj->addUser($firstname,$email,$username,$password,$telephone);
		if($r==false){
			echo '{"result":0,"message":"User not added"}';

		}else{
			echo '{"result":1,"message":"User added"}';
     }
 ?>