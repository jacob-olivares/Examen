                                                                                                                                                                                                                                                                                                                                                                                                                         <?php
    include '../constantes.php';
    include '../librerias.php';
?>
<?php

$oUsr = new Usuario();

$oUsr->usuario=$_POST['usuario'];
$oUsr->contrasena=$_POST['contrasena'];

if( $oUsr->VerificarUsuarioClave()){
    $_SESSION['USR']=$oUsr;
header('Location:http://localhost:'.$_SERVER['SERVER_PORT'].'/Examen/index.php');
}
else
{
header('Location:http://localhost:'.$_SERVER['SERVER_PORT'].'/Examen/index.php');
}