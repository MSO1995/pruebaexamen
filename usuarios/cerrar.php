<?php
 session_start();
 
 $_SESSION['id'] = array();
 
 $_SESSION['pass'] = array();
 
 session_destroy();
 
 header('Location: .');
?>