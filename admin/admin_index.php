<?php
  require_once('phpscripts/config.php');
  confirm_logged_in();

// $query=mysql_query("UPDATE tablename SET LastLogin=now() WHERE CID='$CID'");
// $result = mysql_query($query);
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Muli" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">

<title>Welcome to your Admin Panel</title>
</head>
<body>

<div class="nav">


      <a href="admin_createuser.php">Create User</a>
      <a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
      
  <div class="userInfo"><p class="user">User: </p><p class="username"><?php echo $_SESSION['user_name']; ?><p></div><br>
<div class="userInfo">
    <p class="user">Last Successful Login:</p><p class="username"><?php echo $_SESSION['user_last'];?></p><br>


    <ul>
      <li><a href="#">Edit Pre-Existing Movies</a></li>
      <li><a href="#">Add Movies</a></li>
      <li><a href="#">Account Settings</a></li>
    </ul>
  </div>
</div>

<div class="intro">
  <h1><?php
  date_default_timezone_set('America/Toronto');

  $Hour = date('G');

  if ( $Hour >= 5 && $Hour <= 11 ) {
      echo "I hope the sun is shinning for you!";
  } else if ( $Hour >= 12 && $Hour <= 18 ) {
      echo "Have you had lunch?";
  } else if ( $Hour >= 19 || $Hour <= 4 ) {
      echo "Shouldn't you be heading to bed, not doing work?";
  }
  ?></h1>
</div>

</body>
</html>
