<?php
    include_once '../../constantes.php';
    include_once '../../librerias.php';       
//QUERY Privilegios
    $sql="SELECT idPrivilegio, tipoPrivilegio FROM privilegio;";
    $query=mysqli_query($con,$sql);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <?php if (isset($_SESSION['USR'])) { ?>
            <form action="../../controladores/usuario/agregar.php" method="POST">
                <div>Usuario: <input id="usuario" type="text" name="usuario"></div>
                <div>Contraseña: <input id="contrasena" type="password" name="contrasena"></div>
                <div>Repetir Contraseña: <input id="r_contrasena" type="password" name="r_contrasena"></div>
                <div>Privilegio: 
                    <select id="idPrivilegio" name="idPrivilegio">
                        <option value="0">Seleccione</option>
                    <?php
                    while ($idPrivilegiolst = mysqli_fetch_array($query)) {
                        ?> 
                        <option value =<?php echo $idPrivilegiolst['idPrivilegio']; ?>>
                            <?php echo $idPrivilegiolst['tipoPrivilegio']; ?>

                        </option> 
                        <?php
                    }
                    ?> 
                    </select>
                </div>
                <input type="button" id="enviar" value="Agregar">
                <div id="mensaje"></div>
            </form>
    </body>
    <script>
    $(document).ready(function(){
            $("#enviar").click(function(){
                /*$("form").hide();
                alert("Ocultaste el formulario ;-) "+ $("#nomusuario").val());*/
        
                if ($("#usuario").val()!="" && $("#contrasena").val()!="" && $("#idPrivilegio").val()!=""){
                    ///*$("#frmusuario").submit();
                        $.ajax({url:"../../controladores/usuario/agregar.php"
                            ,type:'post'
                            ,data:{'usuario':$("#usuario").val(),
                                'contrasena':$("#contrasena").val(),
                                'r_contrasena':$("#r_contrasena").val(),
                                'idPrivilegio':$("#idPrivilegio").val()
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
