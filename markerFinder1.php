<?php
require("DBC.php");
// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];
// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

$propID = $_GET['id'];

// Search the rows in the markers table
$query = sprintf("SELECT id, name, propID, address,lat, lng,  ( 6371 * acos( cos( radians('%s') )
* cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') )
* sin( radians( lat ) ) ) ) AS distance FROM Marker WHERE propID='$propID' HAVING distance < '%s'
ORDER BY distance LIMIT 0 , 20",
  mysqli_real_escape_string($conn, $center_lat),
  mysqli_real_escape_string($conn, $center_lng),
  mysqli_real_escape_string($conn, $center_lat),
  mysqli_real_escape_string($conn, $radius));
$result = mysqli_query($conn, $query);
//$result = mysqli_query($conn, $query);
if (!$result) {
  die("Invalid query: " .mysqli_connect_error());
}

header("Content-type: text/xml");
// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("id", $row['id']);
    $newnode->setAttribute("name", $row['name']);
    $newnode->setAttribute("address", $row['address']);
    $newnode->setAttribute("lat", $row['lat']);
    $newnode->setAttribute("lng", $row['lng']);
    $newnode->setAttribute("distance", $row['distance']);

    $propertyID = $row['propID'];
    $selectPropInfo = mysqli_query($conn, "SELECT * FROM Property WHERE Property.id=$propertyID");
    $run = @mysqli_fetch_array($selectPropInfo);

    $newnode->setAttribute("price", $run['price']);
    $newnode->setAttribute("dates", $run['dates']);
    $newnode->setAttribute("capacityTotal", $run['capacityTotal']);
    $newnode->setAttribute("rented", $run['rented']);
    $newnode->setAttribute("propID", $run['id']);

}
echo $dom->saveXML();
?>
