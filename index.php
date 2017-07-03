<?php
    include './constantes.php';
    include './librerias.php';
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/estilos.css?v=<?= time()?>" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <?php if(isset($_SESSION['USR'])) { ?>
            <a href="formularios/paciente/agregarPaciente.php">Agregar Paciente</a><br>
            <a href="formularios/paciente/eliminarPaciente.php">Eliminar Paciente</a><br>
            <a href="lib/CerrarSesion.php">Cerrar Sesion</a>
        <?php } ?>
            <?php if (!isset($_SESSION['USR'])) { ?>
                <div id="login">
                    <h1>Sistema de Ingreso: </h1>
                    <form action="lib/Login.php" method="POST">
                        <div>Usuario: <input type="text" name="user"></div>
                        <div>Contraseña: <input type="password" name="pass"></div>
                        <input type="submit" value="Login">
                    </form>
                </div>

                <?php
            }
            ?>
    </body>
</html>
