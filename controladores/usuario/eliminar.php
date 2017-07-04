<?php
    include '../../constantes.php';
    include '../../librerias.php';
?>
<?php

$usuario = $_POST['idUsuario'];

$oUsr = new Usuario();

$oUsr->idUsuario = $usuario;

$oUsr->eliminarUsuario();
echo "Usuario Eliminado<br>";
echo "<a href='../../index.php'>Volver</a>";





