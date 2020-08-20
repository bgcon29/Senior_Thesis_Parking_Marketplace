<html>
  <main>
    <?php include("header.php"); ?>
  <center>
    <div class="pageTitle">
      <pgtitle>Become a Tailg8r</pgtitle>
      <hr>
    </div>
  </center>
  <body>
    <center>
      <div>
        <form action="insertGuest.php" method="POST">
          <center>
            <input type="text" name="gfirstName" class="renterForm" placeholder="Enter your first name" id="gfirstName" required><br>
            <input type="text" name="glastName" class="renterForm" placeholder="Enter your last name" id="glastName" required><br>
            <input type="text" name="Username" class="renterForm" placeholder="Enter your username" id="Username" required><br>
             <input type="email" name="gemail"  class="renterForm" placeholder="Enter your email address" id="gemail" required><br>
            <input type="password" name="Password" class="renterForm" placeholder="Enter a password" id="Password" required><br>
            <input type="submit" class="roundButtons" name="LOGIN" id="LOGIN"  value="Join Tailg8!" style="width:100px;margin-top:15px" required><br>
          </center>
        </form>
      </div>
    </center>
  </body>
</main>
</html>
