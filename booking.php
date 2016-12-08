<?php
if(isset($_REQUEST['cmd'])){
$cmd=$_REQUEST['cmd'];
switch($cmd){
	case 1:
	book();
	break;
	case 2;
	getBookings();
	break;
	default:
	echo "wrong command";
	break;
}
}
function book(){
if(!isset($_REQUEST['hotel'])){
			echo '{"result":0,"message":"hotel is not provided"}';
			return;
		}
		//otherwise set  all the values entered into variables
		$hotel=$_REQUEST['hotel'];
		$firstname=$_REQUEST['firstname'];
		$lastname=$_REQUEST['lastname'];
		$datein=$_REQUEST['datein'];
		$numdays=$_REQUEST['numdays'];	
          
 $connection=new mysqlI('localhost', 'root', '','theplacefinder_db');
 //$connection=new mysqlI('localhost', 'sylvia.engmann', '9f1d6eedd1ff7ccc','dbms_sylvia.engmann');

if ($connection->connect_errno) {
  exit();
}

$query = "insert into booking
            (hotel,firstname,lastname,datein,numdays)
            VALUES('$hotel','$firstname','$lastname','$datein','$numdays')";
$result = $connection->query($query);
if ($result==false) {
  echo '{"result":0,"message":"Booking unsuccessful"}';
}

else{
      echo '{"result":1,"message":"Request being processed"}';
    }
 }

 function getBookings(){

 $connection=new mysqlI('localhost', 'root', '','theplacefinder_db');
 //$connection=new mysqlI('localhost', 'sylvia.engmann', '9f1d6eedd1ff7ccc','dbms_sylvia.engmann');

if ($connection->connect_errno) {
  exit();
}
$query = "select * from booking";
$result = $connection->query($query);
if ($result==false) {
  echo '{"result":0,"message":"Could not find booking"}';
}
   while($row=$reult->fetch_assoc()){
      echo '{"result":1,"booking":[';
      		echo json_encode($row);
      echo"]}";
   }
 }  
?>