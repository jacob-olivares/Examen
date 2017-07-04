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
        <div align="right"><button><a id="cancelar" href="lib/CerrarSesion.php">Cerrar Sesion</a></button></div>
        <h1>Pacientes: </h1>
            <a href="formularios/paciente/agregarPaciente.php">Agregar Pacientes</a><br>
            <a href="formularios/paciente/eliminarPaciente.php">Eliminar Pacientes</a><br>
            <a href="formularios/paciente/listarPaciente.php">Listar Pacientes</a><br>
        <h1>Medicos: </h1>
            <a href="formularios/medico/agregarMedico.php">Contratar Medico</a><br>
            <a href="formularios/medico/eliminarMedico.php">Despedir Medicos</a><br>
            <a href="formularios/medico/listarMedico.php">Listar Medicos</a><br>
                    
        <h1>Usuarios: </h1>
            <a href="formularios/usuario/agregarUsuario.php">Agregar Usuario</a><br>
            <a href="formularios/usuario/eliminarUsuario.php">Eliminar Usuarios</a><br>
            <a href="formularios/usuario/listarUsuario.php">Listar Usuarios</a><br>
            
        <h1>Consulta: </h1>
            <a href="formularios/consulta/agendarConsulta.php">Agendar Consulta</a><br>
            <a href="formularios/consulta/listarConsulta.php">Listar Consultas</a><br>
            <a href="formularios/usuario/listarUsuario.php">Listar Usuarios</a><br>
        <?php } ?>
            <?php if (!isset($_SESSION['USR'])) { ?>
                <div id="login">
                    <h1>Sistema de Ingreso: </h1>
                    <form action="lib/Login.php" method="POST">
                        <div>Usuario: <input type="text" name="usuario"></div>
                        <div>Contraseña: <input type="password" name="contrasena"></div>
                        <input type="submit" value="Login">
                    </form>
                </div>

                <?php
            }
            ?>
    </body>
</html>
