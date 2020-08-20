<html lang="en" dir="ltr">
<?php
$type = "";
if($_SESSION['type'] == 'guest'){
  $type = 'guestDash.php';
} else {
  $type = 'ownerDash.php';
}

$page = $type;

?>
  <head>
    <meta charset="UTF-8">
    <title>Thesis</title>
    <meta name="Thesis" content="Thesis">
    <link rel="stylesheet" media="screen" href="main.php">
    <link rel="stylesheet" type="text/css" href="/styles/font/fonts.css" />
  </head>
  <main>
    <body>
      <div class="header">
        <nav>
          <div class="header_links" style="float:right; position:absolute;">
            <gheader_text> <a href="searchMap.php">Search</a></gheader_text>
            <!-- <header_text> <a href="map.php">Map</a></header_text>
            <header_text> <a href="searchPage.php">Search</a></header_text>
          -->
            <gheader_text> <a href="aboutUs.php">About Us</a></gheader_text>
            <gheader_text> <a href="howPage.php">How?</a></gheader_text>
            <div class="udropdown" style="margin-right:20px;">
              <gheader_text1><a class="dropbtn"><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?></a></gheader_text1>
              <div class="udropdown-content">
                <center>
                <gheader_text><a class="dropbtn" href="<?= $page ?>">User Information</a></gheader_text>
                  <gheader_text> <a href="logout.php">Logout</a></gheader_text>
              </div>
              </center>
            </div>
          </div>
          <div class="icon">
            <a style="top:0;left:20px;" class="icon" href="index.php">Tailg8</a>
          </div>
        </nav>
      </div>
    </body>
</html>
