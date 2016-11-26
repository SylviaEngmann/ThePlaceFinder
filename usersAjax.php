<?php
//check command
if(isset($_REQUEST['cmd'])){
$cmd=$_REQUEST['cmd'];
switch($cmd){
	case 1:
	login();
	break;
	case 2;
	addUser();
	break;
	default:
	echo "wrong command";
	break;
}
}
function login(){
	if(!isset($_REQUEST['username'])){
			echo '{"result":0,"message":"username is not provided"}';
			return;
		}
		//otherwise set  all the values entered into variables
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];

		include_once("users.php");
		$obj=new user();
		$row = $obj->getUserLogin($username,$password);
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
        }
function addUser(){
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

        //the code below is to test if the firstname has been entered
		// test code echo "the firstname is".$firstname;
		
		include_once("users.php");
		$obj=new user();

		$r=$obj->addUser($firstname,$email,$username,$password,$telephone);
		if($r==false){
			echo '{"result":0,"message":"User not added"}';

		}else{
			echo '{"result":1,"message":"User added"}';
     }
 }
?>
