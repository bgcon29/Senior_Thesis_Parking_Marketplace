
<html lang="en" dir="ltr">
<head>
  <title>Search</title>
</head>
<main>
  <?php
session_start();

  if(isset($_SESSION['Username'])) {
  include("userHeader.php");
  } else {
  include("header.php");
  }
  ?>
  <center>
    <div class="pageTitle">
      <pgtitle>Search Properties</pgtitle>
      <hr>
    </div>

  <div class="search-wrapper">
      <form id="searchBar" action="searchLog.php" method="get" style="height:60px; margin-top: 135px;">
        <input type="text" id="addressInput" class="search" name="q" dir="ltr" placeholder="Search by City" required>
        <select name="radius" id="radiusSelect" name="radius" dir="ltr" class="search" style="width:100px;margin-left:-2px;border-left:black 1px;" required>
          <option value="" selected="selected">Radius</option>
          <option value="30">30 miles </option>
          <option value="15">15 miles</option>
          <option value="10">10 miles</option>
          <option value="5">5 miles</option>
        </select>
        <input type="submit" id="searchButton" class="submit" value="Find Tailgate Spots">
        
      </form>
    </center>
  </div>
<body>
</body>
</main>
</html>
