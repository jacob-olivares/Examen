<?php
    include '../../constantes.php';
    include '../../librerias.php';
?>

<?php

$rut = $_REQUEST['rut'];
$nombres = $_REQUEST['nombres'];
$ape_pat = $_REQUEST['ape_pat'];
$ape_mat = $_REQUEST['ape_mat'];
$fecha = $_REQUEST['fecha'];
$especialidad = $_REQUEST['especialidad'];
$valor_consulta = $_REQUEST['valor_consulta'];

$oMed = new Medico();

$oMed->rut = $rut;
$oMed->nombres = $nombres;
$oMed->ape_pat = $ape_pat;
$oMed->ape_mat = $ape_mat;
$oMed->fecha = $fecha;
$oMed->especialidad = $especialidad;
$oMed->valor_consulta = $valor_consulta;


        
if(!$oMed->validarRut($rut)){
    echo "El rut es incorrecto";
}else{
    $oMed->agregarMedico();
    echo "Medico agregado correctamente<br>";
    echo "<a href='../../index.php'>Volver</a>";
}
