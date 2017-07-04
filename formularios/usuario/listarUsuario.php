<?php
include '../../constantes.php';
include '../../librerias.php';
if (isset($_SESSION['USR'])) {
    //QUERY Usuarios
    $sqlUsuario = "SELECT idUsuario, usuario, privilegio.tipoPrivilegio FROM usuario JOIN privilegio"
            . " ON privilegio.idPrivilegio = usuario.idPrivilegio; ";
    $miqueryUsuario = mysqli_query($con, $sqlUsuario);
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <link href="../../css/estilos.css?v=<?php time()?>" rel="stylesheet" type="text/css"/>
            <title>Administracion</title>
        </head>
        <body>
            <div align="right"><button><a id="cancelar" href="../../index.php">Cancelar</a></button></div>
            <div id="Lista">
                    <h1>Lista de Usuarios</h1>
                    <table border="2px" width="90%"> <!-- Lo cambiaremos por CSS -->
                        <tr>
                            <td>ID USUARIO</td>
                            <td>USUARIO</td>
                            <td>TIPO USUARIO</td>
                        </tr>

                        <?php
                        while ($idUsuariolst = mysqli_fetch_array($miqueryUsuario)) {
                            echo '<tr><td>' . $idUsuariolst['idUsuario'] . '</td>'
                            . '<td>' . $idUsuariolst['usuario'] . '</td>'
                            . '<td>' . $idUsuariolst['tipoPrivilegio'] . '</td>';
                        }
                        ?>
                    </table>  
                </div>  
    </body>
    </html>
<?php } ?>

<?php
if (!isset($_SESSION['USR'])) {
    header('Location:http://localhost:' . $_SERVER['SERVER_PORT'] . '/Examen/otras/err_IniciarSesion.php');
}
?>
