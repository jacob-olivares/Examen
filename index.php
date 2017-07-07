<?php
    include './constantes.php';
    include './librerias.php';
    $objses = new Sesion();
    $objses->init();

    $user = isset($_SESSION['idprivilegio']) ? $_SESSION['idprivilegio'] : null ;
    
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/estilos.css?v=<?= time()?>" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>

        <?php if($user) { ?>
        <div align="right"><button><a id="cancelar" href="lib/CerrarSesion.php">Cerrar Sesion</a></button></div>
        <div id="menu">
            <ul class="nav">
        <h1>Pacientes: </h1>
        <?php if($user==1) { ?>
             <li><a href="formularios/paciente/agregarPaciente.php">Agregar Pacientes</a></li>
             <li><a href="formularios/paciente/eliminarPaciente.php">Eliminar Pacientes</a></li>
        <?php } ?>
        <?php if($user==3 || $user==1 || $user==2) { ?>
            <li><a href="formularios/paciente/listarPaciente.php">Listar Pacientes</a></li>
            <li><a href="formularios/paciente/consultarPaciente.php">Consultar Paciente</a><br>
        <?php } ?>
            </ul>
        <h1>Medicos: </h1>
        <?php if($user==1) { ?>
            <a href="formularios/medico/agregarMedico.php">Contratar Medico</a><br>
            <a href="formularios/medico/eliminarMedico.php">Despedir Medicos</a><br>
        <?php } ?>
        <?php if($user==3 || $user==1 || $user==2) { ?>
            <a href="formularios/medico/listarMedico.php">Listar Medicos</a><br>
            <a href="formularios/medico/consultarMedico.php">Consultar Medico</a><br>
        <?php } ?>   
        <?php if($user==1) { ?>
        <h1>Usuarios: </h1>
            <a href="formularios/usuario/agregarUsuario.php">Agregar Usuario</a><br>
            <a href="formularios/usuario/eliminarUsuario.php">Eliminar Usuarios</a><br>
            <a href="formularios/usuario/listarUsuario.php">Listar Usuarios</a><br>
            <a href="formularios/usuario/consultarUsuario.php">Consultar usuario</a><br>
        <?php } ?>       
        <h1>Consulta: </h1>
        <?php if($user==3) { ?>
            <a href="formularios/consulta/agendarConsulta.php">Agendar Consulta</a><br>
        <?php } ?>
        <?php if($user==3 || $user==2) { ?>
            <a href="formularios/consulta/listarConsulta.php">Listar Atenciones</a><br>
            <a href="formularios/consulta/consultarAtencion.php">Consultar Atenciones</a><br>
            <?php if($user==3){ ?>
            <a href="formularios/consulta/estadoConsulta.php">Modificar Estado de Atencion</a><br>
        <?php } ?>
        <?php } ?>
        <?php } ?>
            
            <?php if (!$user) { ?>
            <div id="login">
                </head>
                <body>
                    <div>
                        <img src="img/cruz.png"> 
                    </div>
                    <p>HOSPITAL TETENGO </p>      
                </body> 
        <form action="lib/Login.php" method="POST">
        <div id="general"> <h1>Sistema de Ingreso </h1>
            <input type="text" placeholder="Usuario"  name="usuario">
            <input type="password" placeholder="Contraseña" name="contrasena">
            <input type="submit" value="Ingresar">
            </form>
        </div>

        <?php
    }
    ?>
    </body>
</html>
