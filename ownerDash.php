<html>
  <?php
  session_start();

  include("userHeader.php");

   ?>
    <center>
      <div class="pageTitle">
        <pgtitle><?php echo "Owner Dashboard"; ?></pgtitle>
        <hr>
      </div>
    </center>
    <body>
      <div class="DashText">
        <center>
          <dashText>
        <?php

        require('dbc.php');

        $Username = $_SESSION['Username'];
        $Password = $_SESSION['Password'];

        $Username = stripcslashes($Username);
        $Password = stripcslashes($Password);
        $Username = mysqli_real_escape_string($conn, $_SESSION['Username']);
        $Password = mysqli_real_escape_string($conn, $_SESSION['Password']);

        $resulf = mysqli_query($conn, "SELECT * FROM Owner WHERE Username = '$Username' and Password = '$Password'")
        or die("Failed to query DB".mysqli_error($conn));
        $row = mysqli_fetch_array($resulf);

        if($row['Username'] == $Username && $row['Password'] == $Password) {

          $firstName= $row['ofirstName'];
          $lastName = $row['olastName'];
          $email = $row['oemail'];
          $ownerID = $row['id'];

          $sql_prop = mysqli_query($conn, "SELECT * FROM Property WHERE ownerID = '$ownerID'");
          $run = mysqli_fetch_array($sql_prop);

          $street = $run['address'];
          $city = $run['city'];
          $state = $run['state'];
          $capTot = $run['capacityTotal'];
          $rented = $run['rented'];
          $dates = $run['dates'];
          $revenue = $run['price']*$run['rented'];
          $capRem = $run['capacityTotal'] - $run['rented'];
          $price = $run['price'];


        echo " Account Type: Owner" ;
        echo "<br />"."";
          echo "First Name: ".$firstName;
          echo "<br />";
          echo "Last Name: ".$lastName;
          echo " <br />";
          echo " Username: ".$Username;
          echo " <br />";
          echo " Email Address: ".$email;
          echo " <br />";
          echo "<hr />";
          echo "Address: ".$street.", ".$city.", ".$state;
          echo " <br />";
          echo " Total Capacity: ".$capTot;
          echo " <br />";
          echo " Units currently rented: ".$rented;
          echo " <br />";
          echo " Remaining Capacity: ".$capRem;
          echo " <br />";
          echo "<hr />";
          echo " Date Available: ".$dates;
          echo " <br />";
          echo " Price per Person: $".$price;
          echo " <br />";
          echo " Current Revenue Generated: $".$revenue;
          echo " <br />";


        }

         ?></dashText></center>

      </div>
    </body>
    <hr>
    <div class="search-wrapper">
      <center>
        <form action="searchLog.php" method="get" style="height:60px; margin-top: 135px;">
          <input type="text" class="search" name="q" dir="ltr" placeholder="Search by City" required>
          <input type="submit" class="submit" value="Find Tailgate Spots">
        </form>
      </center>
    </div>
  </main>
</html>
