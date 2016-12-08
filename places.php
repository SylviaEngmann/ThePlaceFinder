<?php
if(!isset($_REQUEST['name'])){
      echo '{"result":0,"message":"name is not provided"}';
      return;
    }
    //otherwise set  all the values entered into variables
    $name=$_REQUEST['name'];
    $address=$_REQUEST['address'];
    $latitude=$_REQUEST['lat'];
    $longitude=$_REQUEST['lng'];
    $type=$_REQUEST['type'];
    
// Opens a connection to a MySQL server
//$connection=new mysqlI('localhost', 'root', '','theplacefinder_db');
$connection=new mysqlI('localhost', 'sylvia.engmann', '9f1d6eedd1ff7ccc','dbms_sylvia.engmann');

if ($connection->connect_errno) {
  exit();
}

$query = "insert into places
            (name,address,lat,lng,type)
            VALUES('$name','$address','$latitude','$longitude','$type')";
$result = $connection->query($query);
if ($result==false) {
  echo '{"result":0,"message":"Place not added"}';
}

else{
      echo '{"result":1,"message":"Place added"}';
    }
    
?>
