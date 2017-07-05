<?php
    include '../../constantes.php';
    include '../../librerias.php';
?>

<?php

$fecha = $_REQUEST['fecha'];
$paciente = $_REQUEST['paciente'];
$medico = $_REQUEST['medico'];

$oCons = new Consulta();

$oCons->fecha = $fecha;
$oCons->paciente = $paciente;
$oCons->medico = $medico;


        

    $oCons->agendarConsulta();
    echo "Consulta agregada correctamente<br>";
    echo "<a href='../../index.php'>Volver</a>";


