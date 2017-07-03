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
            <form action="../../controladores/paciente/agregar.php" method="POST">
                <div>Rut: <input id="rut" type="number" name="rut" placeholder="Sin puntos ni guion"></div>
                <div>Nombres: <input id="nombres" type="text" name="nombres"></div>
                <div>Apellido Paterno: <input id="ape_pat" type="text" name="ape_pat"></div>
                <div>Apellido Materno: <input id="ape_mat" type="text" name="ape_mat"></div>
                <div>Sexo: 
                    <select name="sexo">
                        <option value="seleccione">Seleccione</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>
                <div>Direccion: <input id="direccion" type="text" name="direccion"></div>
                <div>Telefono: <input id="tel" type="number" name="tel"></div>
                <input type="button" id="enviar" value="Acceder">
                <div id="mensaje"></div>
            </form>
    </body>
    <script>
    $(document).ready(function(){
            $("#enviar").click(function(){
                /*$("form").hide();
                alert("Ocultaste el formulario ;-) "+ $("#nomusuario").val());*/
        
                if ($("#rut").val()!="" && $("#nombres").val()!="" && $("#ape_mat").val()!=""
                        && $("#ape_pat").val()!="" && $("#direccion").val()!="" && $("#tel").val()!=""){
                    ///*$("#frmusuario").submit();
                        $.ajax({url:"../../controladores/paciente/agregar.php"
                            ,type:'post'
                            ,data:{'rut':$("#rut").val(),
                                'nombres':$("#nombres").val(),
                                'ape_pat':$("#ape_pat").val(),
                                'ape_mat':$("#ape_mat").val(),
                                'direccion':$("#direccion").val(),
                                'tel':$("#tel").val()
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
