<?php

session_start();
require('dbc.php');

if(isset($_GET['q']) && $_GET['q'] !== ' ' && isset($_GET['radius'])) {
  $search = $_GET['q'];
  $radius = $_GET['radius'];
  $_SESSION['searchContent'] = $search;
}

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <?php
 if(isset($_SESSION['Username'])) {
 include("userHeader.php");
 } else {
 include("header.php");
 }
 require("dbc.php");

 $city = $search;
 $result = mysqli_query($conn, "SELECT * FROM Property WHERE city LIKE '$city'") or die(mysqli_error());
 $numItems = mysqli_num_rows($result);

  ?>
 <center>
     <div class="resultPageSearchBar">
         <form id="searchBar" method="get" style="height:60px">
           <input type="text" id="addressInput" name="q" class="search" dir="ltr" placeholder="Search by City" required>
           <select name="radius" id="radiusSelect" name="radius" dir="ltr" id="radiusSelect" required>
             <option value="" selected="selected">Radius</option>
             <option value="30">30 miles </option>
             <option value="15">15 miles</option>
             <option value="10">10 miles</option>
             <option value="5">5 miles</option>
           </select>
           <input type="submit" id="searchButton" class="submit" value="Find Tailgate Spots">
         </form>
         <div><select id="locationSelect" style="width: 10%; visibility: visible"></select></div>
         <br>
         <resultCity><?php echo $search; ?></resultCity>
     </div>
     </center>
     <div class="pageText">
       <center>

   <?php
   if($numItems > 0) {
     include("table.php");
   } else {
   echo  "<br>";
      echo  "Sorry, no properties were found for your search of:".$city;
   }
   exit();
    ?>

    </center>
  </div>
  <div>
  </div>
</main>
 </html>
