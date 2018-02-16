<?php

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once('phpscripts/config.php');

  $ip = $_SERVER['REMOTE_ADDR'];
  //echo $ip;
  if(isset($_POST['submit'])){
    //echo "works";
    $username = trim($_POST['username']); //trim will cut any whitespace when people copy and paste
    $password = trim($_POST['password']);
    if($username !== "" && $password !== ""){ //!== means - identical to - so enforced both columns have to be filled out
      $result = logIn($username, $password, $ip);
      $message = $result;
    }else{
      $message = "Please fill out the required fields.";
    }
  }
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Muli" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
<title>Welcome to your admin panel login</title>
</head>
<body>
  <div class="container">

<div class="text">
    <h1> WELCOME TO YOUR MOVIE DATABASE.</h1>
    <h4>Containing the most up to date <br>database on Blockbuster movies.</h4>
  </div>

<div class="loginCon">
  <?php if(!empty($message)){ echo $message;} ?> <!--so the message doesn't always run, only when the login process doesn't work - -->
  <br>
  <h1>Member Login</h1>
  <p>Please enter the following fields.</p>
    <form action="admin_login.php" method="post">
      <label>Username:</label><br>
      <input type="text" name="username" class="inputText"value="">
      <br><br>
      <label>Password:</label><br>
      <input type="password" name="password" class="inputText" value="">
      <br><br>
      <input type="submit" name="submit" id="submit" value="Login">
    </form>
  </div>
  </div>
</body>
</html>
