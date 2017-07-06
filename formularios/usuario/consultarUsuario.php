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
    <?php if ($user == 1) { ?>
    <body>
    <div align="right"><button><a id="cancelar" href="../../index.php">Cancelar</a></button></div>
        <div id="Lista">
            <form action="consultarUsuario.php" method="POST">
            Usuario: <input id="usuario" type="text" name="usuario">
                <input type="submit" value="Buscar">
        </form>
        <?php                     
            if(!empty($_POST['usuario'])){
                $usuario = $_POST['usuario'];
                $sql = "SELECT idUsuario, usuario, tipoPrivilegio FROM usuario JOIN privilegio "
                        . "ON usuario.idPrivilegio = privilegio.idPrivilegio WHERE usuario='$usuario';";
                $resultado = mysqli_query($con,$sql);
                ?>
        <table border="2px" width="90%"> <!-- Lo cambiaremos por CSS -->
                    <tr>
                        <td>ID USUARIO</td>
                        <td>USUARIO</td>
                        <td>TIPO USUARIO</td>
                    </tr>

                <?php
        
                    while ($idPacienteList = mysqli_fetch_array($resultado)) {
                        echo
                        '<tr>'
                        . '<td>' . $idPacienteList['idUsuario'] . '</td>'
                        . '<td>' . $idPacienteList['usuario'] . '</td>'
                        . '<td>' . $idPacienteList['tipoPrivilegio'] . '</td>'
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