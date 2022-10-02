<?php
  session_start();
  $jb_login = False;
  if( isset( $_SESSION[ 'id' ] ) ) {
    $jb_login = TRUE;
  }
?>