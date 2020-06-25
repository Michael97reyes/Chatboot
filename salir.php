<?php 
session_start();
session_destroy(); //salir de la sesion iniciada
header("Location: index.php");
 ?>
