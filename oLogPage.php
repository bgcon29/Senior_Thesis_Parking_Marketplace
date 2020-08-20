<html>
  <main>
    <?php include("header.php"); ?>
  <center>
    <div class="pageTitle">
      <pgtitle>Owner Sign In</pgtitle>
      <hr>
    </div>
  </center>
  <body>
    <center>
      <div class="renterForm">
        <form name="loginForm" action="oLogScript.php" method="POST" >
          <center><input type="text" name ="Username" id="Username" class="renterForm" autocomplete="on" placeholder="Enter your username" required="required">
            <input type="password" name="Password" id="Password" autocomplete="on" class="renterForm" placeholder="Enter your password" required="required"><br>
            <input type="submit"class="roundButtons" name="LOGIN" id="LOGIN" autocomplete="on" value="Sign In" style="width:75px; margin-top:5px" required="required"><br>
          </center>
        </form>
      </div>
    </center>
  </body>
</main>
</html>
