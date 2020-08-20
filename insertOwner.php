<?php
session_start();
require('dbc.php');

$ofirstName = $_POST['ofirstName'];
$olastName = $_POST['olastName'];
$Username = $_POST['Username'];
$oemail = $_POST['oemail'];
$Password = $_POST['Password'];

$_SESSION['ownerUsername'] = $Username;


if (!empty($ofirstName) ||!empty($Username) || !empty($olastName) || !empty($oemail) || !empty($Password)
|| !empty($ostreetAdd) || !empty($oCity) || !empty($oState)) {

  if(mysqli_connect_error()) {
    die('Connect error('.mysqli_connect_errno().')').mysqli_connect_error();
  } else {
    $SELECT = "SELECT oemail FROM Owner WHERE oemail = ? Limit 1";
    $INSERT = "INSERT INTO Owner (ofirstName, olastName, Username, oemail,
      Password) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $oemail);
    $stmt->execute();
    $stmt->bind_result($oemail);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum == 0) {
      $stmt->close();

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssss", $ofirstName, $olastName, $Username, $oemail, $Password);
      $stmt->execute();
      //echo "New record inserted successfully";

    } else {
      echo "Someone already registered using this username";
    }
    $stmt->close();
    $conn->close();

  }
$_SESSION['ownerUsername'] = $Username;
header('Location: formProperty.php');

} else {
  echo 'All field are required';
  die();
}

 ?>
