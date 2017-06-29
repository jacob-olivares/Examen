<?php
    include '../../constantes.php';
    include '../../librerias.php';
?>

<?php

$rut = $_POST['rut'];
$nombres = $_POST['nombres'];
$ape_pat = $_POST['ape_pat'];
$ape_mat = $_POST['ape_mat'];
$direccion = $_POST['direccion'];
$tel = $_POST['tel'];

$oPac = new Paciente;

$oPac->rut = $rut;
$oPac->nombres = $nombres;
$oPac->ape_pat = $ape_pat;
$oPac->ape_mat = $ape_mat;
$oPac->direccion = $direccion;
$oPac->tel = $tel;

        
echo "Todo Bien";
$oPac->agregarPaciente();