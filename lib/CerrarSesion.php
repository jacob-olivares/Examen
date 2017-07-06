<?php

include '../constantes.php';
include '../librerias.php';

$oSes = new Sesion();
$oSes->init();

$oSes->destroy();

header('Location:http://localhost:' . $_SERVER['SERVER_PORT'] . '/Examen/index.php');
