<?php

  function logIn($username, $password, $ip) {
    require_once('connect.php');
    $username = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $password);
    $loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}'"; //
    //echo $loginstring;
    $user_set = mysqli_query($link, $loginstring);
    // echo mysqli_num_rows($user_set);
    // die;
    if(mysqli_num_rows($user_set)){
      $founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
      $id = $founduser['user_id'];
      if($password == $founduser['user_pass'] && ($founduser['user_fail'] < 3)){ //separating the password and user login function

        //echo $id;

        date_default_timezone_set('America/Toronto'); //setting the timestamp to where ever the user is logging in from
        $date = date("Y-m-d h:i:s");

        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $founduser['user_fname'];
        $_SESSION['user_last'] = $founduser['user_last'];
        if(mysqli_query($link, $loginstring)){
          $update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
          $updatequery = mysqli_query($link, $update);

          $updateLast = "UPDATE tbl_user SET user_last='{$date}' WHERE user_id={$id}";
          $updateLastQuery = mysqli_query($link, $updateLast);

          $failLogin = "UPDATE tbl_user SET user_fail = 0 WHERE user_id = {$id}";
          $fail_attempt = mysqli_query($link, $failLogin);
        }
        redirect_to('admin_index.php');

      }else if($founduser['user_fail'] < 3){ //
        $number = $founduser['user_fail'] +1;

        $failLogin = "UPDATE tbl_user SET user_fail = {$number} WHERE user_id = {$id}";
        $fail_attempt = mysqli_query($link, $failLogin);
        return "did you forget your password?";
      }else{
        return "You're locked out!";
      }
    } else {
      $message = "Did you forget your username or password?";
      return $message;
    }

    mysqli_close($link);
  }

  //trying to add a timestamp for last successful login function
  //
  // $LoginRS__query=sprintf("SELECT * FROM tablename WHERE USERNAME='%s' ", get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername));
  //
  // $LoginRS = mysql_query($LoginRS__query, $onpoint) or die(mysql_error());
  // $query = mysql_fetch_assoc($LoginRS);
  //
  // $GLOBALS['LastLogin'] = $query['LastLogin'];
  //
  // //Session variable for last login
  // $_SESSION['LastLogin'] = $query['LastLogin']; */
?>
