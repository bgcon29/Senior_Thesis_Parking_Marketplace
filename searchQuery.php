<?php

require("dbc.php");

$addressInput = isset($_GET['addressInput']);

$sql = "SELECT * FROM `Property` WHERE `city` LIKE $addressInput";

$result = mysqli_query($conn, $sql);

$numProps = mysqli_num_rows($result);

 ?>
