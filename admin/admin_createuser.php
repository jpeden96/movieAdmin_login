<?php
  require_once('phpscripts/config.php');
  //confirm_logged_in();  //uncomment later
  //
  if(isset($_POST['submit'])){

    $fname = trim($_POST['fname']); //trim ensures if there any any spaces or capitals(minor changes) then it won't affewct the user
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    //creating a hashed password - would take out the previous line of code
    //$hashedpassword = password_hash($password,PASSWORD_DEFAULT);
    $email = trim($_POST['email']);
    $subject = 'Your account Information';
    $message = 'You have a new account with the Movie Database. Your account information is as followed..';

    mail($email, $subject, $message);

    $lvllist = $_POST['lvllist'];
    if(empty($lvllist)) {
      $message = "please select a user level.";
    }else{
      $result = createUser($fname, $username, $password, $email, $lvllist);
      $message = $result;
    }
  }


?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">


<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Muli" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">

<title>Create User</title>
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

  <h1>Create User</h1>
  <?php if(!empty($message)){echo $message;} ?>
  <div="createForm">
  <form action="admin_createuser.php" method="post">
    <label>First Name:</label><br>
    <input type="text" name="fname" class="inputText" value=""><br><br>

    <label>Username:</label><br>
    <input type="text" name="username" class="inputText" value=""><br><br>

    <!--<label>Password:</label>
    <input type="text" name="password" class="inputText" value=""><br> -->

    <label for="email">Email:</label><br>
    <input type="text" name="email" class="inputText" value=""><br><br>

    <select name="lvllist">
      <option value="">Select User Level</option> <!--leavign empty will trigger a warner to fill out the drop down -->
      <option value="2">Web Admin</option>
      <option value="1">Web Master</option>
    </select><br><br>
    <input type="submit" name="submit" class="submit" value="Create User">
  </form>
</div>
</div>

</body>
</html>
