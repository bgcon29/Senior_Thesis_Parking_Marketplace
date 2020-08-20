<?php
session_start();
require('dbc.php');

$ownerUsername   = $_SESSION['ownerUsername'];
$ownerUsername   = stripcslashes($ownerUsername);
$ownerUser       = mysqli_real_escape_string($conn, $ownerUsername);
//$ownerName = mysqli_real_escape_string($conn, $ownerName);

if(isset($ownerUsername)) {
$SELECT = mysqli_query($conn, "SELECT id, ofirstName FROM `Owner` WHERE Username='$ownerUser' Limit 1");
$row = mysqli_fetch_array($SELECT);

$ownerID = $row['id'];
$ownerName = $row['ofirstName'];

$capacity        = $_POST['capacity'];
$price           = $_POST['price'];
$date            = $_POST['dateavail'];
$address         = $_POST['ostreetAdd'];
$city            = $_POST['oCity'];
$state           = $_POST['oState'];

$fullAddress = $_POST['ostreetAdd']." ".$_POST['oCity']." ".$_POST['oState'];

$rented     =   '0';
$revenue         = '0';

      $INSERT    = "INSERT INTO Property (capacityTotal, rented,
        dates, price, revenue, ownerID, address, city, state)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("iisiiisss", $capacity, $rented, $date, $price, $revenue, $ownerID, $address, $city, $state);
      $stmt->execute();

      $select_propID = mysqli_query($conn, "SELECT * FROM Property WHERE ownerID='$ownerID'");
      $run = mysqli_fetch_array($select_propID);
      $propertyID = $run['id'];

      /*
      include 'calcLatLon.php';
      $data_arr = geocode('$fullAddress');

      if($data_arr){
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $formatted_address = $data_arr[2];
      };
      $lat = mysqli_real_escape_string($conn, $latitude);
      $long = mysqli_real_escape_string($conn, $longitude);
      */

      $address = str_replace(" ","+",$fullAddress);
      $address = urlencode($address);

      $url = "https://maps.googleapis.com/maps/api/geocode/json?address='$address'&key=AIzaSyCi_co2Xc5maYq-Pzs62pqks1QVoG2FuNY";

      $json = file_get_contents($url);

      $resp = json_decode($json, true);

        //$latitude = $resp['results'][0]['geometry']['location']['lat'];
        //$longitude = $resp['results'][0]['geometry']['location']['lng'];
        //$formatted_address = $resp['results'][0]['formatted_address'];


        $latitude = isset($resp['results'][0]['geometry']['location']['lat'])
        ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longitude = isset($resp['results'][0]['geometry']['location']['lng'])
        ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address'])
        ? $resp['results'][0]['formatted_address'] : "";


      $markerDBinsert = "INSERT INTO Marker (name, address, lat, lng, propID)
      VALUES (?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($markerDBinsert);
      $stmt->bind_param("ssddi", $ownerName, $fullAddress, $latitude, $longitude, $propertyID);
      $stmt->execute();

      /*
      $markerInsert = mysqli_query($conn, "INSERT INTO Marker (name, address, lat, lng, propID)
      VALUES ('$ownerName', '$formatted_address', '$latitude', '$longitude','$propertyID')");
      */

      $_SESSION['ownerID'] = $ownerID;
      header('Location: oSuccessReg.php');

} else {
  echo $_SESSION['email'];
  echo "Session email not set";
}
$stmt->close();
$conn->close();

 ?>
