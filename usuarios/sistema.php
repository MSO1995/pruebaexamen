<?php
 session_start();

 if (!empty($_SESSION['id']) && !empty($_SESSION['pass'])) {
  require_once 'LIGA3/LIGA.php'; 
  BD('localhost', 'root', '', 'base');
  HTML::cabeceras(array('title'=>'Sistema seguro', 'description'=>'Lo que sea...'));
  //echo 'usuario admitido';
  
   $body = array('contenedor'=>array('uno'=>'<p>Usuario válido</p>',
                                    'dos'=>'<a href="cerrar.php">Cerrar sesión</a>'
                                    ));
  
  $usuario=LIGA('usuarios');
  $columna=('id,nombre,fecha');
  $ppt=array( 'Usuario' => '@[nombre]',
             'Hora de registro' => '@{substr("@[fecha]",11,19)}@');
  
  HTML::tabla($usuario, 'USUARIO REGISTRADO',$ppt);
  
  HTML::cuerpo($body);
  
  HTML::pie();
 } else {
    //echo 'Área prohibida';
    header('Location: .?error=1');
 }

