<html>
      <?php
      session_start();
      require('dbc.php');

      if(isset($_SESSION['Username'])) {
      include("userHeader.php");
      } else {
      include("header.php");
      }

      $guestUsername = $_SESSION['Username'];

      $select_guest = mysqli_query($conn, "SELECT * FROM Guest WHERE
        Username='$guestUsername' LIMIT 1");
      $row = mysqli_fetch_array($select_guest);
      $guestID = $row['id'];
      $firstName = $row['gfirstName'];
      $lastName = $row['glastName'];
      $email = $row['gemail'];


      $select_prop = mysqli_query($conn, "SELECT * FROM Orders WHERE
        guestID='$guestID'");
      $run = mysqli_fetch_array($select_prop);
      $propID = $run['propID'];

      $select_info = mysqli_query($conn, "SELECT * FROM Orders WHERE
      propID='$propID'");
      $numProps = mysqli_num_rows($select_info);
      ?>
<main>
    <center>
      <div class="pageTitle">
        <pgtitle><?php echo "Guest Dashboard"; ?></pgtitle>
        <hr>
      </div>
    </center>
    <body>
      <div class="gDashText">
        <center>
          <dashText>
        <?php
        echo " Account Type: Guest";
        echo " <br />";
          echo "First Name: ".$firstName;
          echo "<br />";
          echo " Last Name: ".$lastName;
          echo "<br />";
          echo " Username: ".$guestUsername;
          echo " <br />";
          echo " Email Address: ".$email;
         ?> <dashText></center>
      </div>
      <hr>
      <center>
        <guestTableText>
          Properties Booked
        </guestTableText>
      <br />
      <?php
      if($numProps > 0) {
        include("guestOrderTable.php");
      } else {
        echo "<br />";
        echo "You have not booked any properties yet!";
      }
       ?>
       </center>
    </body>
    <hr />
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
