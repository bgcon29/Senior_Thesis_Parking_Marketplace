<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    require("dbc.php");

    //$city = $_GET['addressInput'];

    $city = $_COOKIE['jsAddressInput'];

    $result = mysqli_query($conn, "SELECT * FROM Property WHERE city LIKE '$city'") or die(mysqli_error());
    ?>

    <html>
    <center>
        <table class="table" id="table">
          <thead>
            <tr>
              <th>Property ID</th>
              <th>Street Address</th>
              <th>Price</th>
              <th>Date Available</th>
              <th>Remaining Capacity</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)):

             ?>
             <tr>
                 <td>
                   <?php Echo "<a href='send.php?id=".$row['id']."'>" . $row['id']."</a>";
                   $spotsLeft = $row['capacityTotal'] - $row['rented'];
                   ?>
                 </td>
               <td><?php echo $row['address']; ?></td>
               <td><?php echo "$".$row['price']; ?></td>
               <td><?php echo $row['dates']; ?></td>
               <td><?php echo $spotsLeft; ?></td>
             </tr>
          </tbody>
        </table>
        </center>

        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="main.php">

    </html>
