<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="Thesis" content="Thesis">
  <link rel="stylesheet" media="screen" href="main.php">
  <link rel="stylesheet" type="text/css" href="/styles/font/fonts.css"/>
</head>
<main>
  <body>
  <div class="header">
    <nav>
      <div class="dashHeader" style=" float:right; position:absolute; margin-top:20px;">
        <div>
          <userText><?php echo "Welcome ".$_SESSION['ofirstName']." ".$_SESSION['olastName']."!"; ?></userText>
          <userText>  <a href="logout.php">Logout</a></userText>
        </div>
      </div>
    </nav>
    <div class="icon">
      <a style="top:0;left:20px;" class="icon" href="index.php">Tailg8</a>
    </div>
  </div>
  </body>
</html>
