<?php
  function createUser($fname, $username, $email, $lvllist) { //TOOK OUT $password
    include('connect.php');
    $userstring = "INSERT INTO tbl_user VALUES (NULL, '{$fname}', '{$username}', '{$email}', NULL, 'no', '{$lvllist}' )"; //took out $password
  // echo $userstring;
  // die;
  //I don't know whether to add the hash password code to this part - or on another page?
  //$hashedpassword = "INSERT INTO tbl_user(user_pass) VALUES '{$password}'";

  $userquery = mysqli_query($link, $userstring);
  if(userquery) {
    redirect_to('admin_index.php');
  }else{
    $message = "Sorry, there were issues with your attempt to create a user. Please try again later.";
    return $message;
  }

 ?>
