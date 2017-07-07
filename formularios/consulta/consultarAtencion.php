<?php
    include_once '../../constantes.php';
    include_once '../../librerias.php';
    $objses = new Sesion();
    $objses->init();

    $user = isset($_SESSION['idprivilegio']) ? $_SESSION['idprivilegio'] : null ;

    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../css/estilos.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <?php if ($user == 3 || $user == 2) { ?>
    <body>
        <div align="right"><button><a id="cancelar" href="../../index.php">Cancelar</a></button></div>
        <div id="Lista">
            <form action="consultarAtencion.php" method="POST">
            ID CONSULTA: <input id="con" type="number" name="con">
                <input type="submit" value="Buscar">
        </form>
        <?php
                                        
            if(!empty($_POST['con'])){
                $cons = $_POST['con'];
                $sql = "SELECT c.idConsulta, c.fecha_atencion, p.Paciente_rut_paciente, m.Medico_rut_medico, c.estado FROM consulta c"
                . " INNER JOIN paciente_has_consulta p ON (p.Consulta_idConsulta = c.idConsulta)"
                . " INNER JOIN medico_has_consulta m ON (m.Consulta_idConsulta = c.idConsulta) WHERE c.idConsulta = $cons;";
                $resultado = mysqli_query($con,$sql);
                ?>
        <table border="2px" width="90%"> <!-- Lo cambiaremos por CSS -->
                    <tr>
                        <td>ID CONSULTA</td>
                        <td>FECHA ATENCION</td>
                        <td>RUT PACIENTE</td>
                        <td>RUT MEDICO</td>
                        <td>ESTADO</td>
                    </tr>

                <?php
        
                    while ($idConsultalst = mysqli_fetch_array($resultado)) {
                        echo
                        '<tr>'
                        . '<td>' . $idConsultalst['idConsulta'] . '</td>'
                        . '<td>' . $idConsultalst['fecha_atencion'] . '</td>'
                        . '<td>' . $idConsultalst['Paciente_rut_paciente'] . '</td>'
                        . '<td>' . $idConsultalst['Medico_rut_medico'] . '</td>'
                        . '<td>' . $idConsultalst['estado'] . '</td>'
                        . '</tr>';
                        } ?>
                </table>  
            <?php } ?>
        </div>
    </body>
</html>
<?php } ?>
<?php
if (!$user) {
    header('Location:http://localhost:' . $_SERVER['SERVER_PORT'] . '/Examen/otras/err_IniciarSesion.php');
}
?>