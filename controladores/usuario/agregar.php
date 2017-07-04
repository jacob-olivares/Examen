<?php
    include '../../constantes.php';
    include '../../librerias.php';
?>

<?php

$usuario = $_REQUEST['usuario'];
$contrasena = $_REQUEST['contrasena'];
$r_contrasena = $_REQUEST['r_contrasena'];
$idPrivilegio = $_REQUEST['idPrivilegio'];


$oUsr = new Usuario();

$oUsr->usuario = $usuario;
$oUsr->contrasena = $contrasena;
$oUsr->idPrivilegio = $idPrivilegio;


        
if($contrasena!=$r_contrasena){
    echo "Las Contrasenas no coinciden";
}
if($oUsr->VerificarUsuario()){
    echo 'El usuario ya existe!!';
}else{
    $oUsr->agregarUsuario();
    echo "Usuario agregado correctamente<br>";
    echo "<a href='../../index.php'>Volver</a>";    
}
    


