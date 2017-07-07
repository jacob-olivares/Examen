<?php
    include '../../constantes.php';
    include '../../librerias.php';
    $objses = new Sesion();
    $objses->init();

    $user = isset($_SESSION['idprivilegio']) ? $_SESSION['idprivilegio'] : null ;
    
    //QUERY Consulta
    $sqlConsulta = "SELECT c.idConsulta, c.fecha_atencion, p.Paciente_rut_paciente, m.Medico_rut_medico, c.estado FROM consulta c"
            . " INNER JOIN paciente_has_consulta p ON (p.Consulta_idConsulta = c.idConsulta)"
            . " INNER JOIN medico_has_consulta m ON (m.Consulta_idConsulta = c.idConsulta);";
    $miqueryConsulta = mysqli_query($con, $sqlConsulta);
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <link href="../../css/estilos.css?v=<?php time()?>" rel="stylesheet" type="text/css"/>
            <title>Administracion</title>
        </head>
        <body>
            <?php if ($user == 3 || $user == 2) { ?>
            <div align="right"><button><a id="cancelar" href="../../index.php">Cancelar</a></button></div>
                <div id="Lista">
                    <h1>Lista de Consultas</h1>
                    <table border="2px" width="90%"> <!-- Lo cambiaremos por CSS -->
                        <tr>
                            <td>ID CONSULTA</td>
                            <td>F. ATENCION</td>
                            <td>RUT PACIENTE</td>
                            <td>RUT MEDICO</td>
                            <td>ESTADO</td>
                        </tr>
                        
                            <?php
                            while ($idConsultalst = mysqli_fetch_array($miqueryConsulta)) {
                                echo '<tr><td>' . $idConsultalst['idConsulta'] . '</td>'
                                . '<td>' . $idConsultalst['fecha_atencion'] . '</td>'
                                . '<td>' . $idConsultalst['Paciente_rut_paciente'] . '</td>'
                                . '<td>' . $idConsultalst['Medico_rut_medico'] . '</td>'
                                . '<td>' . $idConsultalst['estado'] . '</td></tr>';
                            }
                            ?>
                        
                    </table>  
                </div>
    </body>
    </html>
<?php } ?>

<?php
if (!$user) {
    header('Location:http://localhost:' . $_SERVER['SERVER_PORT'] . '/Examen/otras/err_IniciarSesion.php');
}
?>



