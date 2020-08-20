
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


//mysqli_select_db("Guest");

$resulf = mysqli_query($conn, "SELECT * FROM Guest WHERE Username = '$Username' and Password = '$Password'")
or die("Failed to query DB".mysqli_error($conn));
$row = mysqli_fetch_array($resulf);

if($row['Username'] == $Username && $row['Password'] == $Password) {
  header('Location: guestDash.php');
  //echo "Login Successful! -> Welcome to Tailg8, ".$row['gfirstName']."!";
  $_SESSION['firstName']= $row['gfirstName'];
  $_SESSION['lastName'] = $row['glastName'];
  $_SESSION['email'] = $row['gemail'];
  $_SESSION['Username'] = $Username;
  $_SESSION['Password'] = $Password;
  $_SESSION['type'] = "guest";
} else {
  echo "Failed Login. Try again";

}


 ?>
