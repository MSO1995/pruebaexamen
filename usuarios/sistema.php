<?php
 session_start();

 if (!empty($_SESSION['id']) && !empty($_SESSION['pass'])) {
  
 require_once 'LIGA3/LIGA.php'; 
  
  HTML::cabeceras(array('title'=>'Sistema seguro', 'description'=>'Lo que sea...'));
  
  
  
  $body = array('contenedor'=>array('uno'=>'<p>Usuario válido</p>',
                                    'dos'=>'<a href="cerrar.php">Cerrar sesión</a>'));
  
  HTML::cuerpo($body);
  
  HTML::pie();
 } else {
    //echo 'Área prohibida';
    header('Location: .?error=1');
 }