<?php
    include '../../constantes.php';
    include '../../librerias.php';
?>

<?php

$rut = $_REQUEST['rut'];
$nombres = $_REQUEST['nombres'];
$ape_pat = $_REQUEST['ape_pat'];
$ape_mat = $_REQUEST['ape_mat'];
$direccion = $_REQUEST['direccion'];
$tel = $_REQUEST['tel'];
$dv = $_REQUEST['dv'];

$oPac = new Paciente;

$oPac->rut = $rut;
$oPac->nombres = $nombres;
$oPac->ape_pat = $ape_pat;
$oPac->ape_mat = $ape_mat;
$oPac->direccion = $direccion;
$oPac->tel = $tel;

        
if(!$oPac->validarRut($rut)){
    echo "El rut es incorrecto";
}else{
    $oPac->agregarPaciente();
    echo "Paciente agregado correctamente<br>";
    echo "<a href='../../index.php'>Volver</a>";
}
