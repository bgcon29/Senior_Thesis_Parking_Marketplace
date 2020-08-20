
<html lang="en" dir="ltr">
<head>
  <title></title>
</head>
<main>
  <?php
session_start();

  if(isset($_SESSION['Username'])) {
  include("userHeader.php");
  } else {
  include("header.php");
  }

  $success = $_SESSION['success'];
  $duplicate = $_SESSION['duplicate'];
  $fullCap = $_SESSION['fullCap'];

  ?>

<body>
  <center>
<confirmation>
  <?php
  echo "<br />";
    if($success == 1) {
      echo "Property Booked!";
      echo "<br />";
      echo "Thanks for using Tailg8!";
    } else if ($duplicate == 1){
      echo "You have already booked this property!";
    } else if ($fullCap == 1){
      echo "Sorry but this property is full!";
    }

   ?>
   </confirmation>
     </center>
</body>
</main>
</html>
