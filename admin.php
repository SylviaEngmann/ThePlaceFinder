<?php
if(!isset($_REQUEST['username'])){
			echo '{"result":0,"message":"username is not provided"}';
			return;
		}
		//otherwise set  all the values entered into variables
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];

		include_once("users.php");
		$obj=new user();
		$row = $obj->getAdminLogin($username,$password);
		if($row=false){
			echo "Error. User not found";
			exit();
		}
        $result = $obj->fetch();
if(($result['username'] == $username)&&($result['password'] == $password))
		{
            echo '{"result":1,"message":"Login successful"}';
             session_start();  
             $_SESSION['uid']=$result['uid'];
  
        }
         else{
                echo '{"result":0,"message":"Error username or password is wrong"}';
            }
?>