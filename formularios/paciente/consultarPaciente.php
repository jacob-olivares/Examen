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
        <link href="../../css/estilos.css?v=<?php time()?>" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <?php if ($user == 3 || $user == 2 || $user == 1) { ?>
    <body>
    <div align="right"><button><a id="cancelar" href="../../index.php">Cancelar</a></button></div>
        <div id="Lista">
            <form action="consultarPaciente.php" method="POST">
            Rut Paciente: <input id="rut" type="number" name="rut">
                <input type="submit" value="Buscar">
        </form>
        <?php                     
            if(!empty($_POST['rut'])){
                $rut = $_POST['rut'];
                $sql = "SELECT * FROM paciente WHERE rut_paciente=$rut";
                $resultado = mysqli_query($con,$sql);
                ?>
        <table border="2px" width="90%"> <!-- Lo cambiaremos por CSS -->
                    <tr>
                        <td>RUT MEDICO</td>
                        <td>NOMBRES</td>
                        <td>APELLIDO PATERNO</td>
                        <td>APELLIDO MATERNO</td>
                        <td>SEXO</td>
                        <td>DIRECCION</td>
                        <td>TELEFONO</td>
                    </tr>

                <?php
        
                    while ($idPacienteList = mysqli_fetch_array($resultado)) {
                        echo
                        '<tr>'
                        . '<td>' . $idPacienteList['rut_paciente'] . '</td>'
                        . '<td>' . $idPacienteList['nombres'] . '</td>'
                        . '<td>' . $idPacienteList['ape_pat'] . '</td>'
                        . '<td>' . $idPacienteList['ape_mat'] . '</td>'
                        . '<td>' . $idPacienteList['sexo'] . '</td>'
                        . '<td>' . $idPacienteList['direccion'] . '</td>'
                        . '<td>' . $idPacienteList['telefono'] . '</td>'
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