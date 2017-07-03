<?php
    include_once '../../constantes.php';
    include_once '../../librerias.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <?php if (isset($_SESSION['USR'])) { ?>
            <form action="../../controladores/medico/agregar.php" method="POST">
                <div>Rut: <input id="rut" type="number" name="rut" placeholder="Sin puntos ni guion"></div>
                <div>Nombres: <input id="nombres" type="text" name="nombres"></div>
                <div>Apellido Paterno: <input id="ape_pat" type="text" name="ape_pat"></div>
                <div>Apellido Materno: <input id="ape_mat" type="text" name="ape_mat"></div>
                <div>Fecha Contratacion: <input id="fecha" type="date" name="fecha"></div>
                <div>Especialidad: <input id="especialidad" type="text" name="especialidad"></div>
                <div>Valor Consulta: <input id="valor_consulta" type="number" name="valor_consulta"></div>                
                <input type="button" id="enviar" value="Enviar">
                <div id="mensaje"></div>
            </form>
    </body>
    <script>
    $(document).ready(function(){
            $("#enviar").click(function(){
                /*$("form").hide();
                alert("Ocultaste el formulario ;-) "+ $("#nomusuario").val());*/
        
                if ($("#rut").val()!="" && $("#nombres").val()!="" && $("#ape_mat").val()!=""
                        && $("#ape_pat").val()!="" && $("#fecha").val()!="" && $("#especialidad").val()!=""
                        && $("#valor_consulta").val()!=""){
                    ///*$("#frmusuario").submit();
                        $.ajax({url:"../../controladores/medico/agregar.php"
                            ,type:'post'
                            ,data:{'rut':$("#rut").val(),
                                'nombres':$("#nombres").val(),
                                'ape_pat':$("#ape_pat").val(),
                                'ape_mat':$("#ape_mat").val(),
                                'fecha':$("#fecha").val(),
                                'especialidad':$("#especialidad").val(),
                                'valor_consulta':$("#valor_consulta").val()
                                }
                            ,success:function(resultado){
                                $("#mensaje").html(resultado);
                            }
                        });
                    }//Cierre IF Valida blancos
                else
                    alert("Todos los campos deben llenarse");
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

