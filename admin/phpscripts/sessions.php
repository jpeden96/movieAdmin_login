<?php

  session_start();

  function confirm_logged_in(){ //ensuring no one can just enter the admin_index page without logging in - if the login session doesn't exist then they won't get into the page
    if(!isset($_SESSION['user_id'])){
      redirect_to("admin_login.php");
    }
  }

  function logged_out() {
    session_destroy(); //kill any session on server
    redirect_to("../admin_login.php");
  }
?>
