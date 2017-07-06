<?php
    include '../../constantes.php';
    include '../../librerias.php';
    $objses = new Sesion();
    $objses->init();

    $user = isset($_SESSION['idprivilegio']) ? $_SESSION['idprivilegio'] : null ;
    //QUERY Pacientes
    $sqlPaciente = "SELECT rut_paciente, nombres, ape_pat, ape_mat, sexo, direccion, telefono FROM paciente ";
    $miqueryPaciente = mysqli_query($con, $sqlPaciente);
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
                <h1>Lista de Pacientes</h1>
                <div>
                    <div id="divVista1">RUT</div>
                    <div id="divVista1">NOMBRES</div>
                    <div id="divVista1">APELLIDO P</div>
                    <div id="divVista1">APELLIDO M</div>
                    <div id="divVista1">SEXO</div>
                    <div id="divVista1">DIRECCION</div>
                    <div id="divVista1">TELEFONO</div><BR>
                    <?php
                    while ($idPacientelst = mysqli_fetch_array($miqueryPaciente)) {
                        echo '<div id="divVista">' . $idPacientelst['rut_paciente'] . '</div>'
                        . '<div id="divVista">' . $idPacientelst['nombres'] . '</div>'
                        . '<div id="divVista">' . $idPacientelst['ape_pat'] . '</div>'
                        . '<div id="divVista">' . $idPacientelst['ape_mat'] . '</div>'
                        . '<div id="divVista">' . $idPacientelst['sexo'] . '</div>'
                        . '<div id="divVista">' . $idPacientelst['direccion'] . '</div>'
                        . '<div id="divVista">' . $idPacientelst['telefono'] . '</div><br>';
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
