<?php

$gfirstName = $_POST['gfirstName'];
$glastName = $_POST['glastName'];
$Username = $_POST['Username'];
$gemail = $_POST['gemail'];
$Password = $_POST['Password'];

if (!empty($gfirstName) ||!empty($Username) || !empty($glastName) || !empty($gemail) || !empty($Password)) {

  require('dbc.php');

  if(mysqli_connect_error()) {
    die('Connect error('.mysqli_connect_errno().')').mysqli_connect_error();
  } else {
    $SELECT = "SELECT gemail FROM Guest WHERE gemail = ? Limit 1";
    $INSERT = "INSERT INTO Guest (gfirstName, glastName, Username, gemail, Password) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $gemail);
    $stmt->execute();
    $stmt->bind_result($gemail);
    $stmt->store_result();
    $rnum = $stmt->num_rows;


    if($rnum == 0) {
      $stmt->close();

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssss", $gfirstName, $glastName, $Username, $gemail, $Password);
      $stmt->execute();
      //echo "New record inserted successfully";
      header('Location: gSuccessReg.php');


    } else {
      echo "Someone already registered using this username";
    }
    $stmt->close();
    $conn->close();
  }

} else {
  echo 'All field are required';
  die();
}

 ?>
