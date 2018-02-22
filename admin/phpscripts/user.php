<?php
  function createUser($fname, $username, $password, $email, $lvllist) {
    include('connect.php');
    $userstring = "INSERT INTO tbl_user VALUES (NULL, '{$fname}', '{$username}', '{$password}', '{$email}', NULL, 'no', '{$lvllist}' )";
  // echo $userstring;
  // die;

  $userquery = mysqli_query($link, $userstring);
  if(userquery) {
    redirect_to('admin_index.php');
  }else{
    $message = "Sorry, there were issues with your attempt to create a user. Please try again later.";
    return $message;
  }


  mysqli_close($link);
}

 ?>
