<?php
    include '../../constantes.php';
    include '../../librerias.php';
    $objses = new Sesion();
    $objses->init();

    $user = isset($_SESSION['idprivilegio']) ? $_SESSION['idprivilegio'] : null ;
    //QUERY Medicos
    $sqlMedico = "SELECT rut_medico, nombres, ape_pat, ape_mat, fecha_contratacion"
            . ", especialidad, valor_consulta FROM medico ";
    $miqueryMedico = mysqli_query($con, $sqlMedico);
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <link href="../../css/estilos.css?v=<?php time()?>" rel="stylesheet" type="text/css"/>
            <title>Administracion</title>
        </head>
        <body>
            <?php if ($user == 1 || $user == 2 || $user == 3) { ?>
            <div align="right"><button><a id="cancelar" href="../../index.php">Cancelar</a></button></div>
            <div id="Lista">
                <h1>Lista de Medicos</h1>
                <div>
                    <div id="divVista1">RUT</div>
                    <div id="divVista1">NOMBRES</div>
                    <div id="divVista1">APELLIDO P</div>
                    <div id="divVista1">APELLIDO M</div>
                    <div id="divVista1">FECHA CONTRATO</div>
                    <div id="divVista1">ESPECIALIDAD</div>
                    <div id="divVista1">VALOR CONSULTA</div><BR>
                    <?php
                    while ($idMedicolst = mysqli_fetch_array($miqueryMedico)) {
                        echo '<div id="divVista">' . $idMedicolst['rut_medico'] . '</div>'
                        . '<div id="divVista">' . $idMedicolst['nombres'] . '</div>'
                        . '<div id="divVista">' . $idMedicolst['ape_pat'] . '</div>'
                        . '<div id="divVista">' . $idMedicolst['ape_mat'] . '</div>'
                        . '<div id="divVista">' . $idMedicolst['fecha_contratacion'] . '</div>'
                        . '<div id="divVista">' . $idMedicolst['especialidad'] . '</div>'
                        . '<div id="divVista">' . $idMedicolst['valor_consulta'] . '</div><br>';
                    }
                    ?>
                </div>

            </div>
        </div>        
    </body>
    </html>
<?php } ?>
<?php
if (!$user) {
    header('Location:http://localhost:' . $_SERVER['SERVER_PORT'] . '/Examen/otras/err_IniciarSesion.php');
}
?>


