<?php
require("phpSQLsearch.php");

$center_lat = $_GET["lat"];
$center_long = $_GET["long"];
$radius = $_GET["radius"];

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

$connection = mysqli_connect(localhost, $username, $password);

if(!$connection) {
  die("Connection not working");
}

$db_selected = mysql_select_db($database, $connection);
if(!$db_selected){
  die("Cant use db: ".mysql_error());
}

$query = sprintf("SELECT propID, lat, lng,
  (6371 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos ( radians(lng)-radians('%s'))
  + sin( radians('%s')) * sin( radians( lat )))) AS distance FROM Markers HAVING
  distance < '%s' ORDER BY distance LIMIT 0,20",
  mysql_real_escape_string($center_lat),
  mysql_real_escape_string($center_long),
  mysql_real_escape_string($center_lat),
  mysql_real_escape_string($radius));
  $result = mysql_query($query);
  //$result = mysql_query($query);
  if(!$result) {
    die("Invalid query: ".mysqli_error());
  }
  //header("Content-type: text/xml");

  //loop through rows and add XML nodes for each
  while($row = @mysqli_fetch_assoc($result)){
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("id", $row['propID']);
    $newnode->setAttribute("lat", $row['lat']);
    $newnode->setAttribute("lng", $row['lng']);
  }
  echo $dom->saveXML();

 ?>
