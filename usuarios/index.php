<?php
 session_start();
 require_once 'LIGA3/LIGA.php';
 
 BD('localhost', 'root', '', 'base');
 
 $where = '';
 
 if (!empty($_SESSION['id']) && !empty($_SESSION['pass'])) {
  $where = "where id='$_SESSION[id]' and pass = '$_SESSION[pass]'";
 }
 
 $usuarios = LIGA('usuarios', $where);
 
 if ($usuarios->numReg() == 1) {
  header('sistema.php');
 }
 
 HTML::cabeceras(array('title'=>'Login para usuarios',
                       'description'=>'Ingreso seguro a la página web')
                );
 // HTTP (header) (cuerpo)
 // GET -> Datos se envían por la URL   POST -> En el cuerpo de la petición
 // <p>  <img /> <br /> <em> </em> <strong> </strong>  </p>
 
 $campos = array('Username'=>'<input id="Username" name="id" />',
                 'Contraseña'=>'<input type="password" id="Contraseña" name="pass" />');
 
 $props = array('form'=>'action="login.php" method="POST"');
 
 if (isset($_GET['error'])) {
  echo '<p>Error en los datos</p>';
 }
 
 HTML::forma($usuarios, 'Login', $campos, $props);
 
 $js = array('js'=>array('js/jquery-3.3.1.min.js', 'js/codigo.js'));
 HTML::pie($js);
?>