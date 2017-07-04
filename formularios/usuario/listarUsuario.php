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
                <div>
                    <div id="divVista1">ID USUARIO</div>
                    <div id="divVista1">USUARIO</div>
                    <div id="divVista1">TIPO USUARIO</div><br>
                    <?php
                    while ($idUsuariolst = mysqli_fetch_array($miqueryUsuario)) {
                        echo '<div id="divVista">' . $idUsuariolst['idUsuario'] . '</div>'
                        . '<div id="divVista">' . $idUsuariolst['usuario'] . '</div>'
                        . '<div id="divVista">' . $idUsuariolst['tipoPrivilegio'] . '</div><br>';
                    }
                    ?>
                </div>

            </div>
        </div>        
    </body>
    </html>
<?php } ?>

<?php
if (!isset($_SESSION['USR'])) {
    header('Location:http://localhost:' . $_SERVER['SERVER_PORT'] . '/Examen/otras/err_IniciarSesion.php');
}
?>
