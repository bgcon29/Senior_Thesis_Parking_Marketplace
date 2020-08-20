
<?php

session_start();

$Username = $_POST['Username'];
//echo $Username;
$Password = $_POST['Password'];
//echo $Password;

require('dbc.php');

$_SESSION['Username'] = $Username;
$_SESSION['Password'] = $Password;

$Username = stripcslashes($Username);
$Password = stripcslashes($Password);
$Username = mysqli_real_escape_string($conn, $_POST['Username']);
$Password = mysqli_real_escape_string($conn, $_POST['Password']);

$resulf = mysqli_query($conn, "SELECT * FROM Owner WHERE Username = '$Username' and Password = '$Password'")
or die("Failed to query DB".mysqli_error($conn));
$row = mysqli_fetch_array($resulf);
if($row['Username'] == $Username && $row['Password'] == $Password) {
  header('Location: ownerDash.php');
  echo "Login Successful! -> Welcome to Tailg8, ".$row['ofirstName']."!";
  $_SESSION['firstName']= $row['ofirstName'];
  $_SESSION['lastName'] = $row['olastName'];
  $_SESSION['email'] = $row['oemail'];
  $_SESSION['type'] = 'owner';

  $_SESSION['Username'] = $Username;
  $_SESSION['Password'] = $Password;

} else {
  echo "Failed Login. Try again";
}


 ?>
