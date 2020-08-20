<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>About Us</title>
</head>
<main>
  <?php
session_start();
include("propertyLocator.php");

  if(isset($_SESSION['Username'])) {
  include("userHeader.php");
  } else {
  include("header.php");
  }
  ?>
  <center>
    <div class="pageTitle">
      <pgtitle>Test Page</pgtitle>
      <hr>
    </div>
  </center>
<body>
  <center>

</center>

</body>
</main>
</html>
