<?php
  //this file is not called through config.php. ever. just don't fucking do it.

  require_once('config.php');

  if(isset($_GET['caller_id'])){ //see if caller id has been filled
    $dir =  $_GET['caller_id'];
    if($dir == "logout"){
      logged_out();
    }else{
      echo "caller id was happed incorrectly"; //not best practice, but for debugging for now it's fine to have an echo
    }
  }



 ?>
