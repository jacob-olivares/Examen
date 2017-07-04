<?php
    include_once '../../constantes.php';
    include_once '../../librerias.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../css/estilos.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <?php if (isset($_SESSION['USR'])) { ?>
    <body>
        <form action="eliminarUsuario.php" method="POST">
            Nombre Usuario: <input id="usuario" type="text" name="usuario">
                <input type="submit" value="Buscar">
        </form>
        <?php
            if(!empty($_POST['usuario'])){
                $usuario = $_POST['usuario'];
                $sql = "SELECT usuario.idUsuario, usuario.usuario, privilegio.tipoPrivilegio FROM usuario"
                        . " JOIN privilegio ON usuario.idPrivilegio = privilegio.idPrivilegio WHERE usuario='$usuario'";
                $resultado = mysqli_query($con,$sql);
        ?>
        <?php
            echo '<div id="divVista1">' . "ID USUARIO" . '</div>'
            . '<div id="divVista1">' . "USUARIO" . '</div>'
            . '<div id="divVista1">' . "PRIVILEGIOS" . '</div><br>';
            
        while ($usuarioList = mysqli_fetch_array($resultado)) {
            echo '<form action="../../controladores/usuario/eliminar.php" method="POST">'
            . '<div id="divVista">' . $usuarioList['idUsuario'] . '</div>'
            . '<div id="divVista">' . $usuarioList['usuario'] . '</div>'
            . '<div id="divVista">' . $usuarioList['tipoPrivilegio'] . '</div>'
            . '<input type="checkbox" id="idUsuario" name="idUsuario" value='.$usuarioList['idUsuario'].'>'
            . '<input id="eliminar" type="button" value="Eliminar Usuario"><br>'
            . '<div id="mensaje"></div>'
            . '</form>';
        }
        ?>
            <?php } ?>
    </body>
            
    <script>
    $(document).ready(function(){
            $("#eliminar").click(function(){
                        $.ajax({url:"../../controladores/usuario/eliminar.php"
                            ,type:'post'
                            ,data:{'idUsuario':$("#idUsuario").val()
                                }
                            ,success:function(resultado){
                                $("#mensaje").html(resultado);
                            }
                        });
            });//Click Boton enviar
     });//Function Ready de la página
     </script>
</html>
<?php } ?>
<?php
if (!isset($_SESSION['USR'])) {
    header('Location:http://localhost:' . $_SERVER['SERVER_PORT'] . '/Examen/otras/err_IniciarSesion.php');
}
?>
