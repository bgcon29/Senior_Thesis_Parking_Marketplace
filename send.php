<?php
session_start();
require('dbc.php');

$propertyID = $_GET['id'];
$_SESSION['propertyID'] = $propertyID;

if(isset($_SESSION['Username'])) {
include("userHeader.php");
} else {
include("header.php");
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Property</title>
  </head>
  <main>
    <?php
    require('dbc.php');

    $result = mysqli_query($conn, "SELECT * FROM Property WHERE id='$propertyID'")
    or die("Failed to query DB".mysqli_error($conn));

    $row = mysqli_fetch_array($result);

      $address = $row['address'];
      $city = $row['city'];
      $state = $row['state'];
      $price = $row['price'];
      $spotsLeft = $row['capacityTotal'] - $row['rented'];
      $propertyID = $row['id'];

    ?>
  </main>
  <body>
    <center>
      <div class="pageTitle">
        <pgTitle><?php echo $address; ?></pgTitle>
        <hr>
      </div>
    </center>
    <div class="propertyMap">

    </div>
    <div class="propertyDetails">
      <propertyText style="font-size: 30px;"> <?php echo $address; ?></propertyText>
      <br>
      <propertyText> <?php echo $city.", ".$state;?></propertyText>
      <br>
      <propertyText><?php echo "$".$price."/event"; ?></propertyText>
      <br>
      <propertyText> Spots: <?php echo $spotsLeft." remaining"; ?></propertyText>
      <br>
      <form action="orderScript.php" method="post" style="padding-top: 10px;">
        <input type="submit" name="reserve" class="roundButtons" value="Reserve!"> </form>
    </div>

  </body>
</html>
