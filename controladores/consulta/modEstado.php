<?php
    include '../../constantes.php';
    include '../../librerias.php';
?>
<?php

$estado = $_POST['estado'];
$idConsulta = $_POST['idConsulta'];

$oCons = new Consulta();

$oCons->estado = $estado;
$oCons->idConsulta = $idConsulta;

$oCons->modificarConsulta();
echo "Consulta modificada...!!<br>";
echo "<a href='../../index.php'>Volver</a>";

