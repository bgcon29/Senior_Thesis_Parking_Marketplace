<html>
<center>
    <table class="guestPropTable">
      <thead>
        <tr>
          <th>Property ID</th>
          <th>Address</th>
          <th>City</th>
          <th>State</th>
          <th>Price</th>
          <th>Date Booked</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $select_info = mysqli_query($conn, "SELECT Guest.id, Orders.orderDate,
          Property.price, Property.address, Property.id, Property.city,
          Property.state FROM Guest Inner JOIN Orders on
          Orders.guestID = Guest.id JOIN Property ON
          Orders.ownerID=Property.ownerID WHERE Guest.id='$guestID'");

        while ($row = mysqli_fetch_assoc($select_info)):

         ?>
         <center>


         <tr>
             <td>
               <?php Echo "<a href='send.php?id=".$row['id']."'>" . $row['id']."</a>";

               ?>
             </td>
           <td><?php echo $row['address']; ?></td>
           <td><?php echo $row['city']; ?></td>
           <td><?php echo $row['state']; ?></td>
           <td><?php echo "$".$row['price']; ?></td>
           <td><?php echo $row['orderDate']; ?></td>
         </tr>
      </tbody>
    <?php endwhile;
    unset($_SESSION['searchContent']);?>
    </table>
    </center>

    <!--
    <link rel="stylesheet" href="bootstrap.css">
  -->
    <link rel="stylesheet" href="main.php">

</html>
