<?php

	require('config/config.php');

   session_start();
   
   if(session_destroy()) {
      header('Location: '.ROOT.'');
   }
?>