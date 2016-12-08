<?php

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
//$connection=new mysqlI('localhost', 'root', '','theplacefinder_db');
$connection=new mysqlI('localhost', 'sylvia.engmann', '9f1d6eedd1ff7ccc','dbms_sylvia.engmann');

if ($connection->connect_errno) {
  exit();
}

// Select all the rows in the markers table
$query = "select * FROM places WHERE 1";
$result = $connection->query($query);
if ($result==false) {
  echo "result is false";
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<places>';

// Iterate through the rows, printing XML nodes for each
while ($row=$result->fetch_assoc()){
  // Add to XML document node
  echo '<marker ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo '/>';
}

// End XML file
echo '</places>';
?>
