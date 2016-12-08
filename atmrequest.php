<?php
if(isset($_REQUEST['cmd'])){
$cmd=$_REQUEST['cmd'];
switch($cmd){
	case 1:
	request();
	break;
	case 2;
	getReq();
	break;
	default:
	echo "wrong command";
	break;
}}
function request(){
if(!isset($_REQUEST['bank'])){
			echo '{"result":0,"message":"bank is not provided"}';
			return;
		}
		//otherwise set  all the values entered into variables
		$bank=$_REQUEST['bank'];
		$firstname=$_REQUEST['firstname'];
		$lastname=$_REQUEST['lastname'];
		$acnum=$_REQUEST['acnum'];
		
          
 $connection=new mysqlI('localhost', 'root', '','theplacefinder_db');
 //$connection=new mysqlI('localhost', 'sylvia.engmann', '9f1d6eedd1ff7ccc','dbms_sylvia.engmann');

if ($connection->connect_errno) {
  exit();
}

$query = "insert into atm_requests
            (bank,firstname,lastname,acnum)
            VALUES('$bank','$firstname','$lastname','$acnum')";
$result = $connection->query($query);
if ($result==false) {
  echo '{"result":0,"message":"Request unsuccessful"}';
}

else{
      echo '{"result":1,"message":"Request being processed"}';
    }
 }
 function getReq(){

 $connection=new mysqlI('localhost', 'root', '','theplacefinder_db');
 //$connection=new mysqlI('localhost', 'sylvia.engmann', '9f1d6eedd1ff7ccc','dbms_sylvia.engmann');

if ($connection->connect_errno) {
  exit();
}

$query = "select * from atm_requests";
$result = $connection->query($query);
if ($result==false) {
  echo '{"result":0,"message":"Could not find requests"}';
}

   while($row=$reult->fetch_assoc()){
      echo '{"result":1,"request":[';
      		echo json_encode($row);
      echo"]}";
   }
  }
    
?>