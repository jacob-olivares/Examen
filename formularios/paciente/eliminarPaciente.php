<?php
    include_once '../../constantes.php';
    include_once '../../librerias.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../css/estilos.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <form action="eliminarPaciente.php" method="POST">
                Rut: <input type="number" name="rut">
                <input type="submit" value="Buscar">
        </form>
        <?php
            if(!empty($_POST['rut'])){
            $rut = $_POST['rut'];
            $sql = "SELECT * FROM paciente WHERE rut_paciente=$rut";
            $resultado = mysqli_query($con,$sql);
        ?>
        <?php
            echo '<div id="divVista1">' . "Rut Paciente" . '</div>'
            . '<div id="divVista1">' . "Nombres" . '</div>'
            . '<div id="divVista1">' . "Apellido P" . '</div>'
            . '<div id="divVista1">' . "Apellido M" . '</div>'
            . '<div id="divVista1">' . "Sexo" . '</div>'
            . '<div id="divVista1">' . "Direccion" . '</div>'
            . '<div id="divVista1">' . "Telefono" . '</div><br>';
            
        while ($pacienteList = mysqli_fetch_array($resultado)) {
            echo '<form action="../../controladores/paciente/eliminar.php" method="POST">'
            . '<div id="divVista">' . $pacienteList['rut_paciente'] . '</div>'
            . '<div id="divVista">' . $pacienteList['nombres'] . '</div>'
            . '<div id="divVista">' . $pacienteList['ape_pat'] . '</div>'
            . '<div id="divVista">' . $pacienteList['ape_mat'] . '</div>'
            . '<div id="divVista">' . $pacienteList['sexo'] . '</div>'
            . '<div id="divVista">' . $pacienteList['direccion'] . '</div>'
            . '<div id="divVista">' . $pacienteList['telefono'] . '</div>'
            . '<input type="checkbox" name ="rut" value='.$pacienteList['rut_paciente'].'>'
            . '<input type="submit" value="Eliminar Paciente"><br>'
            . '</form>';
        }
        ?>
            <?php } ?>
    </body>
</html>