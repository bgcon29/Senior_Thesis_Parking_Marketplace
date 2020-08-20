<html>
<main>
  <?php include("header.php"); ?>
    <center>
      <div class="pageTitle">
        <pgtitle>Post your lot</pgtitle>
        <hr>
      </div>
    </center>
    <body>
      <center>
        <div class="renterForm">
          <form action="insertOwner.php" method="POST">
            <center>
              <input type="text" name="ofirstName" id="ofirstName" class="renterForm" placeholder="First name" autocomplete="on" required>
              <br>
              <input type="text" name="olastName" id="olastName" class="renterForm" autocomplete="on" placeholder="Last name" required>
              <br>
              <input type="text" name="Username" id="Username" class="renterForm" autocomplete="on" placeholder="Username" required>
              <br>
              <input type="email" name="oemail" id="oemail" class="renterForm" autocomplete="on" placeholder="Email Address" required>
              <br>
              <input type="password" name="Password" id="Password" autocomplete="on" class="renterForm" placeholder="Password" required>
              <br>
              <input type="submit" class="roundButtons" name="osubmit" id="osubmit" autocomplete="on" value="Continue" style="width:auto;margin-top:15px" required>
              <br>
            </center>
          </form>
        </div>
      </center>
    </body>
</main>
</html>
