<?php
    include '../../constantes.php';
    include '../../librerias.php';
?>
<?php

$rut = $_POST['rut'];

$oMed = new Medico();

$oMed->rut = $rut;


$oMed->eliminarMedico();
echo "Medico Despedido...!!<br>";
echo "<a href='../../index.php'>Volver</a>";

