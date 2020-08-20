<html>
  <main>
    <?php
    session_start();
    include("header.php"); ?>
  <center>
    <div class="pageTitle">
      <pgtitle>Property Details</pgtitle>
      <hr>
    </div>
  </center>
  <body>
    <center>
      <br>
      <div class="renterForm">
        <form action="insertProperty.php" method="POST">
          <center>
          <input type="number" name="capacity" id="capacity" class="renterForm" autocomplete="on" placeholder="Capacity of Property" required>
          <br>
          <input type="number" name="price" id="price" class="renterForm" autocomplete="on" placeholder="Price per day ($)" required>
          <br>
          <renterForm>Date available:</renterForm> <br />
          <input type="date" name="dateavail" id="dateavail" class="renterForm" autocomplete="on" placeholder="Date Available" required>
          <br>
          <input type="text" name="ostreetAdd" id="ostreetAdd" class="renterForm" autocomplete="on" placeholder="Street Address" required>
          <br>
          <input type="text" name="oCity" id="oCity" class="renterForm" autocomplete="on" placeholder="City" required>
          <br>
          <select name="oState" id="oState" style="margin-top:10px;width:100px;text-align:center" required>
            <option value="" disabled="disabled" selected="selected">Select a state</option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District Of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
          </select>
          <br>
          <input type="submit" class="roundButtons" name="osubmit" id="osubmit" autocomplete="on" value="Join Tailg!" style="width:auto;margin-top:15px" required>
          <br>
        </center>
        </form>
      </div>
    </center>
  </body>

</main>
</html>
