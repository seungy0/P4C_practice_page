<?php
  session_start();
  $jb_login = False;
  if( isset( $_SESSION[ 'username' ] ) ) {
    $jb_login = TRUE;
  }
?>