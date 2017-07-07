<?php
    include_once '../../constantes.php';
    include_once '../../librerias.php'; 
        
    $objses = new Sesion();
    $objses->init();

    $user = isset($_SESSION['idprivilegio']) ? $_SESSION['idprivilegio'] : null ;
    
    
//QUERY Medicos
    $sqlMedico = "SELECT rut_medico, nombres, ape_pat, ape_mat, especialidad FROM medico ";
    $miqueryMedico = mysqli_query($con, $sqlMedico);
    
//QUERY pacientes
    $sqlPaciente = "SELECT rut_paciente, nombres, ape_pat, ape_mat FROM paciente ";
    $miqueryPaciente = mysqli_query($con, $sqlPaciente);
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="../../css/estilos.css?v=<?= time()?>" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <?php if ($user ==3) { ?>
            <form action="../../controladores/consulta/agendar.php" method="POST">
                <div id="ac">
                <div>Fecha Atencion: <input id="fecha" type="datetime-local" name="fecha"></div>
                <div>Paciente:
                        <select id="paciente" name="paciente">
                            <option value="0">Seleccione</option>
                            <?php
                            while ($idPacientelst = mysqli_fetch_array($miqueryPaciente)) {
                                ?> 
                                <option value =<?php echo $idPacientelst['rut_paciente']; ?> >
                                    <?php
                                    echo $idPacientelst['rut_paciente'] . " | " . $idPacientelst['nombres']
                                    . " " . $idPacientelst["ape_pat"] . " " . $idPacientelst["ape_mat"];
                                    ?>

                                </option> 
                                <?php
                            }
                            ?> 
                        </select>
                </div>
                <div>Medico: 
                    <select id="medico" name="medico">
                            <option value="0">Seleccione</option>
                            <?php
                            while ($idMedicolst = mysqli_fetch_array($miqueryMedico)) {
                                ?> 
                                <option value =<?php echo $idMedicolst['rut_medico']; ?> >
                                    <?php echo $idMedicolst['rut_medico']." |".$idMedicolst['nombres']
                                            ." ".$idMedicolst["ape_pat"]." ".$idMedicolst["ape_mat"]
                                            ."| ".$idMedicolst["especialidad"]; ?>

                                </option> 
                                <?php
                            }
                            ?> 
                    </select>
                </div>            
                <input type="button" id="enviar" value="Agendar">
                <div id="mensaje"></div>
                </div>
            </form>
    </body>
    <script>
    $(document).ready(function(){
            $("#enviar").click(function(){
                /*$("form").hide();
                alert("Ocultaste el formulario ;-) "+ $("#nomusuario").val());*/
        
                if ($("#fecha").val()!="" && $("#paciente").val()!="0" && $("#medico").val()!="0"){
                    ///*$("#frmusuario").submit();
                        $.ajax({url:"../../controladores/consulta/agendar.php"
                            ,type:'post'
                            ,data:{'fecha':$("#fecha").val(),
                                'paciente':$("#paciente").val(),
                                'medico':$("#medico").val()
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
if (!$user) {
    header('Location:http://localhost:' . $_SERVER['SERVER_PORT'] . '/Examen/otras/err_IniciarSesion.php');
}
?>


