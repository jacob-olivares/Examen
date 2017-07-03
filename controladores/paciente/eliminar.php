<?php
    include '../../constantes.php';
    include '../../librerias.php';
?>
<?php

$rut = $_POST['rut'];

$oPac = new Paciente();

$oPac->rut = $rut;
$oPac->eliminarPaciente();

echo "Paciente Eliminado<br>";
echo "<a href='../../index.php'>Volver</a>";