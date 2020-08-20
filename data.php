<?php

  rqeuire("dbc.php");

  $result = mysqli_query($conn, "SELECT * FROM Property WHERE city LIKE '$city'") or die(mysqli_error());


 ?>
