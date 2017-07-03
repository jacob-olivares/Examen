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
        <form action="eliminarMedico.php" method="POST">
            Rut: <input id="rut" type="number" name="rut">
                <input type="submit" value="Buscar">
        </form>
        <?php
            if(!empty($_POST['rut'])){
                $rut = $_POST['rut'];
                $sql = "SELECT * FROM medico WHERE rut_medico=$rut";
                $resultado = mysqli_query($con,$sql);
        ?>
        <?php
            echo '<div id="divVista1">' . "Rut Medico" . '</div>'
            . '<div id="divVista1">' . "Nombres" . '</div>'
            . '<div id="divVista1">' . "Apellido P" . '</div>'
            . '<div id="divVista1">' . "Apellido M" . '</div>'
            . '<div id="divVista1">' . "Fecha Contratacion" . '</div>'
            . '<div id="divVista1">' . "Especialidad" . '</div>'
            . '<div id="divVista1">' . "Valor Consulta" . '</div><br>';
            
        while ($medicoList = mysqli_fetch_array($resultado)) {
            echo '<form action="../../controladores/medico/eliminar.php" method="POST">'
            . '<div id="divVista">' . $medicoList['rut_medico'] . '</div>'
            . '<div id="divVista">' . $medicoList['nombres'] . '</div>'
            . '<div id="divVista">' . $medicoList['ape_pat'] . '</div>'
            . '<div id="divVista">' . $medicoList['ape_mat'] . '</div>'
            . '<div id="divVista">' . $medicoList['fecha_contratacion'] . '</div>'
            . '<div id="divVista">' . $medicoList['especialidad'] . '</div>'
            . '<div id="divVista">' . $medicoList['valor_consulta'] . '</div>'
            . '<input type="checkbox" name ="rut" value='.$medicoList['rut_medico'].'>'
            . '<input id="eliminar" type="button" value="Despedir Medico"><br>'
            . '<div id="mensaje"></div>'
            . '</form>';
        }
        ?>
            <?php } ?>
    </body>
            
    <script>
    $(document).ready(function(){
            $("#eliminar").click(function(){
                        $.ajax({url:"../../controladores/medico/eliminar.php"
                            ,type:'post'
                            ,data:{'rut':$("#rut").val()
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