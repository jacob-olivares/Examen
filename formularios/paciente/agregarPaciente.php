<?php
    include_once '../../constantes.php';
    include_once '../../librerias.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
            <form action="../../controladores/paciente/agregar.php" method="POST">
                <div>Rut: <input type="number" name="rut"></div>
                <div>Nombres: <input type="text" name="nombres"></div>
                <div>Apellido Paterno: <input type="text" name="ape_pat"></div>
                <div>Apellido Materno: <input type="text" name="ape_mat"></div>
                <div>Sexo: 
                    <select name="sexo">
                        <option value="seleccione">Seleccione</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>
                <div>Direccion: <input id="direccion" type="text" name="direccion"></div>
                <div>Telefono: <input id="tel" type="number" name="tel"></div>
                <input type="submit" value="Acceder">
            </form>
    </body>
</html>
