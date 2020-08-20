 <?php
session_start();
require('dbc.php');

$propertyID = $_SESSION['propertyID'];

$guestUsername = $_SESSION['Username'];
$guestUsername   = stripcslashes($guestUsername);
$guestUsername       = mysqli_real_escape_string($conn, $guestUsername);

if(isset($_POST['reserve'])) {

  if(mysqli_connect_error()) {
    die('Connect error ('.mysqli_connect_errno().')').mysqli_connect_error();
  } else {

    $result = mysqli_query($conn, "SELECT * FROM Guest WHERE Username='$guestUsername'")
    or die("Failed to query DB".mysqli_error($conn));

    $row = mysqli_fetch_array($result);
    $guestIDNum = $row['id'];

    $resulf = mysqli_query($conn, "SELECT * FROM Property WHERE id='$propertyID'")
    or die("Failed to query DB".mysqli_error($conn));

    $run = mysqli_fetch_array($resulf);
    $ownerIDNum = $run['ownerID'];
    $capacity = $run['capacityTotal'];
    $rented = $run['rented'];

    if($rented == $capacity ) {
      $fullCap = 1;
    } else {
      $fullCap = 0;
    }
    $check_duplicate_guest = "SELECT * FROM Orders
      WHERE guestID='$guestIDNum' AND propID='$propertyID'";

    $check_query = mysqli_query($conn, $check_duplicate_guest);

    //$check_result = mysqli_fetch_array($check_query);
    $rnum = mysqli_num_rows($check_query);

    if($rnum > 0) {
      echo "You have already booked this property!";
      $duplicate = 1;
    } else {
      $duplicate = 0;
    }
  }
}

    if($duplicate == 0 && $fullCap == 0) {

    $INSERT = "INSERT INTO Orders (propID, ownerID, guestID) VALUES
    (?,?,?)";

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("iii", $propertyID, $ownerIDNum, $guestIDNum);
      $stmt->execute();


      $success = 1;

      $UPDATE = "UPDATE Property SET rented=(rented+1) WHERE id='$propertyID'";

      $stmt = $conn->prepare($UPDATE);
      $stmt->execute();

      $UPDATE = "UPDATE Property SET revenue=(price*rented) WHERE id='$propertyID'";
      $stmt = $conn->prepare($UPDATE);
      $stmt->execute();

      $stmt->close();
      $conn->close();

    } else {
      $success = 0;
    }

$_SESSION['success'] = $success;
$_SESSION['duplicate'] = $duplicate;
$_SESSION['fullCap'] = $fullCap;

header('Location: reserve.php');

 ?>
