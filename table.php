<?php require("searchQuery.php"); ?>

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
      <tbody >
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
