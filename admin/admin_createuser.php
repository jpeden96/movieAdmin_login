<?php
  require_once('phpscripts/config.php');
  //confirm_logged_in();  //uncomment later
  //
  if(isset($_POST['submit'])){

    $fname = trim($_POST['fname']); //trim ensures if there any any spaces or capitals(minor changes) then it won't affewct the user
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
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
<title>Create User</title>
</head>
<body>
  <h2>Create User</h2>
  <?php if(!empty($message)){echo $message;} ?>
  <form action="admin_createuser.php" method="post">
    <label>First Name:</label>
    <input type="text" name="fname" value=""><br>

    <label>Username:</label>
    <input type="text" name="username" value=""><br>

    <label>Password:</label>
    <input type="text" name="password" value=""><br>

    <label>Email:</label>
    <input type="text" name="email" value=""><br>

    <select name="lvllist">
      <option value="">Select User Level</option> <!--leavign empty will trigger a warner to fill out the drop down -->
      <option value="2">Web Admin</option>
      <option value="1">Web Master</option>
    </select><br>
    <input type="submit" name="submit" value="Create User">
  </form>

</body>
</html>
